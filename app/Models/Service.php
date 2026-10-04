<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\HtmlString;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_link',
        'description',
        'long_description',
        'price',
    ];

    /**
     * The long description as list items, one per line. Text is escaped first,
     * then **double asterisks** become <strong>, so admins can't inject HTML.
     *
     * @return array<int, HtmlString>
     */
    public function featureLines(): array
    {
        return collect(preg_split('/\R/', $this->long_description))
            ->map(fn (string $line) => trim($line))
            ->filter()
            ->map(fn (string $line) => new HtmlString(preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', e($line))))
            ->values()
            ->all();
    }
}

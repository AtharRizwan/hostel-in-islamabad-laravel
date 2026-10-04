<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'text',
        'position',
        'username',
        'website',
    ];

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
        ];
    }

    /**
     * A review can be deleted by the user who wrote it or by an admin.
     */
    public function canBeDeletedBy(User $user): bool
    {
        return $user->isAdmin() || $this->user_id === $user->id;
    }
}

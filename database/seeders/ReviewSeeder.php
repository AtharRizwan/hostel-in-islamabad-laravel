<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Fictional guests, the same as on the static site. A position of
     * "member co-funder" shows the GOLD-MEMBER ribbon on the review card.
     */
    public function run(): void
    {
        $user = User::first();

        $reviews = [
            ['Ayesha Khan', 'ayeshak', 'member co-funder', 'Oh, I love the amazing hot chocolate pudding I get at exactly 8pm. They never get late or miss serving it hot. Amazing service 10/10 would recommend.'],
            ['Daniel Brooks', 'danbrooks', 'member co-funder', 'I am a big fan of their freshly baked bread and breakfast that is served from 7AM to 9AM. I do not like the pricing, but hopefully we can expect better pricing for them soon enough :)'],
            ['Sana Malik', 'sanamalik', 'member', 'The free pick-up from the airport was a lifesaver. The driver was waiting when I landed late at night and got me to the hostel safely. Highly recommended!'],
            ['Lukas Weber', 'lukasweber', 'member', 'Good! I really like the overall setup. Especially the view of the Margalla Hills, it is amazing. I like to sit by the window while I wait for my chauffeur.'],
        ];

        foreach ($reviews as [$name, $username, $position, $text]) {
            Review::create([
                'name' => $name,
                'text' => $text,
                'position' => $position,
                'username' => $username,
                'website' => 'https://example.com/'.$username,
                'user_id' => $user->id,
            ]);
        }
    }
}

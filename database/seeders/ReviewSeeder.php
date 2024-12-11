<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'name' => 'Chris Coyier',
            'text' => 'Oh, I love the amazing hot chocolate pudding i get at exactly 8pm. They never get late or miss serving it hot. Amazing service 10/10 would recommend.',
            'position' => 'member co-funder',
            'username' => 'chriscoyier',
            'website' => 'https://codepen.io/chriscoyier',
        ]);
        Review::create([
            'name' => 'Alex Vazquez',
            'text' => 'I am a big fan of their freshly baked bread and breakfast that is served from 7AM to 9AM. I do not like the pricing, but hopefully we can expect better pricing for them soon enough :)',
            'position' => 'member co-funder',
            'username' => 'quezo',
            'website' => 'https://codepen.io/chriscoyier',
        ]);
        Review::create([
            'name' => 'Marie Mosley',
            'text' => 'I really like the Mausami ka Juice that they offer. The drink is one of the best drinks I have ever had and quenches my thirst immediately after a long summer day!',
            'position' => 'member co-funder',
            'username' => 'mariemosley',
            'website' => 'https://codepen.io/chriscoyier',
        ]);


    }
}

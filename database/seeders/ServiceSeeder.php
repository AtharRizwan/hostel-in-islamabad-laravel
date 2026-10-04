<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Same content as the static site. Each line of long_description becomes
     * a list item on the service page; **text** is shown in bold.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Hot Chocolate Pudding @ 8 PM',
            'image_link' => 'img/pudding.jpg',
            'description' => 'End your day with our signature dessert at 8 PM.',
            'long_description' => implode("\n", [
                '**Indulge** in our delicious, homemade hot chocolate pudding every evening at 8 PM.',
                "Perfect for a cozy end to your day, whether you're relaxing after an adventure or just craving something sweet.",
                'Made with **rich chocolate** and served warm to give you a comforting treat before bed.',
            ]),
            'price' => 'Rs 500 per serving',
        ]);

        Service::create([
            'name' => 'Freshly Baked Bread & Breakfast (7 AM - 9 AM)',
            'image_link' => 'img/breakfast.jpg',
            'description' => 'Enjoy our delicious breakfast to start your day fresh.',
            'long_description' => implode("\n", [
                'Wake up to the **aroma of freshly baked bread** and a delicious breakfast served daily from 7 AM to 9 AM.',
                'Our breakfast includes locally sourced ingredients and freshly brewed coffee or tea to kickstart your day.',
                'Enjoy a **variety of options**, from warm pastries to healthy choices like fruits and yogurt.',
            ]),
            'price' => 'Rs 1000 per person',
        ]);

        Service::create([
            'name' => 'Bike Hire',
            'image_link' => 'img/bike.jpg',
            'description' => 'Explore the city by renting our bikes at affordable rates.',
            'long_description' => implode("\n", [
                'Explore the beautiful surroundings of Islamabad at your own pace with our **Bike Hire**.',
                'We provide high-quality bikes, helmets, and safety gear, ensuring a fun and safe experience.',
                'Prefer company? Join one of our guided rides through scenic routes, **highlighting local attractions** and hidden gems.',
            ]),
            'price' => 'Rs 150 per day',
        ]);

        Service::create([
            'name' => 'Free Pick-up & Drop-off',
            'image_link' => 'img/pickup.jpg',
            'description' => 'We offer free transportation to ensure your convenience.',
            'long_description' => implode("\n", [
                '**Convenient and free transportation** for all our guests, available 24/7.',
                "Whether you're arriving or leaving, we'll take care of your airport or bus station transfers.",
                'Our **friendly drivers** ensure a smooth and comfortable ride, with no extra charge.',
                'Ideal for travelers who want a **hassle-free start or end** to their stay with us.',
            ]),
            'price' => 'Complimentary',
        ]);

        Service::create([
            'name' => 'Fun Events',
            'image_link' => 'img/events.jpg',
            'description' => 'Join our weekly movie nights and games evenings with fellow travellers.',
            'long_description' => implode("\n", [
                'Unwind after a long day with our weekly **Movie Nights**, featuring popular films in a cozy atmosphere.',
                'For those who enjoy socializing, we also host **Games Evenings** where guests can play a variety of board games and card games.',
                "It's a great way to meet fellow travelers, make new friends, and have some fun together!",
            ]),
            'price' => 'Varies by event',
        ]);
    }
}

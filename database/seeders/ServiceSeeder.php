<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * bike, breakfast, events, hostel, pudding, pickup
         * all files .jpg
         *
         */
        Service::create([
            'name' => 'Hot Chocolate Pudding @ 8PM',
            'image_link'=> 'img/pudding.jpg',
            'description'=> 'End your day with our signature dessert at 8PM',
            'long_description'=> 'Indulge in our delicious, homemade hot chocolate pudding every evening at 8 PM. Perfect for a cozy end to your day, whether you\'re relaxing after an adventure or just craving something sweet., Made with rich chocolate and served warm to give you a comforting treat before bed.',
            'price'=> 'Rs 500 per serving',
        ]);

        Service::create([
            'name' => 'Breakfast Buffet',
            'image_link'=> 'img/breakfast.jpg',
            'description'=> 'Start your day with a hearty breakfast',
            'long_description'=> 'Start your day with a hearty breakfast at our restaurant. Our breakfast buffet includes a variety of options to suit every taste, from fresh fruit and yogurt to eggs, bacon, and more. Whether you prefer a light meal or a hearty feast, we have something for everyone. Join us every morning to fuel up for your day of adventure.',
            'price'=> 'Rs 1000 per person',
        ]);

        Service::create([
            'name' => 'Bike Rentals',
            'image_link'=> 'img/bike.jpg',
            'description'=> 'Explore the area on two wheels',
            'long_description'=> 'Explore the area on two wheels with our bike rentals. Whether you want to take a leisurely ride around town or tackle some challenging trails, we have the perfect bike for you. Our rental fleet includes mountain bikes, road bikes, and more, so you can find the right fit for your adventure. Rent a bike today and start exploring!',
            'price'=> 'Rs 500 per hour',
        ]);

        Service::create([
            'name' => 'Fun Local Events',
            'image_link'=> 'img/events.jpg',
            'description'=> 'Host your next event with us',
            'long_description'=> 'Host your next event with us in our versatile event space. Whether you\'re planning a wedding, birthday party, corporate retreat, or any other gathering, our space is perfect for groups of all sizes. With customizable seating arrangements, state-of-the-art audiovisual equipment, and a dedicated event staff, we have everything you need to make your event a success. Contact us today to book your date!',
            'price'=> 'Rs 5000 per hour'
        ]);

        Service::create([
            'name'=> 'Free Pick-up & Drop-off',
            'image_link'=> 'img/pickup.jpg',
            'description'=> 'Let us take care of your transportation',
            'long_description'=> 'Let us take care of your transportation with our free pick-up and drop-off service. Whether you\'re arriving by plane, train, or bus, we\'ll be there to greet you and take you to our hotel. Our friendly drivers will ensure you arrive safely and comfortably, so you can start your adventure stress-free. Contact us today to arrange your transportation!',
            'price'=> 'Complimentary',
        ]);
    }
}

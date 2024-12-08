@extends('layouts.app')

@section('title', 'Services - Hostel in Islamabad')

@section('content')
<section class="services-intro">
    <h1 class="color-change">Our Services</h1>
    <p>Explore the amazing services we offer to enhance your stay!</p>
</section>

<section class="services-grid">
    <h2>Available Services</h2>
    <div class="grid-container">
        <a href="product_pudding.html" class="service-item">
            <img src="{{ asset('img/pudding.jpg') }}" alt="Hot Chocolate Pudding">
            <h3>Hot Chocolate Pudding @ 8 PM</h3>
            <p>End your day with our signature dessert at 8 PM.</p>
        </a>
        <a href="product_breakfast.html" class="service-item">
            <img src="{{ asset('img/breakfast.jpg') }}" alt="Fresh Breakfast">
            <h3>Freshly Baked Bread & Breakfast (7 AM - 9 AM)</h3>
            <p>Enjoy our delicious breakfast to start your day fresh.</p>
        </a>
        <a href="product_bike.html" class="service-item">
            <img src="{{ asset('img/bike.jpg') }}" alt="Bike Hire">
            <h3>Bike Hire</h3>
            <p>Explore the city by renting our bikes at affordable rates.</p>
        </a>
        <a href="product_pickup.html" class="service-item">
            <img src="{{ asset('img/pickup.jpg') }}" alt="Free Pick-up & Drop-off">
            <h3>Free Pick-up & Drop-off</h3>
            <p>We offer free transportation to ensure your convenience.</p>
        </a>
        <a href="product_events.html" class="service-item">
            <img src="{{ asset('img/events.jpg') }}" alt="Fun Events">
            <h3>Fun Local Events</h3>
            <p>Participate in exciting events happening in the local area.</p>
        </a>
    </div>
</section>

<!-- Pricing Table Section -->
<section class="pricing-section">
    <h2>Our Pricing</h2>
    <table class="pricing-table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Hot Chocolate Pudding @ 8 PM</td>
                <td>Rs 500 per serving</td>
            </tr>
            <tr>
                <td>Freshly Baked Bread & Breakfast (7 AM - 9 AM)</td>
                <td>Rs 1000 per person</td>
            </tr>
            <tr>
                <td>Bike Hire</td>
                <td>Rs 150 per day</td>
            </tr>
            <tr>
                <td>Free Pick-up & Drop-off</td>
                <td>Complimentary</td>
            </tr>
            <tr>
                <td>Fun Local Events</td>
                <td>Varies by event</td>
            </tr>
        </tbody>
    </table>
</section>
<div class="reviews_title">
    <h2> Customer Reviews </h2>
</div>
<div class="reviews">
    <div class="content">
        <ul class="team">
            <li class="member co-funder">
                <div class="thumb"><img
                        src="https://assets.codepen.io/3/internal/avatars/users/default.png?fit=crop&format=auto&height=120&width=120">
                </div>
                <div class="description">
                    <h3>Chris Coyier</h3>
                    <p>Oh, I love the amazing hot chocolate pudding i get at exactly 8pm. They never get late or miss
                        serving it hot. Amazing service 10/10 would recommend. <br><a
                            href="https://codepen.io/chriscoyier/">@chriscoyier</a></p>
                </div>
            </li>
            <li class="member co-funder">
                <div class="thumb"><img
                        src="https://assets.codepen.io/2/internal/avatars/users/default.png?height=120&width=120"></div>
                <div class="description">
                    <h3>Alex Vazquez</h3>
                    <p>I am a big fan of their freshly baked bread and breakfast that is served from 7AM to 9AM. I do
                        not like the pricing, but hopefully we can expect better pricing for them soon enough :)<br><a
                            href="https://codepen.io/quezo/">@quezo</a></p>
                </div>
            </li>
            <li class="member">
                <div class="thumb"><img
                        src="https://assets.codepen.io/652/internal/avatars/users/default.png?height=120&width=120">
                </div>
                <div class="description">
                    <h3>Marie Mosley</h3>
                    <p>I really like the Mausami ka Juice that they offer. The drink is one of the best drinks I have
                        ever had and quenches my thirst immediately after a long summer day! <br><a
                            href="https://codepen.io/mariemosley/">@mariemosley</a></p>
                </div>
            </li>
            <li class="member">
                <div class="thumb"><img
                        src="https://assets.codepen.io/39255/internal/avatars/users/default.png?height=120&width=120">
                </div>
                <div class="description">
                    <h3>Stephen Shaw</h3>
                    <p>Good! I really like the overall setup. Especially the view, it is amazing. I like to sit by the
                        beach to wait for my chaeuffuer<br><a href="https://codepen.io/shshaw/">@shshaw</a></p>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="reviews_title">
    <h2>Add Review</h2>
</div>
<div class="container">
    <form action="#">
        <div class="form-row">
            <div class="input-data">
                <input id="first_name" type="text" required>
                <div class="underline"></div>
                <label for=""> First Name</label>
            </div>
            <div class="input-data">
                <input id="last_name" type="text" required>
                <div class="underline"></div>
                <label for=""> Last Name</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data">
                <input id="username" type="text" required>
                <div class="underline"></div>
                <label for=""> Username</label>
            </div>
            <div class="input-data">
                <input id="url" type="text" required>
                <div class="underline"></div>
                <label for=""> Website URL</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data textarea">
                <textarea rows="8" cols="80" required></textarea>
                <br />
                <div class="underline"></div>
                <label for=""> Write your Review</label>
                <br />
                <div class="form-row">
                    <div id="warning" class="alert">
                    </div>
                </div>
                <div class="form-row submit-btn">
                    <div class="input-data">
                        <div class="inner"></div>
                        <input id="addReviewButton" type="button" value="Add Review">
                    </div>
                    <div class="input-data">
                        <div class="inner"></div>
                        <input id="removeReviewButton" type="button" value="Remove Review">
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection
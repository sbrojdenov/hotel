@extends('layouts.front')

@section('content')
    <!--Check Availability SECTION-->
    <div>
        <div class="slider fullscreen">
            <ul class="slides">
                @forelse($slider_images as $image)
                <li> <img src="{{'/storage/slider/'.$image->name}}" alt="">
                    <!-- random image -->
                    <div class="caption center-align slid-cap">
                        <h5 class="light grey-text text-lighten-3">{{ $image->small_title }}</h5>
                        <h2>{{ $image->big_title }}</h2>
                        <p>{{ $image->description }}</p>
                        <a href="{{ $image->link }}" class="waves-effect waves-light">{{ $image->link_text }}</a></div>
                </li>
                    @empty
                    <li> <img src="{{ asset("front/images/slider/1.jpg") }}" alt="">
                    <!-- random image -->
                    <div class="caption center-align slid-cap">
                        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        <h2>This is our big Tagline!</h2>
                        <p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p> <a href="#" class="waves-effect waves-light">Booking</a></div>
                </li>
                    @endforelse
            </ul>
        </div>
    </div>
    <!--End Check Availability SECTION-->
    <!--HOTEL ROOMS SECTION-->

    @if(count($room_types) > 0)
    <div class="hom1 hom-com pad-bot-40">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Our Hotel Rooms</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Every hotel stay provides you with great experience and hospitality.</p>
                </div>
            </div>
            <div class="row">
                <div class="to-ho-hotel">
                    @foreach($room_types as $room_type)
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hom-hot-av-tic"> Available Rooms: {{ count($room_type->rooms) }} </div> <img src="{{'/storage/room_types/'.$room_type->images->first()->name}}" alt=""> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="{{url('/room_type/'.$room_type->id)}}"><h4>{{ $room_type->name }}</h4></a> </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>
                                            <div class="dir-rat-star ho-hot-rat-star"> Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        </li>
                                        <li><span class="ho-hot-pri">${{ $room_type->cost_per_day }}</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--END HOTEL ROOMS-->
    <!--TOP SECTION-->
    <div class="offer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4">Standardized Budget Rooms</span> <span class="ol-3"></span> <span class="ol-5">$99/-</span>
                        <ul>
                            <li>
                                <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset("front/images/icon/dis1.png") }}" alt="">
                                </a><span>Free WiFi</span>
                            </li>
                            <li>
                                <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset("front/images/icon/h2.png") }}" alt=""> </a><span>Breakfast</span>
                            </li>
                            <li>
                                <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset("front/images/icon/dis3.png") }}" alt=""> </a><span>Pool</span>
                            </li>
                            <li>
                                <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset("front/images/icon/dis4.png") }}" alt=""> </a><span>Television</span>
                            </li>
                            <li>
                                <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset("front/images/icon/dis5.png") }}" alt=""> </a><span>GYM</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="offer-r">
                        <div class="or-1"> <span class="or-11">go</span> <span class="or-12">Stays</span> </div>
                        <div class="or-2"> <span class="or-21">Get</span> <span class="or-22">70%</span> <span class="or-23">Off</span> <span class="or-24">use code: RG5481WERQ</span> <span class="or-25"></span> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($events) > 0)
    <div class="blog hom-com pad-bot-0">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Events</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Join events and conferences organized in our hotel.</p>
                </div>
            </div>
            <div class="row">
                <div>
                    @foreach($events as $event)
                    <div class="col-md-3 n2-event">
                        <!--event IMAGE-->
                        <div class="n21-event hovereffect"> <img src="{{'/storage/events/'.$event->image}}" alt="">
                            <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                        </div>
                        <!--event DETAILS-->
                        <div class="n22-event"> <a href="#!"><h4>{{ $event->name }}</h4></a> <span class="event-date">Date: {{ $event->date }},</span> <span class="event-by"> Price: {{ $event->price > 0? "Rs. ".$event->price : 'Free'}}</span>
                            <p>{{ $event->description }}</p>
                            <!--event SHARE-->
                            <div class="event-share">
                                <ul>
                                    <li><a href="https://www.facebook.com/sharer.php?u={{ Request::url() }}" rel="me" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="https://plus.google.com/share?url={{ Request::url() }}" rel="me" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li><a href="https://twitter.com/share?url={{ Request::url() }}&text={{ $event->name }}" rel="me" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="https://pinterest.com/pin/create/button/?url={{ Request::url() }}&media={{ $event->image }}&description={{ $event->name }}" rel="me" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="blog hom-com pad-bot-0">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Photo Gallery</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>View photos of hotel rooms, food menus and events</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="inn-services head-typo typo-com mar-bot-0">
                        <ul id="filters" class="clearfix">
                            <li><span class="filter active" data-filter=".room, .facilities, .food, .event">All</span>
                            </li>
                            <li><span class="filter" data-filter=".room">Rooms</span>
                            </li>
                            <li><span class="filter" data-filter=".facilities">Facilities</span>
                            </li>
                            <li><span class="filter" data-filter=".food">Food Menu</span>
                            </li>
                            <li><span class="filter" data-filter=".event">Events</span>
                            </li>
                        </ul>
                        <div id="portfoliolist">
                            <!-- Room Types -->
                            @foreach($room_types as $room_type)
                                <div class="portfolio room" data-cat="room">
                                    <div class="portfolio-wrapper"> <img src="{{'/storage/room_types/'.$room_type->images->last()->name}}" alt="" />
                                        <div class="label">
                                            <div class="label-text"> <a class="text-title">{{ $room_type->name }}</a></div>
                                            <div class="label-bg"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Event Events -->
                            @foreach($events as $event)
                                <div class="portfolio event" data-cat="event">
                                    <div class="portfolio-wrapper"> <img src="{{ '/storage/events/'.$event->image }}" alt="" />
                                        <div class="label">
                                            <div class="label-text"> <a class="text-title">{{ $event->name }}</a></div>
                                            <div class="label-bg"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        <!-- Food Photos -->
                            @foreach($foods as $food)
                                <div class="portfolio food" data-cat="food">
                                    <div class="portfolio-wrapper"> <img src="{{ '/storage/foods/'.$food->image }}" alt="" />
                                        <div class="label">
                                            <div class="label-text"> <a class="text-title">{{ $food->name }}</a></div>
                                            <div class="label-bg"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog hom-com">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Read More</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="bot-gal h-gal">
                        <h4>Photo Gallery</h4>
                        <ul>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/8.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/9.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/10.jp") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/11.jp") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/1.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/2.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/3.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/4.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/5.jp") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/6.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/7.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/8.jp") }}" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bot-gal h-vid">
                        <h4>Video Gallery</h4>
                        <iframe src="https://www.youtube.com/embed/mG4G8crGQ34?autoplay=0&amp;showinfo=0&amp;controls=0" allowfullscreen></iframe>
                        <h5>Maecenas sollicitudin lacinia</h5>
                        <p>Maecenas finibus neque a tellus auctor mattis. Aliquam tempor varius ornare. Maecenas dignissim leo leo, nec posuere purus finibus vitae.</p>
                        <p>Quisque vitae neque at tellus malesuada convallis. Phasellus in lectus vitae ex euismod interdum non a lorem. Nulla bibendum. Curabitur mi odio, tempus quis risus cursus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bot-gal h-blog">
                        <h4>News & Event</h4>
                        <ul>
                            <li>
                                <a href="#!"> <img src="{{ asset("front/images/users/2.png") }}" alt="">
                                    <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                    <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#!"> <img src="{{ asset("front/images/users/3.png") }}" alt="">
                                    <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                    <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#!"> <img src="{{ asset("front/images/users/4.png") }}" alt="">
                                    <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                    <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#!"> <img src="{{ asset("front/images/users/5.png") }}" alt="">
                                    <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                    <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

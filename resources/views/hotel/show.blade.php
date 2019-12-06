<!DOCTYPE html>
<?php use App\Models\Hotel;?>
<html>
<title>Reservation</title>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body, h1, h2, h3, h4, h5, h6 {
        font-family: "Raleway", Arial, Helvetica, sans-serif
    }
</style>
<body class="w3-light-grey">

<!-- Navigation Bar -->

<!-- Header -->
@extends('layouts.app')
@section('content')

<div class=" w3-padding w3-col 0 m8" style="margin: 0 auto;">
    <div class="w3-container w3-red" style="margin: 0 auto;">
        <h2><i class="fa fa-bed w3-margin-right"></i>{{ $hotel['name']}}</h2>
    </div>
    <div class="w3-container w3-white w3-padding-16" style="margin: 0 auto;">
        <form action="{{ route('hotels.check')}}" method="POST" style="margin: 0 auto;">
            @csrf
            @method('POST')
            <div class="w3-row-padding" style="margin: 0 auto;">
                <div class="w3-half w3-margin-bottom">
                    <label for="check_in_date"><i class="fa fa-calendar-o"></i> Check In</label>
                    <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY" id="check_in_date"
                           name="check_in_date" required>
                </div>
                <div class="w3-half">
                    <label for="check_out_date"><i class="fa fa-calendar-o"></i> Check Out</label>
                    <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY" id="check_out_date"
                           name="check_out_date" required>
                </div>
            </div>

{{--            <div class="w3-row-padding" style="margin: 0 auto;">--}}
{{--                <div class="w3-half w3-margin-bottom">--}}
{{--                    <label for="user_id"><i class=""></i>User Type</label>--}}
{{--                    <select name="user_id" class="col-md-4 col-form-label text-md-right" id="user_id">--}}
{{--                    @foreach(App\Models\User::USER_TYPES as $value => $description)--}}

{{--                        <option value="{{$value}}" class="form-control">{{$description}}</option>--}}
{{--                    @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}


                <div style="margin:auto;text-align: center">
                    <label for="room_id">Room Type</label>
                    <select name="room_id" class="col-md-4 col-form-label text-md-right" id="room_id">


                        @foreach(App\Models\Room::ROOM_TYPES as $value => $description)

                            <option value="{{$value}}" class="form-control">{{$description}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <!-- Hidden hotel_id-->
                <input type="hidden" name="hotel_id" id="hotel_id" value="{{$hotel['id']}}">

                <div style="text-align: center">
                    <button type="submit"><i></i>{{ __('Book now') }}</button>
                </div>


        </form>

    </div>
</div>
<div class="w3-padding w3-col 0 m8">
    <p>
        Situated on its own island, Burj Al Arab Jumeirah features ultra-luxurious suites overlooking the sea, 9
        signature restaurants and an opulent full-service spa. Guests may arrive at the property by either one of the
        world's largest chauffeur-driven fleets of Rolls-Royce's or alternatively by a dedicated helicopter transfer
        service. The new terrace offers two swimming pools, 32 luxury cabanas, a restaurant and a bar transforming the
        hotel into a full resort.

        Featuring floor to ceiling windows with panoramic view of the Arabian Gulf, each suite includes an iPad,
        complimentary WiFi, a 21-inch iMac, and widescreen interactive HD TV. Bose iPhone docking station and media hub
        is also available.

        The Sky View Bar is suspended 200 m above sea level and is idea for afternoon tea and cocktails. Al Muntaha is
        the Burj Al Arab's signature fine dining restaurant serving contemporary European cuisine.

        Each experience at Talise Spa has been carefully crafted and exclusively developed using the world’s most
        luxurious products to leave you utterly pampered. Both ladies and gentlemen’s relaxation areas feature an aqua
        retreat. Facilities include separate indoor infinity pools, hot tub and treatment rooms overlooking the Arabian
        Gulf complement the spa, along with saunas, steam rooms and plunge pools.

        Located directly on the beach, Villa Beach restaurant is open daily for lunch and dinner. The Summersalt Beach
        Club is exclusive to Jumeirah Al Naseem and Burj Al Arab Jumeirah suite guests who will be accommodated on the
        first come, first served basis. All guests will get access to the newly refurbished Jumeirah Beach Hotel private
        beach.

        Featuring brand new cabanas, sun loungers, along with magnificent views of Burj Al Arab Jumeirah and the Arabian
        Gulf, it creates the perfect beachside spot exclusive for Burj Al Arab Jumeirah guests only.

        Burj Al Arab Jumeirah offers unlimited access to the water sports activities at Wild Wadi Waterpark™, located
        just a 5-minute walk across the island bridge. Souk Madinat Jumeirah is a 15-minute walk away.

        Couples particularly like the location — they rated it 9.4 for a two-person trip.

        We speak your language!
    </p>
</div>
    @endsection
</body>
</html>

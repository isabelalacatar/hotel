<!DOCTYPE html>
<?php use App\Models\Hotel;?>
<html>
<title>Reservation</title>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/rating.js') }}" defer></script>
<style>
    body, h1, h2, h3, h4, h5, h6 {
        font-family: "Raleway", Arial, Helvetica, sans-serif
    }

    @media (min-width: 601px) {
        .w3-col.m8, .w3-twothird {
            width: 100% !important;
        }
    }

    .star-rating {
        line-height: 32px;
        font-size: 1.25em;
    }

    .star-rating .fa-star{
        color: yellow;
    }
</style>
<body class="w3-light-grey">

<!-- Navigation Bar -->

<!-- Header -->
@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach( $hotel->uploads as $upload )
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            @foreach($hotel->uploads as $upload)
                                @if(isset($upload))
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img class="d-block img-fluid"
                                             src={{Storage::url("public/hotels/".$hotel->id."/".$upload->path)}}>
                                        <div class="carousel-caption d-none d-md-block">
                                        </div>
                                    </div>
                                    <a class="card-title" href="{{route('hotels.show', $hotel->id)}}"></a>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class=" w3-padding w3-col 0 m8" style="margin: 0 !important;">
                        <div class="w3-container w3-blue" style="margin: 0 !important;">
                            <h2><i class="fa fa-bed w3-margin-right"></i>{{ $hotel['name']}}</h2>
                        </div>
                        <div class="w3-container w3-white w3-padding-16" style="margin: 0 auto;">
                            <form action="{{ route('hotels.check')}}" method="POST" style="margin: 0 auto;">
                                @csrf
                                @method('POST')
                                <div class="w3-row-padding" style="margin: 0 auto;">
                                    <div class="w3-half w3-margin-bottom">
                                        <label for="check_in_date"><i class="fa fa-calendar-o"></i> Check In</label>
                                        <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY"
                                               id="check_in_date"
                                               name="check_in_date" required>
                                    </div>
                                    <div class="w3-half">
                                        <label for="check_out_date"><i class="fa fa-calendar-o"></i> Check Out</label>
                                        <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY"
                                               id="check_out_date"
                                               name="check_out_date" required>
                                    </div>
                                </div>

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
                                    <button class="btn-info" type="submit"><i></i>{{ __('Book now') }}</button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
            {{--            <div class="row mt-1">--}}
            <div class="w3-padding w3-col 0 m8 mt-2">
                <div style="text-align: justify">{{$hotel->description}}</div>
            </div>
            {{--            </div>--}}
            <form method="GET" action="{{ route('review.store',$review->id) }}">
                @csrf
                @method('GET')
                <div class="form-group ">
                    <br><label for="description"
                               class="col-md-4 col-form-label text-md-left">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea id="description" type="text"
                                  class="form-control  @error('description') is-invalid @enderror" name="description"
                                  value="{{ old('description') }}"></textarea>


                    </div>
                    <div>
                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="star-rating">
                        <span class="fa fa-star" data-rating="1"></span>
                        <span class="fa fa-star" data-rating="2"></span>
                        <span class="fa fa-star" data-rating="3"></span>
                        <span class="fa fa-star" data-rating="4"></span>
                        <span class="fa fa-star" data-rating="5"></span>
                        <input type="hidden" name="rating" class="rating-value" value="2.56">
                    </div>
                </div>
                <div class="col-md-8" style="text-align: center">

                    <button type="submit" class="btn btn-primary">
                        {{ __('Add') }}
                    </button>

                </div>
            </form>
            <div>
                <label><b>Reviews</b></label><br>

                @foreach($hotel->reviews as $rev)
                    @if(isset($rev))
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p class="text-secondary text-center">{{$rev->updated_at}}</p>
                                    </div>
                                    <p>
                                        <a class="float-left"><strong>{{$rev->user->name}}</strong></a>
                                    </p>
                                    <div><br>{{$rev->description}}</div>
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection

</body>
</html>

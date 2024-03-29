@extends('layouts.app')

@section('content')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>File Upload Tutorial</title>
        {{--        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
        {{--        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>--}}
        {{--        <script src="{{asset('js/app.js')}}"></script>--}}
    </head>
    <div>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Edit') }}</div>


                        <div class="card-body">
                            <form method="POST" action="{{route('management.update',$hotel->id)}}">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ $hotel['name'] }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="city"
                                           class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text"
                                               class="form-control @error('city') is-invalid @enderror" name="city"
                                               value="{{ $hotel['city'] }}" required autocomplete="city" autofocus>

                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <label for="country"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                    <div class="col-md-6">
                                        <input id="country" type="text"
                                               class="form-control @error('country') is-invalid @enderror"
                                               name="country"
                                               value="{{ $hotel['country'] }}" required autocomplete="country"
                                               autofocus>

                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="street"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Street') }}</label>

                                    <div class="col-md-6">
                                        <input id="street" type="text"
                                               class="form-control @error('street') is-invalid @enderror" name="street"
                                               value="{{ $hotel['street'] }}" required autocomplete="street" autofocus>

                                        @error('street')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="phone"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text"
                                               class="form-control @error('phone') is-invalid @enderror" name="phone"
                                               value="{{ $hotel['phone'] }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ $hotel['email'] }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Edit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>


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
                    <rooms-component :hotel-id="{{ $hotel->id }}" :room-views="{{json_encode($roomViews)}}"
                                     :room-types="{{json_encode($roomTypes)}}"></rooms-component>

                    <upload-component :hotel-id="{{ $hotel->id }}"></upload-component>

                </div>
            </div>
        </div>

    </div>

    </body>
@endsection


@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html>
<head>
<title>Hotels</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div>
                    @foreach($hotels as $hotel)
                        @if(isset($hotel->uploads[0]))
                    <img src={{Storage::url("public/hotels/".$hotel->id."/".$hotel->uploads[0]->path)}}>
                        @else
                     <img src="{{asset('images/No_Image_Available.jpg')}}">
                        @endif
                    <a href="{{route('hotels.show', $hotel->id)}}">{{ $hotel->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection

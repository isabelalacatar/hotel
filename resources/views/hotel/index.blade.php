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

        <div class="card">
            {{--                <div class="card-header">Files <a href="{{ url('management/edit') }}" class="btn btn-info">Add files</a> </div>--}}
            @foreach($hotels as $hotel)
                @if(isset($hotel->uploads[0]))
                    <div class="row">
                        <div class="card col-xs-2">
                            <img class="card-img-top"
                                 src={{Storage::url("public/hotels/".$hotel->id."/".$hotel->uploads[0]->path)}} >
                        </div>
                    </div>
                @else
                    <img src="{{asset('images/No_Image_Available.jpg')}}">
                @endif
                <a href="{{route('hotels.show', $hotel->id)}}">{{ $hotel->name}}</a>
            @endforeach

        </div>
    </div>
</div>

</body>
</html>
@endsection

@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Hotels</title>
</head>
<body>
<div class="album py-5 bg-light">
    <div class="container">

        <div class="card">
            <div class="row">
            @foreach($hotels as $hotel)
                @if(isset($hotel->uploads[0]))

                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top"
                                     src={{Storage::url("public/hotels/".$hotel->id."/".$hotel->uploads[0]->path)}} >
                                {{--                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>--}}
                                <div class="card-body">
                                    <p class="card-text"><a class="card-title"
                                                            href="{{route('hotels.show', $hotel->id)}}">{{ $hotel->name}}</a>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <form method="get" action="{{route('hotels.show', $hotel->id)}}">
                                            <button class="btn btn-sm btn-outline-secondary">View
                                            </button>
                                            </form>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                @else
                    <img src="{{asset('images/No_Image_Available.jpg')}}">
                @endif

            @endforeach
            </div>
        </div>
    </div>
</div>

</body>
</html>
@endsection

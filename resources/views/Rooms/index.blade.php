
@extends('layouts.app')

@section('content')

<div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Name
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Single Room</a>
        <a class="dropdown-item" href="#">Double Room</a>
        <a class="dropdown-item" href="#">Executive Double</a>
        <a class="dropdown-item" href="#">Deluxe Double or Twin</a>
        <a class="dropdown-item" href="#">Suite</a>


    </div>
</div>
<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Floor
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">1</a>
        <a class="dropdown-item" href="#">2</a>
        <a class="dropdown-item" href="#">3</a>
        <a class="dropdown-item" href="#">4</a>
        <a class="dropdown-item" href="#">5</a>


    </div>
</div>

<div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Type
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">1</a>
        <a class="dropdown-item" href="#">2</a>
        <a class="dropdown-item" href="#">3</a>


    </div>

@endsection

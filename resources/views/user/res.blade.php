@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Check in date</th>
                    <th scope="col">Check out date</th>
                    <th scope="col">Room type</th>
                    <th scope="col">Hotel name</th>

                    {{--                    <th scope="col">Password</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($rooms as $room)
                    @foreach($room->reservations as $reservation)
                        @if(isset($reservation))
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$reservation->check_in_date}}</td>
                                <td>{{$reservation->check_out_date}}</td>
                                <td>{{$reservation->room_id}}</td>
                                <td>{{$room->hotel->name}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

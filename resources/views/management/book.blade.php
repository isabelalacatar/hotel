
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User name</th>
                    <th scope="col">Check in date</th>
                    <th scope="col">Check out date</th>
                    <th scope="col">Room type</th>
                    {{--                    <th scope="col">Password</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    @if(isset($reservation))
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$reservation->user->id}}</td>
                        <td>{{$reservation->check_in_date}}</td>
                        <td>{{$reservation->check_out_date}}</td>
                        <td>{{$reservation->room->id}}</td>

                        {{--                        <td>{{$user->password}}</td>--}}



                    </tr>
                    @endif
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

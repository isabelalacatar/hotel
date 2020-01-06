
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <table class="table table-striped table-primary">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Country</th>
                    <th scope="col">Street</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>

                </tr>
                </thead>
                <tbody>
                @foreach($hotels as $hotel)

                    <tr>
                        <th scope="row">  {{ ($hotels ->currentpage()-1) * $hotels ->perpage() + $loop->index + 1 }}</th>
                        <td>{{$hotel->name}}</td>
                        <td>{{$hotel->city}}</td>
                        <td>{{$hotel->country}}</td>
                        <td>{{$hotel->street}}</td>
                        <td>{{$hotel->phone}}</td>
                        <td>{{$hotel->email}}</td>


                        <td><a href="{{ route('management.edit', $hotel->id) }}" class="btn btn-warning">EDIT</a></td>

                            <td>
                                <a class="btn btn-danger" href="#"
                                   onclick="this.nextElementSibling.submit(); return false;">DELETE</a>

                                <form method="POST" class="collapse"
                                      action="{{ route('management.destroy', $hotel->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $hotel->id }}">
                                </form>
                            </td>
                        <td><a href="{{ route('management.book', $hotel->id) }}" class="btn btn-warning">RESERVATIONS</a></td>


                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $hotels->links() }}
        </div>
    </div>
@endsection



@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Country</th>
                    <th scope="col">City</th>
                    <th scope="col">Street</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Password</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->country}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->street}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->password}}</td>

                        <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">EDIT</a></td>
                        @if(Auth::user()->id!==$user->id)
                            <td>
                                <a class="btn btn-danger" href="#"
                                   onclick="this.nextElementSibling.submit(); return false;">DELETE</a>

                                <form method="POST" class="collapse"
                                      action="{{ route('users.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                </form>
                            </td>
                        @endif

                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection

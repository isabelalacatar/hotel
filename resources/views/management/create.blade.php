@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('management.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}">


                                </div>

                            </div>


                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}">


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <input id="country" type="text"
                                           class="form-control @error('country') is-invalid @enderror" name="country"
                                           value="{{ old('country') }}">


                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                           class="form-control @error('city') is-invalid @enderror" name="city"
                                           value="{{ old('city') }}">


                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="street"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Street') }}</label>

                                <div class="col-md-6">
                                    <input id="street" type="text"
                                           class="form-control @error('street') is-invalid @enderror" name="street"
                                           value="{{ old('street') }}">


                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="phone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}">


                                </div>

                            </div>


                            @if(!Auth::guest())
                                @hasrole("admin")

                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1"
                                           class="col-md-4 col-form-label text-md-right">User type</label>
                                    <div class="col-md-6">
                                        <select name="role" class="col-md-4 col-form-label text-md-right"
                                                id="exampleFormControlSelect1">
                                            @foreach($roles as $role)
                                                <option value="{{$role->name}}"
                                                        class="form-control">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endhasrole
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

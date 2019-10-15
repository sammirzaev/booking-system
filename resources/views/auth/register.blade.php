@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h2>{{ __('Register') }}</h2>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row form-group">
                                <div class="col-md-6 padding-bottom">
                                    <label for="name" class="required">{{ __('Name') }}</label>

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 padding-bottom">
                                    <label for="last_name" class="required">{{ __('Last Name') }}</label>

                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name" value="{{ old('last_name') }}" required autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 padding-bottom">
                                    <label for="email" class="required">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 padding-bottom">
                                    <label for="telephone" class="required">Telephone</label>
                                    <input type="text" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror"
                                           placeholder="Your telephone" required
                                           value="{{ old('telephone') }}">
                                    @error('telephone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="password" class="required">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-8">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                                           placeholder="Your address"
                                           value="{{ old('address') }}">
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="postcode">Postcode</label>
                                    <input type="text" name="postcode" id="postcode" class="form-control @error('postcode') is-invalid @enderror"
                                           placeholder="Your postcode"
                                           value="{{ old('postcode') }}">
                                    @error('postcode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror"
                                           placeholder="Your city"
                                           value="{{ old('city') }}">
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="region_state">Region/State</label>
                                    <input type="text" name="region_state" id="region_state" class="form-control @error('region_state') is-invalid @enderror"
                                           placeholder="Your region/state"
                                           value="{{ old('region_state') }}">
                                    @error('region_state')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror"
                                           placeholder="Your country"
                                           value="{{ old('country') }}">
                                    @error('country')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

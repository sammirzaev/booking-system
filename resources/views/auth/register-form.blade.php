<div class="row form-group">
    <div class="col-md-6 padding-bottom">
        <label for="first_name" class="required">{{ __('auth/register.name') }}</label>

        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
               name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

        @error('first_name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
    <div class="col-md-6 padding-bottom">
        <label for="last_name" class="required">{{ __('auth/register.last_name') }}</label>

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
        <label for="email" class="required">{{ __('auth/register.email') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
    <div class="col-md-6 padding-bottom">
        <label for="telephone" class="required">{{ __('auth/register.phone') }}</label>
        <input type="text" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror"
               required value="{{ old('telephone') }}">
        @error('telephone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label for="password" class="required">{{ __('auth/register.password') }}</label>

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right required">{{ __('auth/register.confirm_password') }}</label>

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

    </div>
</div>

<div class="row form-group">
    <div class="col-md-8">
        <label for="address">{{ __('auth/register.address') }}</label>
        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
               value="{{ old('address') }}">
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="postcode">{{ __('auth/register.postcode') }}</label>
        <input type="text" name="postcode" id="postcode" class="form-control @error('postcode') is-invalid @enderror"
               value="{{ old('postcode') }}">
        @error('postcode')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row form-group">
    <div class="col-md-4">
        <label for="city">{{ __('auth/register.city') }}</label>
        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror"
               value="{{ old('city') }}">
        @error('city')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="region_state">{{ __('auth/register.region_state') }}</label>
        <input type="text" name="region_state" id="region_state" class="form-control @error('region_state') is-invalid @enderror"
               value="{{ old('region_state') }}">
        @error('region_state')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="country">{{ __('auth/register.country') }}</label>
        <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror"
               value="{{ old('country') }}">
        @error('country')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row form-group">
    <div class="col-md-4">
        <p class="required">{{ __('auth/register.required') }}</p>
    </div>
</div>

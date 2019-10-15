<form action="{{ (isset($user->id)) ? route('admin.user.update', $user) : route('admin.user.store') }}"
      method="post" enctype="multipart/form-data">
    @csrf
    @isset($user->id)
        @method('put')
    @endisset
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-md-6 padding-bottom">
                            <label for="first_name" class="required">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                   placeholder="Your first name" required
                                   value="{{ isset($user->name) ? $user->name : old('first_name') }}">
                            @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="required">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                   placeholder="Your last name" required
                                   value="{{ isset($user->last_name) ? $user->last_name : old('last_name') }}">
                            @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="email" class="required">Email</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Your email address" required
                                   value="{{ isset($user->email) ? $user->email : old('email') }}">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="telephone" class="required">Telephone</label>
                            <input type="text" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror"
                                   placeholder="Your telephone" required
                                   value="{{ isset($user->detail->tel) ? $user->detail->tel : old('telephone') }}">
                            @error('telephone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                   placeholder="{{ __('Password') }}" >
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('Confirm Password') }}" >
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-8">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                                   placeholder="Your address"
                                   value="{{ isset($user->detail->address) ? $user->detail->address : old('address') }}">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="postcode">Postcode</label>
                            <input type="text" name="postcode" id="postcode" class="form-control @error('postcode') is-invalid @enderror"
                                   placeholder="Your postcode"
                                   value="{{ isset($user->detail->zip) ? $user->detail->zip : old('postcode') }}">
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
                                   value="{{ isset($user->detail->city) ? $user->detail->city : old('city') }}">
                            @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="region_state">Region/State</label>
                            <input type="text" name="region_state" id="region_state" class="form-control @error('region_state') is-invalid @enderror"
                                   placeholder="Your region/state"
                                   value="{{ isset($user->detail->region) ? $user->detail->region : old('region_state') }}">
                            @error('region_state')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror"
                                   placeholder="Your country"
                                   value="{{ isset($user->detail->country) ? $user->detail->country : old('country') }}">
                            @error('country')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="role">Role</label>
                            <select name="role[]" id="role" class="form-control @error('role') is-invalid @enderror" multiple>
                                <option value=""
                                        @if(isset($user->id) && $user->roles->isEmpty() || old('role') === '')
                                            selected
                                        @endif
                                >Default
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}"
                                        @if(isset($user->roles) && $user->roles->isNotEmpty() && $user->roles->where('id', $role->id)->first() || old('role') === $role->id)
                                            selected
                                        @endif
                                    >{{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="float-right"><span class="required"></span> - required filling fields.</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="btn-group float-right">
                <button type="submit" class="btn btn-success">{{ (isset($user->id)) ? 'Update' : 'Save' }}</button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#">{{ (isset($user->id)) ? 'Update' : 'Save' }} & edit</a>
                    <a class="dropdown-item" href="#">{{ (isset($user->id)) ? 'Update' : 'Save' }} & new</a>
                </div>
            </div>
        </div>
    </div>
</form>
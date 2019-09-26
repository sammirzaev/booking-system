<form action="{{ (isset($hotelBonus->id)) ? route('admin.hotel.bonus.update', $hotelBonus) : route('admin.hotel.bonus.store') }}"
      method="post" enctype="multipart/form-data">
    @csrf
    @isset($hotelBonus->id)
        @method('put')
    @endisset
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="row">
                        @foreach(config('settings.locales') as $locale)
                            <div class="col-4">
                                <label class="required" for="title[{{ $locale }}]">Title {{ strtoupper($locale) }}</label>
                                <input type="text" name="title[{{ $locale }}]" id="title[{{ $locale }}]" class="form-control @error("title.$locale") is-invalid @enderror"
                                       placeholder="Enter title {{ strtoupper($locale) }}"
                                       value="{{ (isset($hotelBonus) && isset(current(current($hotelBonus->languages->where('lang', $locale)))->title)) ?
                                       current(current($hotelBonus->languages->where('lang', $locale)))->title : old("title.$locale") }}"
                                required>
                                @error("title.$locale")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <label for="icon">Icon</label>
                            <select name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror">
                                <option value=""
                                        @if(!isset($hotelBonus->icon) || !old('icon'))
                                        selected
                                        @endif
                                >Empty
                                </option>
                                @include('admin.layouts.fontawesome-options')
                            </select>
                            @error('icon')
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
                <button type="submit" class="btn btn-success">{{ (isset($hotelBonus->id)) ? 'Update' : 'Save' }}</button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#">{{ (isset($hotelBonus->id)) ? 'Update' : 'Save' }} & edit</a>
                    <a class="dropdown-item" href="#">{{ (isset($hotelBonus->id)) ? 'Update' : 'Save' }} & new</a>
                </div>
            </div>
        </div>
    </div>
</form>
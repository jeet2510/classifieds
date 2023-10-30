@if (isset($data))
    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __('Property Price') }}</h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="number" min="0" class="input-field" name="r_price" placeholder="{{ __('Price') }}" value="{{ $data->r_price}}">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __('No. Bed') }}</h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="number" min="0" class="input-field" name="r_bed" placeholder="{{ __('Example: 3') }}" value="{{ $data->r_bed}}">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __('No. Bathrooms') }}</h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="number" min="0" class="input-field" name="r_baths" placeholder="{{ __('Example: 1') }}" value="{{ $data->r_baths}}">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __('Square Feet') }}</h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="number" min="0" class="input-field" name="r_square" placeholder="{{ __('Example: 1200 sqrt') }}" value="{{ $data->r_square}}">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __('Property Type') }}</h4>
            </div>
        </div>
        <div class="col-lg-9">
            <select name="r_property_type" class="input-field">
                <option value="buy" {{ $data->r_property_type == 'buy' ? 'selected' : ''}}>{{ __('Buy') }}</option>
                <option value="rent" {{ $data->r_property_type == 'rent' ? 'selected' : ''}}>{{ __('Rent') }}</option>
            </select>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __('Property Price') }}</h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="number" min="0" class="input-field" name="r_price" placeholder="{{ __('Price') }}">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __('No. Bed') }}</h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="number" min="0" class="input-field" name="r_bed" placeholder="{{ __('Example: 3') }}">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __('No. Bathrooms') }}</h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="number" min="0" class="input-field" name="r_baths" placeholder="{{ __('Example: 1') }}">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __('Square Feet') }}</h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="number" min="0" class="input-field" name="r_square" placeholder="{{ __('Example: 1200 sqrt') }}">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __('Property Type') }}</h4>
            </div>
        </div>
        <div class="col-lg-9">
            <select name="r_property_type" class="input-field">
                <option value="buy">{{ __('Buy') }}</option>
                <option value="rent">{{ __('Rent') }}</option>
            </select>
        </div>
    </div>

@endif


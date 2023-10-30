@if (isset($data))
    <div class="dashboard-list-wraps bg-white rounded mb-4">
        <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
            <div class="dashboard-list-wraps-flx">
                <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file me-2 theme-cl fs-sm"></i>@lang('Real estate Info')</h4>
            </div>
        </div>

        <div class="dashboard-list-wraps-body py-3 px-3">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="mb-1">@lang('Property Price')</label>
                        <input type="number" min="0" name="r_price" class="form-control rounded" placeholder="@lang('Property Price')" value="{{ $data->r_price }}"/>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="mb-1">@lang('No. Bed')</label>
                        <input type="number" min="0" name="r_bed" class="form-control rounded" placeholder="@lang('No. Bed')" value="{{ $data->r_price }}"/>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="mb-1">@lang('No. Bathrooms')</label>
                        <input type="number" min="0" name="r_baths" class="form-control rounded" placeholder="@lang('No. Bathrooms')" value="{{ $data->r_price }}"/>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="mb-1">@lang('Square Feet')</label>
                        <input type="number" min="0" name="r_square" class="form-control rounded" placeholder="@lang('Square Feet')" value="{{ $data->r_price }}"/>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="mb-1">@lang('Property Type')</label>
                        <select name="r_property_type" class="input-field">
                            <option value="buy" {{ $data->r_property_type == 'buy' ? 'selected' : '' }}>{{ __('Buy') }}</option>
                            <option value="rent" {{ $data->r_property_type == 'rent' ? 'selected' : '' }}>{{ __('Rent') }}</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>

@else
<div class="dashboard-list-wraps bg-white rounded mb-4">
    <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
        <div class="dashboard-list-wraps-flx">
            <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file me-2 theme-cl fs-sm"></i>@lang('Real estate Info')</h4>
        </div>
    </div>

    <div class="dashboard-list-wraps-body py-3 px-3">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label class="mb-1">@lang('Property Price')</label>
                    <input type="number" min="0" name="r_price" class="form-control rounded" placeholder="@lang('Property Price')" />
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label class="mb-1">@lang('No. Bed')</label>
                    <input type="number" min="0" name="r_bed" class="form-control rounded" placeholder="@lang('No. Bed')" />
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label class="mb-1">@lang('No. Bathrooms')</label>
                    <input type="number" min="0" name="r_baths" class="form-control rounded" placeholder="@lang('No. Bathrooms')" />
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label class="mb-1">@lang('Square Feet')</label>
                    <input type="number" min="0" name="r_square" class="form-control rounded" placeholder="@lang('Square Feet')" />
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label class="mb-1">@lang('Property Type')</label>
                    <select name="r_property_type" class="input-field">
                        <option value="buy">{{ __('Buy') }}</option>
                        <option value="rent">{{ __('Rent') }}</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
</div>

@endif

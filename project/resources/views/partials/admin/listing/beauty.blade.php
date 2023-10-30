@if (isset($beauties))
    @foreach ($beauties as $key => $beauty)
    <input type="hidden" name="service_id[]" value="{{ $beauty->id }}">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading">{{ __('Service Name') }} *</h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="input-field" name="service_name[]" placeholder="{{ __('Enter Name') }}" value="{{ $beauty->service_name }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading">{{ __('Service Price') }} *</h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <input type="number" class="input-field" name="service_price[]" placeholder="{{ __('Enter Price') }}" value="{{ $beauty->service_price }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading">{{ __('Service Photo') }}</h4>
                            <p class="sub-heading">({{ __('Preferred Size 600 x 600') }})</p>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="wrapper-image-preview">
                            <div class="box">
                                <div class="back-preview-image" style="background-image: url({{ $beauty->service_photo ? asset('assets/images/'.$beauty->service_photo) : asset('assets/images/default.png') }});"></div>
                                <div class="upload-options">
                                    <label class="img-upload-label" for="service-items-1"><i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                    <input id="service-items-1" type="file" class="image-upload" name="service_photo[]" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading">{{ __('Service Time') }} *</h4>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="input-field" name="service_from[]" placeholder="{{ __('Enter time') }}" value="{{ $beauty->service_from }}">
                            </div>

                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('To') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="input-field" name="service_to[]" placeholder="{{ __('Enter time') }}" value="{{ $beauty->service_to }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading">{{ __('Service Duration') }} *</h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <input type="number" class="input-field" name="service_duration[]" placeholder="{{ __('Enter Duration') }}" value="{{ $beauty->service_duration }}">
                    </div>
                </div>

            </div>
        </div>
    @endforeach
@else
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading">{{ __('Service Name') }} *</h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="input-field" name="service_name[]" placeholder="{{ __('Enter Name') }}" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading">{{ __('Service Price') }} *</h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <input type="number" class="input-field" name="service_price[]" placeholder="{{ __('Enter Price') }}" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading">{{ __('Service Photo') }}</h4>
                        <p class="sub-heading">({{ __('Preferred Size 600 x 600') }})</p>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="wrapper-image-preview">
                        <div class="box">
                            <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                            <div class="upload-options">
                                <label class="img-upload-label" for="service-items-1"><i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                <input id="service-items-1" type="file" class="image-upload" name="service_photo[]" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading">{{ __('Service Time') }} *</h4>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="input-field" name="service_from[]" placeholder="{{ __('Enter time') }}" value="">
                        </div>

                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('To') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="input-field" name="service_to[]" placeholder="{{ __('Enter time') }}" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading">{{ __('Service Duration') }} *</h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <input type="number" class="input-field" name="service_duration[]" placeholder="{{ __('Enter Duration') }}" value="">
                </div>
            </div>

        </div>
    </div>
@endif

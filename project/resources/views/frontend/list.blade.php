@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Main Section Start ================================== -->
    <section class="gray py-5">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <div class="bg-white rounded mb-4">

                        <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                            <h4 class="ft-medium fs-lg mb-0">@lang('Search Filter')</h4>
                            <div class="ssh-header">
                                <a href="javascript:void(0);" class="clear_all ft-medium text-muted" id="clearAll">@lang('Clear All')</a>
                                <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico ml-2"><i class="lni lni-text-align-right"></i></a>
                            </div>
                        </div>

                        <!-- Find New Property -->
                        <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">
                            <div class="search-inner">

                                <div class="side-filter-box">
                                    <div class="side-filter-box-body">

                                        <!-- Category -->
                                        <div class="inner_widget_link">
                                            <h6 class="ft-medium">@lang('Category')</h6>
                                            <ul class="no-ul-list filter-list">
                                                @foreach ($categories as $key => $category)
                                                    <li>
                                                        <input id="cat{{$key}}" class="checkbox-custom search_cat" value="{{ $category->slug }}" type="checkbox">
                                                        <label for="cat{{$key}}" class="checkbox-custom-label">{{ $category->title }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <!-- Location -->
                                        <div class="inner_widget_link">
                                            <h6 class="ft-medium">@lang('Location')</h6>
                                            <ul class="no-ul-list filter-list">
                                                @foreach ($locations as $key => $location)
                                                    <li>
                                                        <input id="loc{{$key}}" class="checkbox-custom search_loc" value="{{ $location->id }}" type="checkbox">
                                                        <label for="loc{{$key}}" class="checkbox-custom-label">{{ $location->name }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <!-- Features -->
                                        <div class="inner_widget_link">
                                            <h6 class="ft-medium">@lang('Type')</h6>
                                            <ul class="no-ul-list filter-list">
                                                <li>
                                                    <input id="type0" class="checkbox-custom search_type" value="hotel" type="checkbox">
                                                    <label for="type0" class="checkbox-custom-label">@lang('Hotel')</label>
                                                </li>

                                                <li>
                                                    <input id="type1" class="checkbox-custom search_type" value="restaurant" type="checkbox">
                                                    <label for="type1" class="checkbox-custom-label">@lang('Restaurant')</label>
                                                </li>

                                                <li>
                                                    <input id="type2" class="checkbox-custom search_type" value="beauty" type="checkbox">
                                                    <label for="type2" class="checkbox-custom-label">@lang('Beauty')</label>
                                                </li>

                                                <li>
                                                    <input id="type3" class="checkbox-custom search_type" value="real_estate" type="checkbox">
                                                    <label for="type3" class="checkbox-custom-label">@lang('Real Estate')</label>
                                                </li>

                                                <li>
                                                    <input id="type4" class="checkbox-custom search_type" value="doctor" type="checkbox">
                                                    <label for="type4" class="checkbox-custom-label">@lang('Doctor')</label>
                                                </li>

                                                <li>
                                                    <input id="type5" class="checkbox-custom search_type" value="car" type="checkbox">
                                                    <label for="type5" class="checkbox-custom-label">@lang('Car')</label>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Sidebar End -->

                </div>

                <!-- Item Wrap Start -->
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">

                    <!-- row -->
                    <div class="row justify-content-center gx-3" id="show_search_items">
                        @includeIf('partials.front.listing')
                    </div>
                    <!-- row -->

                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Main Section End ================================== -->

    <!-- ======================= Newsletter Start ============================ -->
    @include('partials.front.cta')
    <!-- ======================= Newsletter Start ============================ -->

    <!-- ============================ Footer Start ================================== -->
    @include('partials.front.footer')
    <!-- ============================ Footer End ================================== -->

    <form id="search_item" class="d-none" action="{{route('front.listing')}}" method="get">
        <input type="text" name="type[]" id="type" value="">
        <input type="text" name="location[]" id="location" value="">
		<input type="text" name="category[]" id="categories" value="">
        <button type="submit" id="search_btn_submit" class="d-none"></button>
    </form>
@endsection

@push('js')
<script>
    'use strict';

    $(document).on('click','.search_cat',function(){
       let categories = [];
       $.each($('.search_cat'), function( index, value ) {
            if($(this).is(':checked')){
                categories.push($(this).val());
            }
		});

        $('#search_item #categories').val(categories);
        $('#search_btn_submit').click();
	})

    $(document).on('click','.search_loc',function(){
        let locations = [];
        $.each($('.search_loc'), function( index, value ) {
            if($(this).is(':checked')){
                console.log($(this).val());
                locations.push($(this).val());
            }
		});
        $('#search_item #location').val(locations);
        $('#search_btn_submit').click();
    })

    $(document).on('click','.search_type',function(){
        let types = [];
        $.each($('.search_type'), function( index, value ) {
            if($(this).is(':checked')){
                types.push($(this).val());
            }
		});
        $('#search_item #type').val(types);
        $('#search_btn_submit').click();
    })

    $(document).on('click','#clearAll',function(){
        let categories = [];
        let locations = [];
        let types = [];

        $.each($('.search_cat'), function( index, value ) {
            if($(this).is(':checked')){
                $(this).prop('checked',false);
            }
		});

        $.each($('.search_loc'), function( index, value ) {
            if($(this).is(':checked')){
                $(this).prop('checked',false);
            }
		});

        $.each($('.search_type'), function( index, value ) {
            if($(this).is(':checked')){
                $(this).prop('checked',false);
            }
		});

        $('#search_item #categories').val(categories);
        $('#search_item #location').val(locations);
        $('#search_item #type').val(types);
        $('#search_btn_submit').click();
    })


    function doSubmit(){
        $('#__search').submit();
    }

    $(document).on('submit','#search_item',function(e){
        e.preventDefault();
        $.ajax({
            method: 'GET',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
                $('#show_search_items').html(data);
            }
        });
	})

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click','.wishList',function(){
        let $this = $(this);
        let listingId = $(this).data('listing');
        let userId = $(this).data('user');
        if(userId == ''){
            window.location.href = mainurl+'/user/login'
        }

        $.ajax({
            method:"POST",
            url: mainurl+'/listing/wishlist',
            data: {
                listing_id : listingId,
                user_id : userId
            },
            success:function(data)
            {
                if(data.success){
                    $this.children().prop('class','');
                    $this.children().prop('class','lni lni-heart-filled  position-absolute');
                    toastr.success(data.success);
                }else{
                    $this.children().prop('class','');
                    $this.children().prop('class','lni lni-heart  position-absolute');
                    toastr.error(data.error);
                }
            }

        });

    })


</script>
@endpush

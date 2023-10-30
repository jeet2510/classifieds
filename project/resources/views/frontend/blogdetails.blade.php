@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <section class="page-title gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h2 class="mb-0 ft-medium">{{ $data->title }}</h1>
                        <nav class="transparent">
                            <ol class="breadcrumb p-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active theme-cl" aria-current="page">@lang('Blog Details')</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Blog Detail Start ================================== -->
    <section>
        <div class="container">
            <div class="row">

                <!-- Blog Detail -->
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="article_detail_wrapss single_article_wrap format-standard">
                        <div class="article_body_wrap">

                            <div class="article_featured_image">
                                <img class="img-fluid" src="{{asset('assets/images/'.$data->photo)}}" alt="">
                            </div>

                            <div class="article_top_info">
                                <ul class="article_middle_info">
                                    <li><a href="#"><span class="icons"><i class="ti-user"></i></span>{{ getAdmin()->name }}</a></li>
                                    <li><a href="#"><span class="icons"><i class="fa fa-eye"></i></span>{{ $data->views }} @lang('Views')</a></li>
                                </ul>
                            </div>
                            @php
                                echo $data->details;
                            @endphp
                        </div>
                    </div>


                    <!-- Blog Comment -->
                    <div class="article_detail_wrapss single_article_wrap format-standard">
                        <div class="comment-area">
                            <div id="disqus_thread"></div>
                        </div>
                    </div>


                </div>

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">

                    <!-- Searchbard -->
                    <div class="single_widgets widget_search">
                        <h4 class="title">@lang('Search')</h4>
                        <form action="{{ route('front.blogsearch') }}" class="sidebar-search-form" method="get">
                            <input type="search" name="search" placeholder="@lang('Search..')">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="single_widgets widget_category">
                        <h4 class="title">@lang('Categories')</h4>
                        <ul>
                            @foreach ($bcats as $key=>$category)
                                <li>
                                    <a href="{{ route('front.blogcategory',$category->slug) }}">{{ $category->name }}
                                        <span>{{ count($category->blogs) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Trending Posts -->
                    <div class="single_widgets widget_thumb_post">
                        <h4 class="title">@lang('Recent Posts')</h4>
                        <ul>
                            @foreach ($rblogs as $key=>$data)
                                <li>
                                    <span class="left">
                                        <img src="{{asset('assets/images/'.$data->photo)}}" alt="" class="">
                                    </span>
                                    <span class="right">
                                        <a class="feed-title" href="{{route('blog.details',$data->slug)}}">{{Str::limit($data->title,50)}}</a>
                                        <span class="post-date"><i class="ti-calendar"></i>{{ $data->created_at->diffForHumans() }}</span>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Tags Cloud -->
                    <div class="single_widgets widget_tags">
                        <h4 class="title">@lang('Tags')</h4>
                        <ul>
                            @foreach($tags as $tag)
                                @if(!empty($tag))
                                    <li>
                                        <a href="{{ route('front.blogtags',$tag) }}">{{ $tag }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                </div>

            </div>
            <!-- /row -->

        </div>

    </section>
    <!-- ============================ Blog Detail End ================================== -->

    <!-- ======================= Newsletter Start ============================ -->
        @include('partials.front.cta')
    <!-- ======================= Newsletter Start ============================ -->

    <!-- ============================ Footer Start ================================== -->
    @include('partials.front.footer')
    <!-- ============================ Footer End ================================== -->

@endsection

@push('js')
@if ($gs->is_disqus == 1)
<script>
	'use strict';
	(function () {
		var d = document,
		s = d.createElement('script');
		s.src = 'https://{{ $gs->disqus}}.disqus.com/embed.js';
		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
	})();
</script>
<noscript>{{__('Please enable JavaScript to view the')}} <a href="https://disqus.com/?ref_noscript">{{__('comments powered by Disqus.')}}</a></noscript>
@endif
@endpush

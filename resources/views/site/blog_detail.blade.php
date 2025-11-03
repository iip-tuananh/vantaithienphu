@extends('site.layouts.master')

@section('title')
    {{ $blog->name }} - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$blog->image->path ?? '' }}
@endsection

@section('css')
    <link rel="stylesheet" href="/site/css/page-header.css" />
@endsection

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/site/images/page-header-bg.jpg);">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <div class="page-header__img-1">
                    <img src="/site/images/page-header-img-1.png" alt="" loading="lazy">
                </div>
                <div class="page-header__shape-1 float-bob-y">
                    <img src="/site/images/page-header-shape-1.png" alt="" loading="lazy">
                </div>
                <h3>{{ $blog->name }}</h3>
                <div class="thm-breadcrumb__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><span class="fas fa-angle-right"></span></li>
                        <li>{{ $blog->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--Blog Details Start -->
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{ $blog->image ? $blog->image->path : 'https://placehold.co/600x400' }}" alt="{{ $blog->name }}" loading="lazy">
                        </div>
                        <div class="blog-details__content">
                            <div class="blog-details__user-and-meta">
                                <div class="blog-details__user">
                                    <p><span class="icon-user-1"></span>By Admin</p>
                                </div>
                                <ul class="blog-details__meta list-unstyled">
                                    <li>
                                        <a href="#"><span class="fas fa-clock"></span>{{ $blog->created_at->format('d/m/Y') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="blog-details__title">{{ $blog->name }}
                            </h3>
                            {!! $blog->body !!}

                            <div class="blog-details__tag-and-share">
                                <div class="blog-details__share-box">
                                    <h3 class="blog-details__share-title">Share :</h3>
                                    <div class="blog-details__share">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('front.blogDetail', $blog->slug)) }}" target="_blank"><span class="icon-facebook-app-symbol"></span></a>
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('front.blogDetail', $blog->slug)) }}" target="_blank"><span class="icon-twitter"></span></a>
                                        <a href="https://www.instagram.com/sharer/sharer.php?u={{ urlencode(route('front.blogDetail', $blog->slug)) }}" target="_blank"><span class="icon-instagram"></span></a>
                                        <a href="https://www.linkedin.com/sharer/sharer.php?u={{ urlencode(route('front.blogDetail', $blog->slug)) }}" target="_blank"><span class="icon-instagram"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Start Sidebar-->
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <!--Start Sidebar Single-->
                        <div class="sidebar__single sidebar__search wow fadeInUp" data-wow-delay=".1s">
                            <form action="{{ route('front.search') }}" method="get" class="sidebar__search-form">
                                <input type="search" placeholder="Search...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--End Sidebar Single-->
                        <!--Start Sidebar Single-->
                        <div class="sidebar__single sidebar__category wow fadeInUp" data-wow-delay=".1s">
                            <h3 class="sidebar__title">Dịch vụ</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                @foreach ($services as $service)
                                    <li><a href="{{ route('front.getServiceDetail', $service->slug) }}">{{ $service->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!--End Sidebar Single-->
                        <!--Start Sidebar Single-->
                        <div class="sidebar__single sidebar__post wow fadeInUp" data-wow-delay=".1s">
                            <h3 class="sidebar__title">Bài viết gần đây</h3>
                            <div class="sidebar__post-box">
                                @foreach ($otherBlogs as $otherBlog)
                                    <div class="sidebar__post-single">
                                        <div class="sidebar-post__img">
                                            <img src="{{ $otherBlog->image ? $otherBlog->image->path : 'https://placehold.co/200x100' }}" alt="{{ $otherBlog->name }}" loading="lazy">
                                        </div>
                                        <div class="sidebar__post-content-box">
                                            <h3><a href="{{ route('front.blogDetail', $otherBlog->slug) }}">{{ $otherBlog->name }}</a>
                                        </h3>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--End Sidebar Single-->
                    </div>
                </div>
                <!--End Sidebar-->
            </div>
        </div>
    </section>
    <!--Blog Details Start-->
@endsection

@push('scripts')
@endpush

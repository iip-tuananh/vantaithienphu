@extends('site.layouts.master')
@section('title')
    {{ $categoryBlog->name ?? 'Tin tức và hoạt động' }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$categoryBlog->image->path ?? '' }}
@endsection

@section('css')
    <link rel="stylesheet" href="/site/css/page-header.css" />
    <style>
        .limit-3-line {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .limit-2-line {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/site/images/page-header-bg.jpg);">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <div class="page-header__img-1">
                    <img src="/site/images/page-header-img-1.png" alt="">
                </div>
                <div class="page-header__shape-1 float-bob-y">
                    <img src="/site/images/page-header-shape-1.png" alt="">
                </div>
                <h3>{{ $categoryBlog->name ?? 'Tin tức và hoạt động' }}</h3>
                <div class="thm-breadcrumb__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><span class="fas fa-angle-right"></span></li>
                        <li>{{ $categoryBlog->name ?? 'Tin tức và hoạt động' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--Blog Page Start-->
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <!-- Blog Two Single Start -->
                @foreach ($blogs as $post)
                <div class="col-xl-4 col-lg-6  wow fadeInLeft" data-wow-delay="100ms">
                    <div class="blog-two__single">
                        <div class="blog-two__img">
                            <img src="{{ $post->image ? $post->image->path : 'https://placehold.co/300x200' }}" alt="">
                            <div class="blog-two__plus">
                                <a href="{{ route('front.blogDetail', $post->slug) }}"><i class="icon-plus"></i></a>
                            </div>
                            <div class="blog-two__tag">
                                <a href="{{ route('front.blogs', $post->category->slug) }}">{{ $post->category->name }}</a>
                            </div>
                        </div>
                        <div class="blog-two__content">
                            <ul class="blog-two__meta list-unstyled">
                                <li>
                                    <a href="{{ route('front.blogDetail', $post->category->slug) }}">
                                        <span class="fas fa-calendar-alt"></span>{{ $post->created_at->format('d/m/Y') }}
                                    </a>
                                </li>
                            </ul>
                            <h3 class="blog-two__title limit-2-line"><a href="{{ route('front.blogDetail', $post->slug) }}">{{ $post->name }}</a>
                            </h3>
                            <div class="limit-3-line">{{ strip_tags($post->intro) }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Blog Two Single End -->
                <!-- Blog Two Single End -->
                <div class="blog-list__pagination">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </section>
    <!--Blog Page End-->
@endsection

@push('scripts')
@endpush

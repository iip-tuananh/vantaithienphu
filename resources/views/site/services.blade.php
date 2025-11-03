@extends('site.layouts.master')

@section('title')
    {{ $categoryService->name }} - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$categoryService->image->path ?? '' }}
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
                <h3>{{ $categoryService->name }}</h3>
                <div class="thm-breadcrumb__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><span class="fas fa-angle-right"></span></li>
                        <li>{{ $categoryService->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--Services Two Start-->
    <section class="services-two">
        <div class="container">
            <div class="row">
                <!--Services Two Single Start-->
                @foreach ($services as $service)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="item">
                            <div class="services-two__single">
                                <div class="services-two__img">
                                    <img src="{{ $service->image ? $service->image->path : 'https://placehold.co/600x400' }}" alt="{{ $service->name }}" loading="lazy">
                                </div>
                                <div class="services-two__content">
                                    <div class="services-two__icon">
                                        <span class="icon-truck"></span>
                                    </div>
                                    <div class="services-two__title">
                                        <h3><a href="{{ route('front.getServiceDetail', $service->slug) }}">{{ $service->name }}</a></h3>
                                    </div>
                                    <p class="services-two__text">
                                        {!! $service->description !!}
                                    </p>
                                    <ul class="services-two__point">
                                        <li>
                                            <div class="icon">
                                                <span class="fas fa-check"></span>
                                            </div>
                                            <div class="text">
                                                <p>Chuyên nghiệp</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="fas fa-check"></span>
                                            </div>
                                            <div class="text">
                                                <p>Chất lượng</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="fas fa-check"></span>
                                            </div>
                                            <div class="text">
                                                <p>Giá cả hợp lý</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="services-two__btn">
                                        <a href="{{ route('front.getServiceDetail', $service->slug) }}">Chi Tiết <span class="icon-next"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--Services Two Single End-->
            </div>
        </div>
    </section>
    <!--Services Two End-->
@endsection

@push('scripts')
@endpush

@extends('site.layouts.master')

@section('title')
    Về chúng tôi - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$config->image->path ?? '' }}
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
                    <img src="/site/images/page-header-img-1.png" alt="">
                </div>
                <div class="page-header__shape-1 float-bob-y">
                    <img src="/site/images/page-header-shape-1.png" alt="">
                </div>
                <h3>Về chúng tôi</h3>
                <div class="thm-breadcrumb__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><span class="fas fa-angle-right"></span></li>
                        <li>Về chúng tôi</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--About Two Start-->
    <section class="about-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-two__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-two__img-box">
                            @foreach ($about->galleries as $key => $gallery)
                                <div class="{{ $key == 0 ? 'about-two__img' : 'about-two__img-two' }}">
                                    <img src="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/600x400' }}"
                                        alt="">
                                </div>
                            @endforeach
                            <div class="about-two__counter">
                                <div class="shape1"><img src="/site/images/about-two-shape-1.png" alt="">
                                </div>
                                <div class="count-text-box count-box">
                                    <h2 class="count-text" data-stop="10" data-speed="1500">00</h2>
                                    <span class="plus">+</span>
                                </div>
                                <p>Năm <br>
                                    Kinh Nghiệm
                                </p>
                            </div>
                            <div class="about-two__shape-2 float-bob-x">
                                <img src="/site/images/about-two-shape-2.png" alt="">
                            </div>
                            <div class="about-two__shape-3">
                                <img src="/site/images/about-two-shape-3.png" alt="">
                            </div>
                            <div class="about-two__shape-4 float-bob-y">
                                <img src="/site/images/about-two-shape-4.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-two__right">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline-border"></span>
                                <div class="section-title__shape-1">
                                    <i class="fas fa-plane"></i>
                                </div>
                                <h6 class="section-title__tagline">Về Chúng Tôi</h6>
                                <span class="section-title__tagline-border"></span>
                                <div class="section-title__shape-2">
                                    <i class="fas fa-plane"></i>
                                </div>
                            </div>
                            <h3 class="section-title__title title-animation">Chào mừng quý khách đến với
                                <span>{{ $config->web_title }}</span>
                            </h3>
                        </div>
                        {!! $about->intro_text !!}
                        <div class="about-two__point-box-one mt-2">
                            <ul class="about-two__point-one" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                @foreach ($about->results as $key => $result)
                                    <li style="width: 48%;">
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>{{ $result['title'] }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="about-two__btn-and-author-box">
                            <div class="about-two__btn-box">
                                <a href="{{ route('front.about-us') }}" class="thm-btn">Xem Thêm
                                    <span><i class="icon-right-arrow"></i></span>
                                </a>
                            </div>
                            <div class="about-two__author-box">
                                <div class="about-two__author-details">
                                    <div class="about-two__author-img-box">
                                        <div class="about-two__author-img">
                                            <img src="{{ $about->image ? $about->image->path : 'https://placehold.co/100x100' }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="about-two__author-content">
                                        <h4>Thiên Phú</h4>
                                        <p>Tổng Giám Đốc</p>
                                    </div>
                                </div>
                                <div class="about-two__video-link">
                                    <a href="{{ $about->title_2 ? $about->title_2 : '#' }}" class="video-popup">
                                        <div class="about-two__video-icon">
                                            <span class="fa fa-play"></span>
                                            <i class="ripple"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Two End-->

    <!-- Testimonial Three Start -->
    <section class="testimonial-three" style="padding: 0 0 60px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $about->body_text !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Three End -->

    <!--Services Two Start-->
    <section class="services-two">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box">
                    <span class="section-title__tagline-border"></span>
                    <div class="section-title__shape-1">
                        <i class="fas fa-plane"></i>
                    </div>
                    <h6 class="section-title__tagline">Dịch vụ</h6>
                    <span class="section-title__tagline-border"></span>
                    <div class="section-title__shape-2">
                        <i class="fas fa-plane"></i>
                    </div>
                </div>
                <h3 class="section-title__title title-animation">Dịch vụ của chúng tôi <br>
                    <span>cho khách hàng</span>
                </h3>
            </div>
            <div class="row">
                <!--Services Two Single Start-->
                @foreach ($services as $service)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="item">
                            <div class="services-two__single">
                                <div class="services-two__img">
                                    <img src="{{ $service->image ? $service->image->path : 'https://placehold.co/600x400' }}"
                                        alt="{{ $service->name }}">
                                </div>
                                <div class="services-two__content">
                                    <div class="services-two__icon">
                                        <span class="icon-worldwide-shipping"></span>
                                    </div>
                                    <div class="services-two__title">
                                        <h3><a
                                                href="{{ route('front.services', $service->slug) }}">{{ $service->name }}</a>
                                        </h3>
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
                                        <a href="{{ route('front.services', $service->slug) }}">Chi Tiết <span
                                                class="icon-next"></span>
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

    <!--Start Brand One-->
    <section class="brand-one">
        <div class="container">
            <div class="brand-one__carousel owl-carousel owl-theme">
                <!--Start Brand One Single-->
                @foreach ($partners as $partner)
                    <div class="brand-one__single">
                        <div class="brand-one__single-inner">
                            <a href="{{ $partner->link }}"><img
                                    src="{{ $partner->image ? $partner->image->path : 'https://placehold.co/200x100' }}"
                                    alt="{{ $partner->name }}"></a>
                        </div>
                    </div>
                @endforeach
                <!--End Brand One Single-->
            </div>
        </div>
    </section>
    <!--End Brand One-->
@endsection

@push('scripts')
@endpush

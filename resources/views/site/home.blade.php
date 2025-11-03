@extends('site.layouts.master')

@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$config->image->path ?? '' }}
@endsection

@section('css')
    <style>
        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: 0.25rem;
            padding-left: 10px;
            font-size: 100%;
            color: #fe6402;
        }

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
    <div class="stricky-header stricked-menu main-menu main-menu-two">
        <div class="sticky-header__content"></div>
        <!-- /.sticky-header__content -->
    </div>
    <!-- /.stricky-header -->
    <!--Main Slider Start-->
    <section class="main-slider">
        <div class="swiper-container thm-swiper__slider"
            data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 8000
                }
                }'>
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                <div class="swiper-slide">
                    <div class="main-slider__pattern-bg" style="background-image: url(/site/images/main-slider-pattern.png);">
                    </div>
                    <div class="main-slider__bg-box">
                        <div class="main-slider__bg" style="background-image: url({{ $banner->image ? $banner->image->path : 'https://placehold.co/1920x1080' }});"></div>
                    </div>
                    <div class="main-slider__shape-1"></div>
                    <div class="main-slider__shape-2"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                @php
                                    // Thay phần trong "" thành <span class="highlight">NỘI DUNG</span>
                                    $formatted = preg_replace('/"(.*?)"/', '<span class="highlight">$1</span>', $banner->intro);
                                    $formatted = preg_replace('/(\n)/', '<br>', $formatted);

                                    $sub_formatted = preg_replace('/(\n)/', '<br>', $banner->sub_intro);
                                @endphp
                                <div class="main-slider__content">
                                    <h4 class="main-slider__sub-title">{{ $banner->title }}</h4>
                                    <h2 class="main-slider__title">
                                        {!! $formatted !!}
                                    </h2>
                                    <p class="main-slider__text">
                                        {!! $sub_formatted !!}
                                    </p>
                                    <div class="main-slider__btn-box">
                                        <a href="{{ $banner->link }}" class="thm-btn">Liên Hệ
                                            <span><i class="icon-right-arrow"></i></span>
                                        </a>
                                    </div>
                                    <div class="main-slider__map">
                                        <img src="/site/images/main-slider-map-1.png" alt="" class="float-bob-y" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination" id="main-slider-pagination"></div>
            <!-- If we need navigation buttons -->
        </div>
    </section>
    <!--Main Slider End-->
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
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-3">
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
                                        <h3><a href="{{ route('front.services', $service->slug) }}">{{ $service->name }}</a></h3>
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
                                        <a href="{{ route('front.services', $service->slug) }}">Chi Tiết <span class="icon-next"></span>
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
    <!--About Two Start-->
    <section class="about-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-two__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-two__img-box">
                            @foreach ($about->galleries as $key => $gallery)
                                <div class="{{ $key == 0 ? 'about-two__img' : 'about-two__img-two' }}">
                                    <img src="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/600x400' }}" alt="" loading="lazy">
                                </div>
                            @endforeach
                            <div class="about-two__counter">
                                <div class="shape1"><img src="/site/images/about-two-shape-1.png" alt="" loading="lazy">
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
                                <img src="/site/images/about-two-shape-2.png" alt="" loading="lazy">
                            </div>
                            <div class="about-two__shape-3">
                                <img src="/site/images/about-two-shape-3.png" alt="" loading="lazy">
                            </div>
                            <div class="about-two__shape-4 float-bob-y">
                                <img src="/site/images/about-two-shape-4.png" alt="" loading="lazy">
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
                            <h3 class="section-title__title title-animation">Chào mừng quý khách đến với <span>{{ $config->web_title }}</span>
                            </h3>
                        </div>
                        {!! $about->intro_text !!}
                        <div class="about-two__point-box-one mt-2">
                            <ul class="about-two__point-one">
                                @foreach ($about->results as $key => $result)
                                <li>
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
                                            <img src="{{ $about->image ? $about->image->path : 'https://placehold.co/100x100' }}" alt="" loading="lazy">
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


    <!--Why Choose Two Start-->
    <section class="why-choose-two">
        <div class="why-choose-two__pattern" style="background-image: url(/site/images/why-choose-two-pattern.png);"></div>
        <div class="why-choose-two__bg-box">
            <div class="why-choose-two__shape-bg" style="background-image: url(/site/images/why-choose-two-shpae-bg.png);">
            </div>
        </div>
        <div class="why-choose-two__img reveal">
            <img src="/site/images/why-choose-two-img-1.png" alt="" loading="lazy">
        </div>
        <div class="why-choose-two__client-box">
            <ul class="why-choose-two__review-list">
                <li>
                    <div class="why-choose-two__review-img">
                        <img src="/site/images/why-choose-two-review-img-1-1.jpg" alt="" loading="lazy">
                    </div>
                </li>
                <li>
                    <div class="why-choose-two__review-img">
                        <img src="/site/images/why-choose-two-review-img-1-2.jpg" alt="" loading="lazy">
                    </div>
                </li>
                <li>
                    <div class="why-choose-two__review-img">
                        <img src="/site/images/why-choose-two-review-img-1-3.jpg" alt="" loading="lazy">
                    </div>
                </li>
                <li>
                    <div class="why-choose-two__review-img">
                        <img src="/site/images/why-choose-two-review-img-1-4.jpg" alt="" loading="lazy">
                    </div>
                </li>
            </ul>
            <div class="why-choose-two__client-content">
                <div class="why-choose-two__client-count">
                    <h3 class="odometer" data-count="2500">00</h3>
                    <span>+</span>
                </div>
                <p class="why-choose-two__client-text">Khách Hàng Hài Lòng</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="why-choose-two__left">
                        <div class="why-choose-two__title-box">
                            <div class="section-title text-left sec-title-animation animation-style1">
                                <div class="section-title__tagline-box">
                                    <span class="section-title__tagline-border"></span>
                                    <div class="section-title__shape-1">
                                        <i class="fas fa-plane"></i>
                                    </div>
                                    <h6 class="section-title__tagline">Tại Sao Chọn</h6>
                                    <span class="section-title__tagline-border"></span>
                                    <div class="section-title__shape-2">
                                        <i class="fas fa-plane"></i>
                                    </div>
                                </div>
                                <h3 class="section-title__title title-animation">Dịch vụ vận chuyển
                                    <span>chuyên nghiệp hàng đầu</span>
                                </h3>
                            </div>
                            <p class="why-choose-two__text">Khi gửi hàng, nếu tình trạng hàng hóa không giống như ban đầu ,
                                hư hỏng. Chúng tôi hoàn trả 100% tiền cước & phiếu giảm giá cho lần gửi tiếp theo thay lời
                                xin lỗi hoặc đền bù sau khi thỏa thuận với Quý Khách.
                            </p>
                        </div>
                        <div class="why-choose-two__point-box">
                            <ul class="why-choose-two__point">
                                <li>
                                    <div class="why-choose-two__icon">
                                        <span class="icon-international-shipping"></span>
                                    </div>
                                    <div class="why-choose-two__content">
                                        <h4>Giao hàng tận nơi</h4>
                                        <p>Chúng tôi cung cấp các dịch vụ giao hàng tận nơi trong ngày. Giúp bạn tiết kiệm
                                            thời gian hơn</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="why-choose-two__icon">
                                        <span class="icon-professional-services"></span>
                                    </div>
                                    <div class="why-choose-two__content">
                                        <h4>Bảo hiểm hàng hóa</h4>
                                        <p>Mức phí bảo hiểm là 5% giá trị lô hàng. Giúp bạn yên tâm, tiết kiệm hơn khi gửi
                                            hàng tại Vận tải Thiên Phú</p>
                                    </div>
                                </li>
                            </ul>
                            <ul class="why-choose-two__point why-choose-two__point--two">
                                <li>
                                    <div class="why-choose-two__icon">
                                        <span class="icon-protection"></span>
                                    </div>
                                    <div class="why-choose-two__content">
                                        <h4>Giá cước tiết kiệm</h4>
                                        <p>Vận tải Thiên Phú luôn cố gắng loại bỏ những khâu trung gian để mang đến cho quý
                                            khách dịch vụ tốt nhất</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="why-choose-two__icon">
                                        <span class="icon-tracking"></span>
                                    </div>
                                    <div class="why-choose-two__content">
                                        <h4>Theo dõi xuyên suốt</h4>
                                        <p>Bạn luôn chủ động cập nhật toàn bộ thông tin, lịch sử, của đơn hàng từ lúc gửi
                                            hàng đến khi bạn nhận hàng</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="why-choose-two__btn-box">
                            <a href="{{ route('front.contact') }}" class="thm-btn">Nhận báo giá
                                <span><i class="icon-right-arrow"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose Two End-->

    <!--Counter Two Start -->
    <section class="counter-two">
        <div class="container">
            <div class="row">
                <!--Counter Two Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-6  wow fadeInLeft" data-wow-delay="100ms">
                    <div class="counter-two__single">
                        <div class="counter-two__icon">
                            <span class="icon-world-wide-web"></span>
                        </div>
                        <div class="counter-two__content">
                            <div class="counter-two__count">
                                <h3 class="odometer" data-count="20">00</h3>
                                <span>+</span>
                            </div>
                            <p class="counter-two__count-text">Cơ Sở Hành Chính</p>
                        </div>
                    </div>
                </div>
                <!--Counter Two Single End-->
                <!--Counter Two Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-6 wow fadeInLeft" data-wow-delay="300ms">
                    <div class="counter-two__single">
                        <div class="counter-two__icon">
                            <span class="icon-user-avatar"></span>
                        </div>
                        <div class="counter-two__content">
                            <div class="counter-two__count">
                                <h3 class="odometer" data-count="50">00</h3>
                                <span>+</span>
                            </div>
                            <p class="counter-two__count-text">Nhân Viên</p>
                        </div>
                    </div>
                </div>
                <!--Counter Two Single End-->
                <!--Counter Two Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-6 wow fadeInRight" data-wow-delay="500ms">
                    <div class="counter-two__single">
                        <div class="counter-two__icon">
                            <span class="icon-rating"></span>
                        </div>
                        <div class="counter-two__content">
                            <div class="counter-two__count">
                                <h3 class="odometer" data-count="2.7">00</h3>
                                <span>k</span>
                            </div>
                            <p class="counter-two__count-text">Đánh giá tốt</p>
                        </div>
                    </div>
                </div>
                <!--Counter Two Single End-->
                <!--Counter Two Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-6 wow fadeInRight" data-wow-delay="700ms">
                    <div class="counter-two__single">
                        <div class="counter-two__icon">
                            <span class="icon-delivery-man-1"></span>
                        </div>
                        <div class="counter-two__content">
                            <div class="counter-two__count">
                                <h3 class="odometer" data-count="99">00</h3>
                                <span>%</span>
                            </div>
                            <p class="counter-two__count-text">Đơn Hàng Thành Công</p>
                        </div>
                    </div>
                </div>
                <!--Counter Two Single End-->
            </div>
        </div>
    </section>
    <!--Counter Two End -->
    <!--Contact One Start -->
    <section class="contact-one" ng-controller="ContactPage">
        <div class="contact-one__shape-bg" style="background-image: url(/site/images/contact-one-shape-bg.png);"></div>
        <div class="contact-one__bg-img" style="background-image: url(/site/images/contact-one-bg-img.jpg);"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">

                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="contact-one__right wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="contact-one__content">
                            <p class="contact-one__tagline">Chúng tôi báo giá trong vòng 30 phút!</p>
                            <h2 class="contact-one__title">Yêu Cầu Báo Giá</h2>
                            <form class="contact-one__form" id="form-contact">
                                <div class="contact-one__content-box">
                                    <div class="contact-one__input-box">
                                        <input type="text" placeholder="Tên Của Bạn" name="name" >
                                        <div class="invalid-feedback d-block error" role="alert">
                                            <span ng-if="errors && errors.name">
                                                <% errors.name[0] %>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="contact-one__input-box">
                                        <input type="email" placeholder="Email Của Bạn" name="email" >
                                        <div class="invalid-feedback d-block error" role="alert">
                                            <span ng-if="errors && errors.email">
                                                <% errors.email[0] %>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="contact-one__input-box">
                                        <input type="text" placeholder="Số Điện Thoại Của Bạn" name="phone"
                                            >
                                        <div class="invalid-feedback d-block error" role="alert">
                                            <span ng-if="errors && errors.phone">
                                                <% errors.phone[0] %>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="contact-one__input-box">
                                        <input type="text" placeholder="Loại Hàng Hóa" name="subject" >
                                        <div class="invalid-feedback d-block error" role="alert">
                                            <span ng-if="errors && errors.subject">
                                                <% errors.subject[0] %>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-one__content-bottom">
                                    <button type="button" class="thm-btn" ng-click="submitContact()">Nhận Báo Giá<span><i
                                                class="icon-right-arrow"></i></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact One End -->
    <!--Testimonials Two Start -->
    <section class="testimonial-two">
        <div class="container">
            <div class="section-title text-left sec-title-animation animation-style1">
                <div class="section-title__tagline-box">
                    <span class="section-title__tagline-border"></span>
                    <div class="section-title__shape-1">
                        <i class="fas fa-plane"></i>
                    </div>
                    <h6 class="section-title__tagline">Đánh giá
                    </h6>
                    <span class="section-title__tagline-border"></span>
                    <div class="section-title__shape-2">
                        <i class="fas fa-plane"></i>
                    </div>
                </div>
                <h3 class="section-title__title title-animation"> Khách Hàng Nói Gì <span>Về Chúng Tôi?</span>
                </h3>
            </div>
            <div class="testimonial-two__middle">
                <div class="testimonial-two__carousel owl-carousel owl-theme">
                    <!--Testimonial Two Single Start-->
                    @foreach ($reviews as $review)
                    <div class="item">
                        <div class="testimonial-two__single">
                            <div class="testimonial-two__single-inner">
                                <div class="testimonial-two__shape-1">
                                    <img src="/site/images/testimonial-two-shape-1.png" alt="" loading="lazy">
                                </div>
                                <div class="testimonial-two__quote">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="testimonial-two__ratting">
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                </div>
                                <p class="testimonial-two__text">
                                    {{ $review->message }}
                                </p>
                                <div class="testimonial-two__client-info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{$review->image ? $review->image->path : 'https://placehold.co/100x100' }}" alt="" loading="lazy">
                                    </div>
                                    <div class="testimonial-two__client-content">
                                        <h3><a href="">{{ $review->name }}</a></h3>
                                        <p>{{ $review->position }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--Testimonial Two Single End-->
                </div>
            </div>
        </div>
    </section>
    <!--Testimonials Two End -->


    <!-- Team Two Start -->
    {{-- <section class="team-two">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box">
                    <span class="section-title__tagline-border"></span>
                    <div class="section-title__shape-1">
                        <i class="fas fa-plane"></i>
                    </div>
                    <h6 class="section-title__tagline">Đội Ngũ</h6>
                    <span class="section-title__tagline-border"></span>
                    <div class="section-title__shape-2">
                        <i class="fas fa-plane"></i>
                    </div>
                </div>
                <h3 class="section-title__title title-animation">Nhân Sự Tại <span> Vận Tải Thiên Phú</span>
                </h3>
            </div>
            <div class="team-two__carousel owl-carousel owl-theme">
                <!-- Team Two Single Start -->
                <div class="item">
                    <div class="team-two__single">
                        <div class="team-two__img-box">
                            <div class="team-two__img">
                                <img src="./images/team-2-1.jpg" alt="">
                                <div class="team-two__social">
                                    <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                    <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                    <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-two__content">
                            <h3 class="team-two__name"><a href="">Trần Văn A</a></h3>
                            <p class="team-two__sub-title">Founder</p>
                        </div>
                    </div>
                </div>
                <!-- Team Two Single End -->
                <!-- Team Two Single Start -->
                <div class="item">
                    <div class="team-two__single">
                        <div class="team-two__img-box">
                            <div class="team-two__img">
                                <img src="./images/team-2-2.jpg" alt="">
                                <div class="team-two__social">
                                    <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                    <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                    <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-two__content">
                            <h3 class="team-two__name"><a href="">Nguyễn Thị B</a></h3>
                            <p class="team-two__sub-title">Senior Worker</p>
                        </div>
                    </div>
                </div>
                <!-- Team Two Single End -->
                <!-- Team Two Single Start -->
                <div class="item">
                    <div class="team-two__single">
                        <div class="team-two__img-box">
                            <div class="team-two__img">
                                <img src="./images/team-2-3.jpg" alt="">
                                <div class="team-two__social">
                                    <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                    <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                    <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-two__content">
                            <h3 class="team-two__name"><a href="">Trần Văn C</a></h3>
                            <p class="team-two__sub-title">Senior Associate</p>
                        </div>
                    </div>
                </div>
                <!-- Team Two Single End -->
                <!-- Team Two Single Start -->
                <div class="item">
                    <div class="team-two__single">
                        <div class="team-two__img-box">
                            <div class="team-two__img">
                                <img src="./images/team-2-4.jpg" alt="">
                                <div class="team-two__social">
                                    <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                    <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                    <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-two__content">
                            <h3 class="team-two__name"><a href="">Trần Văn D</a></h3>
                            <p class="team-two__sub-title">Founder</p>
                        </div>
                    </div>
                </div>
                <!-- Team Two Single End -->
                <div class="item">
                    <div class="team-two__single">
                        <div class="team-two__img-box">
                            <div class="team-two__img">
                                <img src="./images/team-2-3.jpg" alt="">
                                <div class="team-two__social">
                                    <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                    <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                    <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-two__content">
                            <h3 class="team-two__name"><a href="">Trần Văn C</a></h3>
                            <p class="team-two__sub-title">Senior Associate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Team Two End -->
    <!-- Blog Two Start -->
    <section class="blog-two">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <h3 class="section-title__title title-animation">Tin Tức & Sự Kiện <span>Mới Nhất</span></h3>
            </div>
            <div class="row">
                <!-- Blog Two Single Start -->
                @foreach ($posts as $post)
                <div class="col-xl-4 col-lg-6  wow fadeInLeft" data-wow-delay="100ms">
                    <div class="blog-two__single">
                        <div class="blog-two__img">
                            <img src="{{ $post->image ? $post->image->path : 'https://placehold.co/300x200' }}" alt="" loading="lazy">
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
            </div>
        </div>
    </section>
    <!-- Blog Two End -->
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
                                alt="{{ $partner->name }}" loading="lazy"></a>
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
    <script>
        app.controller('ContactPage', function($rootScope, $scope, $sce, $interval) {
            $scope.errors = {};
            $scope.sendSuccess = false;

            $scope.submitContact = function() {
                var url = "{{ route('front.submitContact') }}";
                var data = jQuery('#form-contact').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            jQuery('#form-contact')[0].reset();
                            $scope.errors = {};
                            $scope.sendSuccess = true;
                            $scope.$apply();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function() {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }
        })
    </script>
@endpush

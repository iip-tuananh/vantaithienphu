@extends('site.layouts.master')

@section('title')
    {{ $service->name }} - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$service->image->path ?? '' }}
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
                <h3>{{ $service->name }}</h3>
                <div class="thm-breadcrumb__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><span class="fas fa-angle-right"></span></li>
                        <li><a href="{{ route('front.services', $categoryServices->slug) }}">{{ $categoryServices->name }}</a></li>
                        <li><span class="fas fa-angle-right"></span></li>
                        <li>{{ $service->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--Service Details Start-->
    <section class="service-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="service-details__sidebar">
                        <div class="service-details__services-box">
                            <h3 class="service-details__services-title">{{ $categoryServices->name }}</h3>
                            <ul class="service-details__services-list list-unstyled">
                                @foreach ($categoryServices->services as $otherService)
                                    <li class="{{ $service->id == $otherService->id ? 'active' : '' }}">
                                        <a href="{{ route('front.getServiceDetail', $otherService->slug) }}">{{ $otherService->name }}<span class="icon-next"></span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="service-details__sidebar-contact">
                            <div class="service-details__sidebar-contact-img">
                                <div class="inner">
                                    <img src="/site/images/service-details-sidebar-img.png" alt="" loading="lazy">
                                </div>
                            </div>
                            <div class="service-details__sidebar-contact-content">
                                <div class="icon">
                                    <span class="icon-phone-call"></span>
                                </div>
                                <h2><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a></h2>
                                <p>Nếu bạn cần bất kỳ hỗ trợ nào, vui lòng liên hệ với chúng tôi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="service-details__left">
                        <div class="service-details__img">
                            <img src="{{ $service->image ? $service->image->path : 'https://placehold.co/200x100' }}" alt="{{ $service->name }}" loading="lazy">
                        </div>
                        <h3 class="service-details__title-1">{{ $service->name }}</h3>
                        <p class="service-details__text-1">{{ $service->description }}</p>
                        <p class="service-details__text-2">{!! $service->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Service Details End-->
@endsection

@push('scripts')
@endpush

<!--Site Footer Two Start-->
<footer class="site-footer-two">
    <div class="site-footer-two__shape-1 float-bob-x">
        <img src="/site/images/site-footer-two-shape-1.png" alt="" loading="lazy">
    </div>
    <div class="container">
        <div class="site-footer-two__top">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget-two__column footer-widget-two__about">
                        <div class="footer-widget-two__logo">
                            <a href="{{ route('front.home-page') }}"><img src="{{ $config->image ? $config->image->path : 'https://placehold.co/100x100' }}" alt="{{ $config->web_title }}" loading="lazy"></a>
                        </div>
                        <p class="footer-widget-two__about-text">{!! $config->introduction !!}</p>
                        <ul class="footer-widget-two__contact list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-phone-call"></span>
                                </div>
                                <div class="content">
                                    <h5>Liên Hệ</h5>
                                    <p><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-location1"></span>
                                </div>
                                <div class="content">
                                    <h5>Địa Chỉ</h5>
                                    <p>{{ $config->address_company }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget-two__column footer-widget-two__usefull-link">
                        <div class="footer-widget-two__title-box">
                            <h3 class="footer-widget-two__title">Liên Kết</h3>
                        </div>
                        <div class="footer-widget-two__link-box">
                            <ul class="footer-widget-two__link list-unstyled">
                                <li><a href="{{ route('front.home-page') }}">Home</a></li>
                                <li><a href="{{ route('front.about-us') }}">Giới Thiệu</a></li>
                                @foreach ($postCategories as $postCategory)
                                    <li><a href="{{ route('front.blogs', $postCategory->slug) }}">{{ $postCategory->name }}</a></li>
                                @endforeach
                                <li><a href="{{ route('front.contact') }}">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @foreach ($serviceCategories as $serviceCategory)
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="footer-widget-two__column footer-widget-two__services">
                            <div class="footer-widget-two__title-box">
                                <h3 class="footer-widget-two__title">{{ $serviceCategory->name }}</h3>
                            </div>
                            <ul class="footer-widget-two__link list-unstyled">
                                @foreach ($serviceCategory->services as $service)
                                    <li><a href="{{ route('front.getServiceDetail', $service->slug) }}">{{ $service->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="site-footer-two__bottom">
        <div class="container">
            <div class="site-footer-two__bottom-inner">
                <p class="site-footer-two__bottom-text">© Copyright 2025 by <a href="{{ route('front.home-page') }}">{{ $config->short_name_company }}</a>
                    All Rights
                    Reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer Two End-->

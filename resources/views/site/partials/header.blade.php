<header class="main-header-two">
    <div class="main-menu-two__top">
        <div class="main-menu-two__top-inner">
            <ul class="list-unstyled main-menu-two__contact-list">
                <li>
                    <div class="icon">
                        <i class="icon-phone-call"></i>
                    </div>
                    <div class="text">
                        <p><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a></p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <i class="icon-email"></i>
                    </div>
                    <div class="text">
                        <p><a href="mailto:{{ $config->email }}">{{ $config->email }}</a>
                        </p>
                    </div>
                </li>
            </ul>
            <div class="main-menu-two__top-right">
                <div class="main-menu-two__top-time">
                    <div class="main-menu-two__top-time-icon">
                        <span class="fas fa-clock"></span>
                    </div>
                    <p class="main-menu-two__top-text">T2 - T7: 09:00 - 18:00</p>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu">
        <div class="main-menu-two__wrapper">
            <div class="main-menu-two__wrapper-inner">
                <div class="main-menu-two__left">
                    <div class="main-menu-two__logo">
                        <a href="{{ route('front.home-page') }}"><img src="{{ $config->image ? $config->image->path : 'https://placehold.co/100x100' }}" alt="{{ $config->web_title }}"></a>
                    </div>
                </div>
                <div class="main-menu-two__main-menu-box">
                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                    <ul class="main-menu__list">
                        <li>
                            <a href="{{ route('front.home-page') }}">Trang chủ</a>
                        </li>
                        <li>
                            <a href="{{ route('front.about-us') }}">Giới Thiệu</a>
                        </li>
                        @foreach ($serviceCategories as $serviceCategory)
                            <li class="{{ $serviceCategory->services->count() > 0 ? 'dropdown' : '' }}">
                                <a href="{{ route('front.services', $serviceCategory->slug) }}">{{ $serviceCategory->name }}</a>
                                @if ($serviceCategory->services->count() > 0)
                                    <ul class="shadow-box">
                                        @foreach ($serviceCategory->services as $service)
                                            <li><a href="{{ route('front.getServiceDetail', $service->slug) }}">{{ $service->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        @foreach ($postCategories as $postCategory)
                            <li class="{{ $postCategory->childs->count() > 0 ? 'dropdown' : '' }}">
                                <a href="{{ route('front.blogs', $postCategory->slug) }}">{{ $postCategory->name }}</a>
                                @if ($postCategory->childs->count() > 0)
                                    <ul class="shadow-box">
                                        @foreach ($postCategory->childs as $child)
                                            <li><a href="{{ route('front.blogs', $child->slug) }}">{{ $child->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ route('front.contact') }}">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="main-menu-two__right">
                    <div class="main-menu-two__right-content">
                        <div class="main-menu-two__call">
                            <div class="main-menu-two__call-icon">
                                <i class="icon-phone-call"></i>
                            </div>
                            <div class="main-menu-two__call-content">
                                <p class="main-menu-two__call-sub-title">Hotline</p>
                                <h5 class="main-menu-two__call-number"><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a>
                                </h5>
                            </div>
                        </div>
                        <div class="main-menu-two__search-cart-box">
                            <div class="main-menu-two__search-cart-box">
                                <div class="main-menu-two__search-box">
                                    <a href="#"
                                        class="main-menu-two__search searcher-toggler-box icon-search"></a>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu-two__btn-box">
                            <a href="{{ route('front.contact') }}" class="thm-btn">Track Order<span><i
                                        class="icon-right-arrow"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

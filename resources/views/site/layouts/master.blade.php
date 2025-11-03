<!DOCTYPE html>
<html lang="en">

<head>
    @include('site.partials.head')
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap&subset=latin-ext"
        rel="stylesheet">

    <link rel="stylesheet" href="/site/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/site/css/animate.min.css" />
    <link rel="stylesheet" href="/site/css/custom-animate.css" />
    <link rel="stylesheet" href="/site/css/swiper.min.css" />
    <link rel="stylesheet" href="/site/css/font-awesome-all.css" />
    <link rel="stylesheet" href="/site/css/jarallax.css" />
    <link rel="stylesheet" href="/site/css/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="/site/css/flaticon.css">
    <link rel="stylesheet" href="/site/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/site/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="/site/css/nice-select.css" />
    <link rel="stylesheet" href="/site/css/jquery-ui.css" />
    <link rel="stylesheet" href="/site/css/aos.css" />
    <link rel="stylesheet" href="/site/css/odometer.min.css" />
    <link rel="stylesheet" href="/site/css/slider.css" />
    <link rel="stylesheet" href="/site/css/banner.css" />
    <link rel="stylesheet" href="/site/css/footer.css" />
    <link rel="stylesheet" href="/site/css/about.css" />
    <link rel="stylesheet" href="/site/css/service.css" />
    <link rel="stylesheet" href="/site/css/counter.css" />
    <link rel="stylesheet" href="/site/css/why-choose.css" />
    <link rel="stylesheet" href="/site/css/project.css" />
    <link rel="stylesheet" href="/site/css/video.css" />
    <link rel="stylesheet" href="/site/css/team.css" />
    <link rel="stylesheet" href="/site/css/brand.css" />
    <link rel="stylesheet" href="/site/css/download-app.css" />
    <link rel="stylesheet" href="/site/css/testimonial.css" />
    <link rel="stylesheet" href="/site/css/blog.css" />
    <link rel="stylesheet" href="/site/css/sliding-text.css" />
    <link rel="stylesheet" href="/site/css/skill.css" />
    <link rel="stylesheet" href="/site/css/process.css" />
    <link rel="stylesheet" href="/site/css/faq.css" />
    <link rel="stylesheet" href="/site/css/feature.css" />
    <link rel="stylesheet" href="/site/css/cta.css" />
    <link rel="stylesheet" href="/site/css/office-location.css" />
    <link rel="stylesheet" href="/site/css/find-transport.css" />
    <link rel="stylesheet" href="/site/css/pricing.css" />
    <link rel="stylesheet" href="/site/css/contact.css" />
    <!-- template styles -->
    <link rel="stylesheet" href="/site/css/style.css" />
    <link rel="stylesheet" href="/site/css/responsive.css" />
    @yield('css')
</head>

<body class="custom-cursor" ng-app="App">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    <!--Start Preloader-->
    <div class="loader js-preloader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!--End Preloader-->
    <div class="chat-icon"><button type="button" class="chat-toggler"><i class="fa fa-comment"></i></button></div>
    <!--Chat Popup-->
    <div id="chat-popup" class="chat-popup" ng-controller="PopupContactPage">
        <div class="popup-inner">
            <div class="close-chat"><i class="fa fa-times"></i></div>
            <div class="chat-form">
                <p>Để lại thông tin của bạn để chúng tôi có thể liên hệ với bạn.</p>
                <form class="contact-form-validated" id="form-contact">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Tên của bạn" required>
                        <div class="invalid-feedback d-block error" role="alert">
                            <span ng-if="errors && errors.name">
                                <% errors.name[0] %>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="phone" placeholder="Số điện thoại của bạn" required>
                        <div class="invalid-feedback d-block error" role="alert">
                            <span ng-if="errors && errors.phone">
                                <% errors.phone[0] %>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email của bạn" required>
                        <div class="invalid-feedback d-block error" role="alert">
                            <span ng-if="errors && errors.email">
                                <% errors.email[0] %>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Nội dung của bạn" required></textarea>
                        <div class="invalid-feedback d-block error" role="alert">
                            <span ng-if="errors && errors.message">
                                <% errors.message[0] %>
                            </span>
                        </div>
                    </div>
                    <div class="form-group message-btn">
                        <button type="button" class="thm-btn" ng-click="submitContact()"> Gửi
                            <span><i class="icon-right-arrow"></i></span>
                        </button>
                    </div>
                    <div class="result"></div>
                </form>
            </div>
        </div>
    </div>

    <!-- End sidebar widget content -->
    <div class="page-wrapper">
        @include('site.partials.header')
        @yield('content')
        @include('site.partials.footer')
    </div>
    <!-- /.page-wrapper -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="{{ route('front.home-page') }}" aria-label="logo image"><img src="{{ $config->image ? $config->image->path : 'https://placehold.co/100x100' }}" width="140"
                        alt="{{ $config->web_title }}" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:{{ $config->email }}">{{ $config->email }}</a>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a>
                </li>
            </ul>
            <!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="{{ $config->facebook }}" class="fab fa-facebook-square"></a>
                    <a href="{{ $config->instagram }}" class="fab fa-instagram"></a>
                    <a href="{{ $config->linkedin }}" class="fab fa-linkedin"></a>
                    <a href="{{ $config->behance }}" class="fab fa-behance"></a>
                    <a href="{{ $config->youtube }}" class="fab fa-youtube"></a>
                </div>
                <!-- /.mobile-nav__social -->
            </div>
            <!-- /.mobile-nav__top -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <!-- Search Popup -->
    <div class="search-popup">
        <div class="color-layer"></div>
        <button class="close-search"><span class="far fa-times fa-fw"></span></button>
        <form method="post" action="">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- End Search Popup -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Lên đầu</span>
    </a>
    <script src="/site/js/jquery-latest.js"></script>
    <script src="/site/js/bootstrap.bundle.min.js"></script>
    <script src="/site/js/jarallax.min.js"></script>
    <script src="/site/js/jquery.ajaxchimp.min.js"></script>
    <script src="/site/js/jquery.appear.min.js"></script>
    <script src="/site/js/swiper.min.js"></script>
    <script src="/site/js/jquery.magnific-popup.min.js"></script>
    <script src="/site/js/jquery.validate.min.js"></script>
    <script src="/site/js/wNumb.min.js"></script>
    <script src="/site/js/wow.js"></script>
    <script src="/site/js/isotope.js"></script>
    <script src="/site/js/owl.carousel.min.js"></script>
    <script src="/site/js/jquery-ui.js"></script>
    <!-- <script src="./js/jquery.nice-select.min.js"></script> -->
    <script src="/site/js/marquee.min.js"></script>
    <!-- <script src="./js/countdown.min.js"></script> -->
    <script src="/site/js/jquery.circleType.js"></script>
    <script src="/site/js/jquery.fittext.js"></script>
    <script src="/site/js/jquery.lettering.min.js"></script>
    <script src="/site/js/jquery-sidebar-content.js"></script>
    <script src="/site/js/aos.js"></script>
    <script src="/site/js/odometer.min.js"></script>
    <script src="/site/js/typed-2.0.11.js"></script>
    <!-- <script src="./js/jquery.circle-progress.min.js"></script> -->
    <script src="/site/js/gsap.js"></script>
    <script src="/site/js/ScrollTrigger.js"></script>
    <script src="/site/js/SplitText.js"></script>
    <!-- template js -->
    <script src="/site/js/script.js"></script>

    @include('site.partials.angular_mix')
    @stack('scripts')
    <script>
        app.controller('PopupContactPage', function($rootScope, $scope, $sce, $interval) {
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
</body>

</html>

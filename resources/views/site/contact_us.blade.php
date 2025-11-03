@extends('site.layouts.master')
@section('title')
    Liên hệ - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$config->image->path ?? '' }}
@endsection

@section('css')
    <link rel="stylesheet" href="/site/css/page-header.css" />
    <style>
        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: 0.25rem;
            padding-left: 10px;
            font-size: 100%;
            color: #fe6402;
        }
    </style>

    <style>
        .send-success-message {
            display: flex;
            align-items: center;
            background-color: #e6ffed;
            /* nền xanh nhạt */
            border: 1px solid #71d58b;
            /* viền xanh tươi */
            color: #2d6a4f;
            /* chữ xanh đậm */
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 1rem;
            gap: 12px;
            /* khoảng cách icon - text */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 10px;
        }

        .send-success-message i {
            font-size: 1.4rem;
        }

        .send-success-message p {
            margin: 0;
            line-height: 1.4;
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
                <h3>Liên hệ</h3>
                <div class="thm-breadcrumb__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><span class="fas fa-angle-right"></span></li>
                        <li>Liên hệ</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--Contact Info Start-->
    <section class="contact-info">
        <div class="container">
            <div class="row">
                <!--Contact Two Single Start-->
                <div class="col-xl-4 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-phone-call"></span>
                        </div>
                        <p>Số điện thoại / Email</p>
                        <h5><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a></h5>
                        <h5><a href="mailto:{{ $config->email }}">{{ $config->email }}</a></h5>
                    </div>
                </div>
                <!--Contact Two Single End-->
                <!--Contact Two Single Start-->
                {{-- <div class="col-xl-3 col-lg-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-email"></span>
                        </div>
                        <p>Email</p>
                        <h5><a href="mailto:{{ $config->email }}">{{ $config->email }}</a></h5>
                    </div>
                </div> --}}
                <!--Contact Two Single End-->
                <!--Contact Two Single Start-->
                <div class="col-xl-4 col-lg-6 wow fadeInRight" data-wow-delay="300ms">
                    <div class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-24-hours-service"></span>
                        </div>
                        <p>Giờ làm việc</p>
                        <h5>Thứ Hai - Chủ Nhật
                            <br> 7:00 AM - 5:00 PM
                        </h5>
                    </div>
                </div>
                <!--Contact Two Single End-->
                <!--Contact Two Single Start-->
                <div class="col-xl-4 col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                    <div class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-location1"></span>
                        </div>
                        <p>Địa chỉ</p>
                        <h5>{{ $config->address_company }}</h5>
                    </div>
                </div>
                <!--Contact Two Single End-->
            </div>
        </div>
    </section>
    <!--Contact Info End-->
    <!--Contact Page Start-->
    <section class="contact-page" ng-controller="ContactPage">
        <div class="container">
            <div class="contact-page__inner">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="contact-page__left">
                            {!! $config->location !!}
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-page__right">
                            <h3 class="contact-page__form-title">Nhận báo giá</h3>
                            <form class="contact-page__form" id="form-contact">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="contact-page__input-box">
                                            <input type="text" name="name" placeholder="Họ tên" >
                                            <div class="invalid-feedback d-block error" role="alert">
                                                <span ng-if="errors && errors.name">
                                                    <% errors.name[0] %>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="contact-page__input-box">
                                            <input type="email" name="email" placeholder="Email" >
                                            <div class="invalid-feedback d-block error" role="alert">
                                                <span ng-if="errors && errors.email">
                                                    <% errors.email[0] %>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="contact-page__input-box">
                                            <input type="text" placeholder="Số điện thoại" name="phone" >
                                            <div class="invalid-feedback d-block error" role="alert">
                                                <span ng-if="errors && errors.phone">
                                                    <% errors.phone[0] %>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="contact-page__input-box">
                                            <input type="text" placeholder="Tiêu đề" name="subject" >
                                            <div class="invalid-feedback d-block error" role="alert">
                                                <span ng-if="errors && errors.subject">
                                                    <% errors.subject[0] %>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box text-message-box">
                                            <textarea name="message" placeholder="Nội dung" ></textarea>
                                            <div class="invalid-feedback d-block error" role="alert">
                                                <span ng-if="errors && errors.message">
                                                    <% errors.message[0] %>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="contact-page__btn-box">
                                            <button type="button" class="footer-widget__newsletter-btn thm-btn" ng-click="submitContact()">
                                                Gửi yêu cầu
                                                <span><i class="icon-right-arrow"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="result"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Page End-->
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
                            console.log($scope.errors);
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

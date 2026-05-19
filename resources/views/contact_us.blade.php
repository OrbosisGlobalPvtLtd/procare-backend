
@extends('layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
@endsection

@section('meta')
    <meta name="description" content="{{ $seo_setting->seo_description }}">
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="keywords" content="{{ $seo_setting->seo_title }}">
@endsection

@section('frontend-content')
    <!-- Breadcrumbs -->
    <section class="breadcrumbs__content" style="background-image: url({{ asset($breadcrumb) }});">
        <!-- <div class="homec-overlay"></div> -->
        <div class="container">
            <div class="row">
                <!-- Breadcrumb-Content -->
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb__menu list-none">
                            <li><a href="{{ route('home') }}">{{__('user.Home')}}</a></li>
                            <li class="active"><a href="{{ route('contact-us') }}">{{__('user.Contact Us')}}</a></li>
                        </ul>
                        <h2 class="breadcrumb__title m-0">{{__('user.Contact Us')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs -->

    <section class="contact-section pd-top-90 pd-btm-120">
        <div class="container">
            <div class="row align-items-stretch">
                <!-- Left Side: Contact Form -->
                <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                    <div class="homec-property-ag procare-glass-card h-100" style="padding: 40px; background: #0B1C33; border: 1px solid rgba(201,154,46,0.3); border-radius: 10px;">
                        <h3 class="homec-property-ag__title text-white mg-btm-30" style="color: #fff !important;">{{__('user.Contact Now')}}</h3>
                        <form method="POST" action="{{ route('send-contact-message') }}" class="homec-property-ag__form">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="text" name="name" class="form-control" style="background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1); height: 50px;" placeholder="{{__('user.Name')}}" required>
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" name="email" class="form-control" style="background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1); height: 50px;" placeholder="{{__('user.Email')}}" required>
                            </div>
                            <div class="form-group mb-4">
                                <input type="text" name="phone" class="form-control" style="background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1); height: 50px;" placeholder="{{__('user.Phone')}}" required>
                            </div>
                            <div class="form-group mb-4">
                                <input type="text" name="subject" class="form-control" style="background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1); height: 50px;" placeholder="{{__('user.Subject')}}" required>
                            </div>
                            <div class="form-group mb-4">
                                <textarea name="message" class="form-control" style="background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1); height: 120px;" placeholder="{{__('user.Type here')}}" required></textarea>
                            </div>

                            @if($recaptcha_setting->status==1)
                                <div class="form-group mb-4">
                                    <div class="g-recaptcha" data-sitekey="{{ $recaptcha_setting->site_key }}"></div>
                                </div>
                            @endif

                            <button type="submit" class="homec-btn homec-btn__second homec-property-ag__button w-100" style="background: #C99A2E; color: #0B1C33; border: none;"><span>{{__('user.Send Message Now')}}</span></button>
                        </form>
                    </div>
                </div>

                <!-- Right Side: Info & Map -->
                <div class="col-lg-7 col-12">
                    <style>
                        .contact-info-card {
                            display: flex;
                            align-items: center;
                            gap: 18px;
                            padding: 22px;
                            background: #fff;
                            border-radius: 10px;
                            border: 1px solid #E5E7EB;
                            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                            margin-bottom: 20px;
                            min-height: auto;
                            word-break: normal;
                            overflow-wrap: anywhere;
                        }
                        .contact-info-card .icon-box {
                            width: 50px;
                            height: 50px;
                            min-width: 50px;
                            background: rgba(201,154,46,0.1);
                            color: #C99A2E;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 20px;
                        }
                        .contact-info-card h5,
                        .contact-info-card p {
                            white-space: normal;
                            line-height: 1.5;
                            margin: 0;
                        }
                        .contact-info-card p {
                            font-size: 14px;
                            color: #6B7280;
                            margin-bottom: 4px;
                        }
                        .contact-info-card h5 {
                            font-size: 16px;
                            color: #1F2937;
                        }
                        .contact-map iframe {
                            width: 100%;
                            min-height: 360px;
                            border-radius: 10px;
                            border: none;
                        }
                    </style>
                    <div class="row">
                        <!-- Contact Info Cards -->
                        <div class="col-12">
                            <div class="contact-info-card">
                                <div class="icon-box">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="homec-contact__content">
                                    <p>{{__('user.Phone')}}</p>
                                    <h5>{{ $contact->phone }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="contact-info-card">
                                <div class="icon-box">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="homec-contact__content">
                                    <p>{{__('user.Email')}}</p>
                                    <h5>{{ $contact->email }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="contact-info-card">
                                <div class="icon-box">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="homec-contact__content">
                                    <p>{{__('user.Location')}}</p>
                                    <h5>{{ $contact->address }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="contact-map mt-2" style="border-radius: 10px; overflow: hidden; border: 1px solid #E5E7EB; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                        {!! $contact->map !!}   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->



    <!-- Download App -->
    <section class="download-app homec-bg-cover homec-bg-primary-color pd-top-15 pd-btm-15" style="background-image:url({{ asset($mobile_app->app_bg) }})">
        <div class="homec-shape">
            <div class="homec-shape-single homec-shape-11"><img src="{{ asset('frontend/img/anim-shape-10.svg') }}" alt="bg"></div>
            <div class="homec-shape-single homec-shape-12"><img src="{{ asset('frontend/img/anim-shape-10.svg') }}" alt="bg"></div>
            <div class="homec-shape-single homec-shape-13"><img src="{{ asset('frontend/img/anim-shape-10.svg') }}" alt="bg"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="download-app__middle">
                        <div class="download-app__content">
                            <div class="homec-section__head section-white mg-btm-30" data-aos="fade-up" data-aos-delay="400">
                                <h2 class="homec-section__title">{{ $mobile_app->full_title }}</h2>
                                <p class="sec-head__text">{{ $mobile_app->description }}</p>
                            </div>
                            <!-- App Download Button -->
                            <div class="download__app-button" data-aos="fade-up" data-aos-delay="500">
                                <a href="{{ $mobile_app->app_store }}" class="homec-btn homec-btn-primary-overlay homec-btn__download">
                                    <div class="homec-btn__inside">
                                        <i class="fa-brands fa-apple"></i>
                                        <div class="btn-content"><span>{{ $mobile_app->apple_btn_text1 }}</span><p>{{ $mobile_app->apple_btn_text2 }}</p></div>
                                    </div>
                                </a>
                                <a href="{{ $mobile_app->play_store }}" class="homec-btn homec-btn-primary-overlay homec-btn__download">
                                    <div class="homec-btn__inside">
                                        <i class="fa-brands fa-google-play"></i>
                                        <div class="btn-content"><span>{{ $mobile_app->google_btn_text1 }}</span><p>{{ $mobile_app->google_btn_text2 }}</p></div>
                                    </div>
                                </a>
                            </div>
                            <!-- End App Download Button -->
                        </div>
                        <!-- Download Image -->
                        <div class="download-app__img" data-aos="fade-up" data-aos-delay="700">
                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($mobile_app->image, $setting->default_placeholder) }}" alt="mobile_app">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Download App -->

@endsection

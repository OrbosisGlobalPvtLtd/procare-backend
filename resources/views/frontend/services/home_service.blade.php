@extends('layout')

@section('title')
    <title>Home Service Register | {{ $setting->app_name }}</title>
@endsection

@section('frontend-content')
<!-- Breadcrumb -->
<section class="breadcrumbs__content" style="background-image: url({{ asset('frontend/img/breadcrumb.png') }});">
    <div class="homec-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <ul class="breadcrumb__menu list-none">
                        <li><a href="{{ route('home') }}">{{__('user.Home')}}</a></li>
                        <li class="active"><a href="javascript:;">Home Service Register</a></li>
                    </ul>
                    <h2 class="breadcrumb__title m-0">Home Service Register</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb -->

<section class="pd-top-90 pd-btm-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="homec-contact-form" style="background: #FFFFFF; padding: 40px; border-radius: 10px; box-shadow: 0px 5px 20px rgba(0,0,0,0.05); border: 1px solid #E5E7EB;">
                    <h3 class="mg-btm-30" style="color: #1F2937;">Book a Home Service</h3>
                    <form action="{{ route('home-service.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="homec-form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name" class="homec-form-control" required value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="homec-form-group">
                                    <label>Mobile *</label>
                                    <input type="text" name="mobile" class="homec-form-control" required value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="homec-form-group">
                                    <label>Address *</label>
                                    <input type="text" name="address" class="homec-form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="homec-form-group">
                                    <label>Service Type *</label>
                                    <input type="text" name="service_type" class="homec-form-control" placeholder="e.g. Plumbing, Electrical, Cleaning" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="homec-form-group">
                                    <label>Preferred Date *</label>
                                    <input type="date" name="preferred_date" class="homec-form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="homec-form-group">
                                    <label>Remark</label>
                                    <textarea name="remark" class="homec-form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="homec-btn" style="background-color: #C99A2E; border-color: #C99A2E;"><span>Submit Request</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

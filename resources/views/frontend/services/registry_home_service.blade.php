@extends('layout')

@section('title')
<title>Registry Home Service | {{ $setting->app_name }}</title>
@endsection

@section('frontend-content')
<!-- Breadcrumbs -->
<section class="breadcrumbs__content" style="background-image: url({{ asset('frontend/img/bread-overlay.jpg') }});">
    <!-- <div class="homec-overlay"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <ul class="breadcrumb__menu list-none">
                        <li><a href="{{ route('home') }}">{{ __('user.Home') }}</a></li>
                        <li class="active"><a href="javascript:;">Registry Home Service</a></li>
                    </ul>
                    <h2 class="breadcrumb__title m-0">Registry Home Service</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumbs -->

<section class="pd-top-90 pd-btm-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-12">
                <div class="procare-glass-card">
                    <h3 class="homec-property-ag__title text-white mg-btm-30">Request Registry Assistance</h3>

                    @if ($errors->any())
                    <div class="alert alert-danger" style="background: rgba(255, 0, 0, 0.1); border-left: 4px solid red; color: #fff;">
                        <ul class="m-0 pl-3">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('registry-home-service.store') }}" method="POST" enctype="multipart/form-data" class="homec-property-ag__form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <label class="text-white mb-2">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required style="background: #fff; color: #333;" placeholder="Enter your full name" value="{{ Auth::check() ? Auth::user()->name : old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <label class="text-white mb-2">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control" required style="background: #fff; color: #333;" placeholder="Enter mobile number" value="{{ Auth::check() ? Auth::user()->phone : old('mobile') }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <label class="text-white mb-2">Email Address</label>
                                    <input type="email" name="email" class="form-control" style="background: #fff; color: #333;" placeholder="Enter email address" value="{{ Auth::check() ? Auth::user()->email : old('email') }}">
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <label class="text-white mb-2">Property Type</label>
                                    <select name="property_type" class="form-control" style="background: #fff; color: #333;">
                                        <option value="">Select Property Type</option>
                                        <option value="Residential">Residential</option>
                                        <option value="Commercial">Commercial</option>
                                        <option value="Plot/Land">Plot / Land</option>
                                        <option value="Agricultural">Agricultural</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="form-group mb-4">
                                    <label class="text-white mb-2">Property Address</label>
                                    <input type="text" name="property_address" class="form-control" style="background: #fff; color: #333;" placeholder="Enter property address" value="{{ old('property_address') }}">
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <label class="text-white mb-2">Preferred Date</label>
                                    <input type="date" name="preferred_date" class="form-control" style="background: #fff; color: #333;" value="{{ old('preferred_date') }}">
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <label class="text-white mb-2">Preferred Time</label>
                                    <input type="time" name="preferred_time" class="form-control" style="background: #fff; color: #333;" value="{{ old('preferred_time') }}">
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <label class="text-white mb-2">Upload Document (Optional)</label>
                                    <input type="file" name="document" class="form-control" style="background: #fff; color: #333; padding: 8px;" accept=".pdf,.jpg,.jpeg,.png">
                                    <small class="text-white-50">Max size: 10MB (PDF, JPG, PNG)</small>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-4">
                                    <label class="text-white mb-2">Requirement / Remark</label>
                                    <textarea name="remark" class="form-control" rows="4" style="background: #fff; color: #333;" placeholder="Describe your requirement here...">{{ old('remark') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="homec-btn homec-btn__second homec-property-ag__button w-100" style="border-radius: 8px;"><span>Request Registry Assistance</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layout')

@section('title')
    <title>{{ $notice->title }} | {{ $setting->app_name }}</title>
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
                        <li><a href="{{ route('jahir-suchna') }}">Jahir Suchna</a></li>
                        <li class="active"><a href="javascript:;">Details</a></li>
                    </ul>
                    <h2 class="breadcrumb__title m-0">{{ $notice->title }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb -->

<section class="pd-top-90 pd-btm-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
                <div class="card">
                    <div class="card-body">
                        @if($notice->image)
                        <img src="{{ $notice->image ? asset('public/' . $notice->image) : asset($setting->default_placeholder) }}" class="img-fluid mb-4 rounded" alt="{{ $notice->title }}" style="width: 100%; max-height: 400px; object-fit: cover;">
                        @endif
                        <h2 class="mb-3">{{ $notice->title }}</h2>
                        <div class="d-flex mb-4">
                            <span class="badge bg-primary me-3 p-2 text-white" style="background-color: #C99A2E !important;">{{ $notice->notice_type }}</span>
                            <span class="text-muted"><i class="fa fa-calendar"></i> {{ $notice->notice_date }}</span>
                        </div>
                        <div class="content">
                            {!! $notice->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

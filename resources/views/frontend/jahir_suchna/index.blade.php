@extends('layout')

@section('title')
    <title>Jahir Suchna | {{ $setting->app_name }}</title>
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
                        <li class="active"><a href="javascript:;">Jahir Suchna</a></li>
                    </ul>
                    <h2 class="breadcrumb__title m-0">Jahir Suchna</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb -->

<section class="pd-top-90 pd-btm-120">
    <div class="container">
        <div class="row">
            @forelse($notices as $notice)
            <div class="col-lg-4 col-md-6 col-12 mg-top-30">
                <div class="homec-property">
                    <div class="homec-property__head">
                        <img src="{{ $notice->image ? asset($notice->image) : asset($setting->default_placeholder) }}" alt="{{ $notice->title }}">
                        <div class="homec-property__bsticky">
                            <span class="homec-property__sale">{{ $notice->notice_type }}</span>
                        </div>
                    </div>
                    <div class="homec-property__body">
                        <h3 class="homec-property__title"><a href="{{ route('jahir-suchna.show', $notice->id) }}">{{ $notice->title }}</a></h3>
                        <div class="homec-property__list">
                            <span class="homec-property__list-icon"><i class="fa fa-calendar"></i></span>
                            <span class="homec-property__list-text">{{ $notice->notice_date }}</span>
                        </div>
                        <p>{!! Str::limit(strip_tags($notice->description), 100) !!}</p>
                        <a href="{{ route('jahir-suchna.show', $notice->id) }}" class="homec-btn homec-btn__second"><span>Read More</span></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <h3>No Jahir Suchna found.</h3>
            </div>
            @endforelse
        </div>
        <div class="row mg-top-40">
            <div class="col-12">
                {{ $notices->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@endsection

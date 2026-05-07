@extends('layout')

@section('title')
    <title>Jahir Suchna | {{ $setting->app_name }}</title>
@endsection

@section('frontend-content')
<style>
    :root{
        --pc-gold:#C99A2E;
        --pc-gold-dark:#B88A1F;
        --pc-dark:#1F2937;
        --pc-text:#111827;
        --pc-muted:#6B7280;
        --pc-bg:#F8F7F4;
        --pc-border:#E5E7EB;
        --pc-card:#FFFFFF;
    }

    .pc-notice-wrap{
        background:linear-gradient(180deg,#fff 0%,var(--pc-bg) 100%);
        padding:70px 0 100px;
    }

    .pc-notice-grid{
        display:grid;
        grid-template-columns:repeat(3,minmax(0,1fr));
        gap:26px;
    }

    .pc-notice-card{
        height:100%;
        background:var(--pc-card);
        border:1px solid var(--pc-border);
        border-radius:22px;
        overflow:hidden;
        box-shadow:0 14px 36px rgba(17,24,39,.08);
        transition:.25s ease;
        display:flex;
        flex-direction:column;
    }

    .pc-notice-card:hover{
        transform:translateY(-5px);
        box-shadow:0 24px 52px rgba(17,24,39,.12);
        border-color:rgba(201,154,46,.45);
    }

    .pc-notice-img{
        position:relative;
        height:235px;
        overflow:hidden;
        background:#f3f4f6;
    }

    .pc-notice-img img{
        width:100%;
        height:235px;
        object-fit:cover;
        display:block;
        transition:.35s ease;
    }

    .pc-notice-card:hover .pc-notice-img img{
        transform:scale(1.04);
    }

    .pc-notice-badge{
        position:absolute;
        top:16px;
        left:16px;
        padding:8px 14px;
        border-radius:999px;
        background:rgba(255,243,210,.95);
        color:var(--pc-dark);
        font-size:13px;
        font-weight:800;
        text-transform:capitalize;
        box-shadow:0 10px 20px rgba(17,24,39,.12);
    }

    .pc-notice-body{
        padding:22px;
        display:flex;
        flex-direction:column;
        flex:1;
    }

    .pc-notice-title{
        font-size:22px;
        line-height:1.32;
        font-weight:800;
        margin:0 0 14px;
        color:var(--pc-text);
    }

    .pc-notice-title a{
        color:inherit;
        text-decoration:none;
    }

    .pc-notice-card:hover .pc-notice-title a{
        color:var(--pc-gold);
    }

    .pc-notice-meta{
        display:flex;
        align-items:center;
        gap:9px;
        color:var(--pc-muted);
        font-size:14px;
        font-weight:600;
        margin-bottom:13px;
    }

    .pc-notice-meta i{
        color:var(--pc-gold);
    }

    .pc-notice-desc{
        color:#374151;
        font-size:15px;
        line-height:1.65;
        margin:0 0 20px;
        display:-webkit-box;
        -webkit-line-clamp:3;
        -webkit-box-orient:vertical;
        overflow:hidden;
    }

    .pc-notice-btn{
        margin-top:auto;
        width:max-content;
        display:inline-flex;
        align-items:center;
        gap:8px;
        padding:12px 20px;
        border-radius:14px;
        background:var(--pc-gold);
        color:#fff !important;
        font-weight:800;
        text-decoration:none;
        box-shadow:0 12px 24px rgba(201,154,46,.28);
        transition:.2s ease;
    }

    .pc-notice-btn:hover{
        background:var(--pc-gold-dark);
        color:#fff !important;
        transform:translateY(-2px);
    }

    .pc-empty{
        padding:60px 20px;
        background:#fff;
        border:1px solid var(--pc-border);
        border-radius:22px;
        text-align:center;
        color:var(--pc-muted);
    }

    @media(max-width:991px){
        .pc-notice-grid{grid-template-columns:repeat(2,minmax(0,1fr));}
    }

    @media(max-width:575px){
        .pc-notice-wrap{padding:45px 0 70px;}
        .pc-notice-grid{grid-template-columns:1fr;gap:20px;}
        .pc-notice-img,.pc-notice-img img{height:215px;}
        .pc-notice-title{font-size:20px;}
    }
</style>

<section class="breadcrumbs__content" style="background-image: url({{ asset('frontend/img/breadcrumb.png') }});">
    <div class="homec-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <ul class="breadcrumb__menu list-none">
                        <li><a href="{{ route('home') }}">{{ __('user.Home') }}</a></li>
                        <li class="active"><a href="javascript:;">Jahir Suchna</a></li>
                    </ul>
                    <h2 class="breadcrumb__title m-0">Jahir Suchna</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pc-notice-wrap">
    <div class="container">
        <div class="pc-notice-grid">
            @forelse($notices as $notice)
                <div>
                    <article class="pc-notice-card">
                        <a href="{{ route('jahir-suchna.show', $notice->id) }}" class="pc-notice-img">
                            <img
                                src="{{ $notice->image ? asset('public/' . $notice->image) : asset($setting->default_placeholder) }}"
                                alt="{{ $notice->title }}"
                            >
                            @if($notice->notice_type)
                                <span class="pc-notice-badge">{{ $notice->notice_type }}</span>
                            @endif
                        </a>

                        <div class="pc-notice-body">
                            <h3 class="pc-notice-title">
                                <a href="{{ route('jahir-suchna.show', $notice->id) }}">
                                    {{ $notice->title }}
                                </a>
                            </h3>

                            @if($notice->notice_date)
                                <div class="pc-notice-meta">
                                    <i class="fa fa-calendar"></i>
                                    <span>{{ \Carbon\Carbon::parse($notice->notice_date)->format('d M, Y') }}</span>
                                </div>
                            @endif

                            <p class="pc-notice-desc">
                                {{ Str::limit(strip_tags($notice->description), 145) }}
                            </p>

                            <a href="{{ route('jahir-suchna.show', $notice->id) }}" class="pc-notice-btn">
                                Read More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @empty
                <div style="grid-column:1 / -1;">
                    <div class="pc-empty">
                        <h3>No Jahir Suchna found.</h3>
                    </div>
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
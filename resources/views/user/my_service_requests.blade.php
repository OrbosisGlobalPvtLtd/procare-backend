@extends('layout')
@section('title')
<title>My Service Requests | ProCare Real Estate</title>
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
                        <li class="active"><a href="javascript:;">My Service Requests</a></li>
                    </ul>
                    <h2 class="breadcrumb__title m-0">My Service Requests</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumbs -->

<section class="homec-dashboard pd-top-100 pd-btm-100 homec-bg-third-color">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="homec-dashboard__middle">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 mg-top-30">
                            @include('user.sidebar')
                        </div>
                        <div class="col-lg-9 col-md-8 col-12 mg-top-30">
                            <div class="homec-dashboard__inner homec-border procare-glass-card" style="border: none;">
                                <h3 class="homec-dashboard__heading m-0 text-white mg-btm-30">My Service Requests</h3>
                                
                                <div class="homec-dashboard__body">
                                    @if($requests->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-hover" style="background: rgba(255,255,255,0.05); color: #fff; border-radius: 8px; overflow: hidden;">
                                            <thead style="background: #1e293b;">
                                                <tr>
                                                    <th class="text-white">S.No.</th>
                                                    <th class="text-white">Request Type</th>
                                                    <th class="text-white">Property Type</th>
                                                    <th class="text-white">Date Submitted</th>
                                                    <th class="text-white">Status</th>
                                                    <th class="text-white">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($requests as $request)
                                                <tr>
                                                    <td style="color: #cbd5e1;">{{ $loop->iteration }}</td>
                                                    <td style="color: #cbd5e1;">{{ ucwords(str_replace('_', ' ', $request->request_type)) }}</td>
                                                    <td style="color: #cbd5e1;">{{ $request->property_type ?? 'N/A' }}</td>
                                                    <td style="color: #cbd5e1;">{{ $request->created_at->format('d M, Y') }}</td>
                                                    <td>{!! $request->status_badge !!}</td>
                                                    <td>
                                                        @if($request->document)
                                                        <a href="{{ $request->document_url }}" target="_blank" class="btn btn-sm btn-info" style="background: #C99A2E; border: none;"><i class="fas fa-download"></i> Doc</a>
                                                        @else
                                                        <span class="text-muted" style="color: #64748b !important;">No Doc</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @if($request->admin_note)
                                                <tr>
                                                    <td colspan="6" style="background: rgba(0,0,0,0.15); border-top: 1px dashed rgba(255,255,255,0.1);">
                                                        <strong style="color: #C99A2E;">Admin Note:</strong> <span style="color: #cbd5e1;">{{ $request->admin_note }}</span>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        {{ $requests->links('pagination::bootstrap-4') }}
                                    </div>
                                    @else
                                    <div class="text-center py-5">
                                        <div class="mb-4">
                                            <i class="fas fa-file-signature fa-4x" style="color: rgba(255,255,255,0.2);"></i>
                                        </div>
                                        <h4 class="text-white">No Service Requests Found</h4>
                                        <p style="color: #cbd5e1;">You haven't submitted any service requests yet.</p>
                                        <a href="{{ route('registry-home-service.index') }}" class="homec-btn" style="background: #C99A2E; border-color: #C99A2E;"><span>Request Registry Assistance</span></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
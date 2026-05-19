@extends('admin.master_layout')
@section('title')
<title>Service Request Details</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Service Request Details</h1>
        </div>

        <div class="section-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i> Back</a>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Request Information</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $request->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $request->email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{ $request->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Request Type</th>
                                    <td>{{ ucwords(str_replace('_', ' ', $request->request_type)) }}</td>
                                </tr>
                                <tr>
                                    <th>Property Type</th>
                                    <td>{{ $request->property_type ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Property Address</th>
                                    <td>{{ $request->property_address ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $request->address ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Preferred Date</th>
                                    <td>{{ $request->preferred_date ? $request->preferred_date->format('Y-m-d') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Preferred Time</th>
                                    <td>{{ $request->preferred_time ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Remark</th>
                                    <td>{{ $request->remark ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Document</th>
                                    <td>
                                        @if($request->document)
                                        <a href="{{ $request->document_url }}" target="_blank" class="btn btn-sm btn-info">View Document</a>
                                        @else
                                        No Document
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Status</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.service-requests.update', $request->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="in_review" {{ $request->status == 'in_review' ? 'selected' : '' }}>In Review</option>
                                        <option value="approved" {{ $request->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="rejected" {{ $request->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Admin Note</label>
                                    <textarea name="admin_note" class="form-control" rows="5">{{ $request->admin_note }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

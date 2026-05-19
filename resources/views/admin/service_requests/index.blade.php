@extends('admin.master_layout')
@section('title')
<title>{{ $title }}</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Mobile</th>
                                            <th>Property Type</th>
                                            <th>Request Type</th>
                                            <th>Preferred Date</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requests as $request)
                                        <tr>
                                            <td>{{ $request->id }}</td>
                                            <td>{{ $request->name }}</td>
                                            <td>{{ $request->mobile }}</td>
                                            <td>{{ $request->property_type ?? 'N/A' }}</td>
                                            <td>{{ ucwords(str_replace('_', ' ', $request->request_type)) }}</td>
                                            <td>{{ $request->preferred_date ? $request->preferred_date->format('Y-m-d') : 'N/A' }}</td>
                                            <td>
                                                {!! $request->status_badge !!}
                                            </td>
                                            <td>{{ $request->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('admin.service-requests.show', $request->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $request->id }})"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/service-requests/") }}'+"/"+id)
    }
</script>
@endsection

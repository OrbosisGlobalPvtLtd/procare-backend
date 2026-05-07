@extends('admin.master_layout')
@section('title')
<title>Jahir Suchnaye</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jahir Suchnaye (Public Notices)</h1>
        </div>

        <div class="section-body">
            <a href="{{ route('admin.public-notices.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Add New Notice</a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($notices as $notice)
                                        <tr>
                                            <td>{{ $notice->id }}</td>
                                            <td>{{ $notice->title }}</td>
                                            <td>{{ $notice->notice_type }}</td>
                                            <td>{{ $notice->notice_date }}</td>
                                            <td>
                                                @if($notice->status == 'active')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.public-notices.edit', $notice->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $notice->id }})"><i class="fas fa-trash"></i></a>
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
        $("#deleteForm").attr("action",'{{ url("admin/public-notices/") }}'+"/"+id)
    }
</script>
@endsection

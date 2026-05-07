@extends('admin.master_layout')
@section('title')
<title>Edit Notice</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Jahir Suchnaye</h1>
        </div>

        <div class="section-body">
            <a href="{{ route('admin.public-notices.index') }}" class="btn btn-primary mb-4"><i class="fas fa-list"></i> Notice List</a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.public-notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control" value="{{ $notice->title }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Notice Type</label>
                                            <input type="text" name="notice_type" class="form-control" value="{{ $notice->notice_type }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Notice Date</label>
                                            <input type="date" name="notice_date" class="form-control" value="{{ $notice->notice_date }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" class="form-control-file">
                                            @if($notice->image)
                                                <img src="{{ asset($notice->image) }}" width="100px" class="mt-2" alt="Notice Image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control summernote">{{ $notice->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="active" {{ $notice->status == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ $notice->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">Update Notice</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

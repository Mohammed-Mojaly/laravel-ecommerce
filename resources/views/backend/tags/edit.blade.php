@extends('layouts.admin')
@section('content')


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">


        <div class="card-header mb-3 py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Edit Tag {{ $tag->name}}</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.tags.index') }}" class="btn btn-inverse-primary btn-fw">

                    <span class="icon text-white-50">
                        <i class="mdi mdi-home"></i>
                        <span class="text">Tags</span>
                    </span>
                </a>
            </div>
        </div>



        <div class="card-body">
        <form action="{{ route('admin.tags.update', $tag->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name' ,  $tag->name) }}" class="form-control">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status' ,  $tag->status) == 1 ? 'selected' : null }}>Active</option>
                        <option value="0" {{ old('status' ,  $tag->status) == 0 ? 'selected' : null }}>Inactive</option>
                    </select>
                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                </div>
        </div>



        <div class="form-group pt-4">
            <button type="submit" name="submit" class="btn btn-primary">Update Tag</button>
        </div>

        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

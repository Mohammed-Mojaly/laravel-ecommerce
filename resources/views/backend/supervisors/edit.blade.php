@extends('layouts.admin')
@section('content')
<style>
    .select2-selection__choice{
        font-size: 16px !important;
    }
    #select2-tags-qg-results{
        background: #636363 !important;
    }
</style>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">


        <div class="card-header mb-3 py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Edit supervisor ({{$supervisor->full_name}})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.supervisors.index') }}" class="btn btn-inverse-primary btn-fw">

                    <span class="icon text-white-50">
                        <i class="mdi mdi-home"></i>
                        <span class="text">Supervisors</span>
                    </span>
                </a>
            </div>
        </div>

        <div class="card-body">
        <form class="forms-sample" action="{{route('admin.supervisors.update' , $supervisor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name' , $supervisor->first_name) }}" class="form-control">
                        @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name' , $supervisor->last_name) }}" class="form-control">
                        @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="{{ old('username' , $supervisor->username) }}" class="form-control">
                        @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ old('email' , $supervisor->email) }}" class="form-control">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" value="{{ old('mobile' , $supervisor->mobile) }}" class="form-control">
                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password"  class="form-control">
                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status' , $supervisor->status) == 1 ? 'selected' : null }}>Active</option>
                                <option value="0" {{ old('status' , $supervisor->status) == 0 ? 'selected' : null }}>Inactive</option>
                            </select>
                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                       </div>

                <div class="col-3">

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                     <div class="form-group">
                        <label for="permissions">Permissions</label>
                        <select name="permissions[]" class="form-control select2" multiple="multiple">
                        @forelse($permissions as $permission)
                             <option value="{{ $permission->id }}" {{ in_array($permission->id,old('permissions' , $supervisorPermissions)) ? 'selected' : null }}>{{ $permission->display_name }}</option>
                        @empty
                        @endforelse
                        </select>
                        @error('permissions')<span class="text-danger">{{ $message }}</span>@enderror
                     </div>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12">
                    <label for="user_image">User Image</label>
                    <br>
                    <div class="file-loading">
                        <input type="file" name="user_image" id="supervisor-image" class="file-input-overview">
                        <span class="form-text text-muted">Image width should be 300px x 300px</span>
                        @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

        <div class="form-group pt-4">
            <button type="submit" name="submit" class="btn btn-primary">Update Supervisor</button>
        </div>

        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
    <script>
        $(function(){
            $("#supervisor-image").fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if($supervisor->user_image != '')
                        "{{ asset('assets/users/' . $supervisor->user_image) }}",
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                        @if($supervisor->user_image != '')
                    {
                        caption: "{{ $supervisor->user_image }}",
                        size: '1111',
                        width: "120px",
                        url: "{{ route('admin.supervisors.remove_image', ['supervisor_id' => $supervisor->id, '_token' => csrf_token()]) }}",
                        key: {{ $supervisor->id }}
                    }
                    @endif
                ]
            });

           $(".select2").select2({
            tags: true,
            closeOnSelect: false,
            minimumResultsForSearch: Infinity,

        });

        });
    </script>
@endsection

@extends('layouts.admin')
<style>


</style>

@section('content')

<div class="mt-2">
        <div class="row p-4">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body" style="background: #191c24">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if (auth()->user()->user_image != '')

                            <img src="{{asset('assets/users/'. auth()->user()->user_image)}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">

                            @else
                            <img src="{{asset('assets/users/avatar.jpg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">

                            @endif
                            <div class="mt-3">
                                <h4>{{auth()->user()->full_name}}</h4>

                                <p class="text-muted font-size-sm">{{auth()->user()->email}}</p>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body" style="background: #191c24;">
                        <form action="{{ route('admin.update_account_settings', auth()->id()) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">First Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}" class="form-control">
                                @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}" class="form-control">
                                @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="username" value="{{ old('username', auth()->user()->username) }}" class="form-control">
                            @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control">
                               @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="number" name="mobile" value="{{ old('mobile', auth()->user()->mobile) }}" class="form-control">
                                @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="password" name="password" class="form-control">
                                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-12">
                                <label for="cover">User Image</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file" name="user_image" id="admin-image" class="file-input-overview">
                                    <span class="form-text text-muted">Image width should be 300px x 300px</span>
                                    @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
</div>

@endsection

@section('script')

    <script>
        $(function(){
            $("#admin-image").fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if(auth()->user()->user_image != '')
                        "{{ asset('assets/users/' . auth()->user()->user_image) }}",
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                        @if(auth()->user()->user_image != '')
                    {
                        caption: "{{ auth()->user()->user_image }}",
                        size: '1111',
                        width: "120px",
                        url: "{{ route('admin.remove_image', ['admin_id' => auth()->id(), '_token' => csrf_token()]) }}",
                        key: {{ auth()->id() }}
                    }
                    @endif
                ]
            });
        });
    </script>
@endsection



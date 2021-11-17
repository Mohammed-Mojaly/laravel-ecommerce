@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Supervisors</h6>
            @ability('admin','create_supervisors')
            <div class="ml-auto">
                <a href="{{ route('admin.supervisors.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add new supervisor</span>
                    </span>
                </a>
            </div>
            @endability
        </div>


        @include('backend.supervisors.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email & Mobile</th>
                <th>Status</th>
                <th>Created at</th>
                <th class="text-center" style="width: 30px">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($supervisors as $supervisor)

                    <tr>

                    @if ($supervisor->user_image != null)
                         <td> <img src="{{asset('assets/users/' . $supervisor->user_image)}}"  alt="{{$supervisor->full_name}}" style="border-radius: 0; width:50px; height:50px ; "></td>
                    @else
                         <td> <img src="{{asset('assets/users/avatar.jpg')}}" style="border-radius: 0; width:50px; height:50px ; "></td>
                    @endif

                    <td>{{$supervisor->full_name}}
                        <br>
                        <strong>{{$supervisor->username}}</strong>
                    </td>

                    <td>
                        {{$supervisor->email}}
                        {{$supervisor->mobile}}
                    </td>

                    <td>
                         <div class="badge{{$supervisor->status()=='Active' ? ' badge-outline-success' : ' badge-outline-warning'}}">{{$supervisor->status()}}</div>
                    </td>
                    <td>{{$supervisor->created_at->format('Y-m-d')}}</td>
                    <td>
                        <div class="btn-group" style="font-size: 25px;">
                            <a href="{{route('admin.supervisors.edit' , $supervisor->id )}}" >
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-supervisor-{{ $supervisor->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.supervisors.destroy', $supervisor->id) }}" method="post" id="delete-supervisor-{{ $supervisor->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center">No supervisors found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="float-right">
                            {!! $supervisors->appends(request()->all())->links()  !!}
                        </div>
                    </td>
                </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection

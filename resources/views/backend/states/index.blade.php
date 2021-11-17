@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">States</h6>
            @ability('admin','create_states')
            <div class="ml-auto">
                <a href="{{ route('admin.states.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add new State</span>
                    </span>
                </a>
            </div>
            @endability
        </div>


        @include('backend.states.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Cities count</th>
                <th>Country</th>
                <th>Status</th>
                <th class="text-center" style="width: 30px">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($states as $state)

                    <tr>

                    <td>{{$state->name}}</td>
                    <td>{{$state->cities->count()}}</td>
                    <td>{{$state->country->name}}</td>
                    <td>
                         <div class="badge{{$state->status()=='Active' ? ' badge-outline-success' : ' badge-outline-warning'}}">{{$state->status()}}</div>
                    </td>
                    <td>
                        <div class="btn-group" style="font-size: 25px;">
                            <a href="{{route('admin.states.edit' , $state->id )}}" >
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-state-{{ $state->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.states.destroy', $state->id) }}" method="post" id="delete-state-{{ $state->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center">No states found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <div class="float-right">
                            {!! $states->appends(request()->all())->links()  !!}
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

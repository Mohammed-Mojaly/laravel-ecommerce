@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Cities</h6>
            @ability('admin','create_cities')
            <div class="ml-auto">
                <a href="{{ route('admin.cities.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add new City</span>
                    </span>
                </a>
            </div>
            @endability
        </div>


        @include('backend.cities.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>State</th>
                <th>Status</th>
                <th class="text-center" style="width: 30px">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($cities as $city)

                    <tr>

                    <td>{{$city->name}}</td>
                    <td>{{$city->state->name}}</td>
                    <td>
                         <div class="badge{{$city->status()=='Active' ? ' badge-outline-success' : ' badge-outline-warning'}}">{{$city->status()}}</div>
                    </td>
                    <td>
                        <div class="btn-group" style="font-size: 25px;">
                            <a href="{{route('admin.cities.edit' , $city->id )}}" >
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-city-{{ $city->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.cities.destroy', $city->id) }}" method="post" id="delete-city-{{ $city->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="text-center">No cities found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <div class="float-right">
                            {!! $cities->appends(request()->all())->links()  !!}
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

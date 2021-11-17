@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Customers</h6>
            @ability('admin','create_customers')
            <div class="ml-auto">
                <a href="{{ route('admin.customers.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add new customer</span>
                    </span>
                </a>
            </div>
            @endability
        </div>


        @include('backend.customers.filter.filter')


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

                @forelse ($customers as $customer)

                    <tr>

                    @if ($customer->user_image != null)
                         <td> <img src="{{asset('assets/users/' . $customer->user_image)}}"  alt="{{$customer->full_name}}" style="border-radius: 0; width:50px; height:50px ; "></td>
                    @else
                         <td> <img src="{{asset('assets/users/avatar.svg')}}" style="border-radius: 0; width:50px; height:50px ; "></td>
                    @endif

                    <td>{{$customer->full_name}}
                        <br>
                        <strong>{{$customer->username}}</strong>
                    </td>

                    <td>
                        {{$customer->email}}
                        {{$customer->mobile}}
                    </td>

                    <td>
                         <div class="badge{{$customer->status()=='Active' ? ' badge-outline-success' : ' badge-outline-warning'}}">{{$customer->status()}}</div>
                    </td>
                    <td>{{$customer->created_at->format('Y-m-d')}}</td>
                    <td>
                        <div class="btn-group" style="font-size: 25px;">
                            <a href="{{route('admin.customers.edit' , $customer->id )}}" >
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-customer-{{ $customer->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="post" id="delete-customer-{{ $customer->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center">No customers found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="float-right">
                            {!! $customers->appends(request()->all())->links()  !!}
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

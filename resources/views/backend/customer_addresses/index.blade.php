@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Customer Addresses</h6>
            @ability('admin','create_tags')
            <div class="ml-auto">
                <a href="{{ route('admin.customer_addresses.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add new address</span>
                    </span>
                </a>
            </div>
            @endability
        </div>


        @include('backend.customer_addresses.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Customer</th>
                <th>Title</th>
                <th>Shipping Info</th>
                <th>Location</th>
                <th>Address</th>
                <th>Zip code</th>
                <th>POBox</th>
                <th class="text-center" style="width: 30px">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse($customer_addresses as $address)
                    <tr>
                        <td>
                            <a href="{{ route('admin.customers.edit', $address->user_id) }}">{{ $address->user->full_name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.customer_addresses.edit', $address->id) }}">{{ $address->address_title }}</a>
                            <p class="text-gray-400"><b>{{ $address->defaultAddress() }}</b></p>
                        </td>
                        <td>
                            {{ $address->first_name . ' ' . $address->last_name }}
                            <p class="text-gray-400">{{ $address->email }}<br/>{{ $address->mobile }}</p>
                        </td>
                        <td>{{ $address->country->name . ' - ' . $address->state->name .' - ' . $address->city->name }}</td>
                        <td>{{ $address->address }}</td>
                        <td>{{ $address->zip_code }}</td>
                        <td>{{ $address->po_box }}</td>
                    <td>
                          <div class="btn-group" style="font-size: 25px;">
                        <a href="{{route('admin.customer_addresses.edit' , $address->id )}}" >
                            <i class="mdi mdi-tooltip-edit"></i>
                        </a>
                        <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-address-{{ $address->id }}').submit(); } else { return false; }" >
                        <i class="mdi mdi-delete"></i>
                        <form action="{{ route('admin.customer_addresses.destroy', $address->id) }}" method="post" id="delete-address-{{ $address->id }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No addresses found</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">
                        <div class="float-right">
                            {!! $customer_addresses->appends(request()->all())->links() !!}
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection

@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Orders</h6>
        </div>


        @include('backend.orders.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                    <th>Ref ID</th>
                    <th>User</th>
                    <th>Payment method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Created date</th>
                    <th class="text-center" style="width: 30px;">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($orders as $order)

                    <tr>

                        <td>{{ $order->ref_id }}</td>
                        <td>{{ $order->user->full_name }}</td>
                        <td>{{ $order->payment_method->name }}</td>
                        <td>{{ $order->currency() . $order->total }}</td>
                        <td>{!! $order->statusWithLabel() !!}</td>
                        <td>{{ $order->created_at->format('Y-m-d h:i a') }}</td>



                    <td>
                        <div class="btn-group" style="font-size: 25px;">
                            <a href="{{route('admin.orders.show' , $order->id )}}" >
                                <i class="mdi mdi mdi-eye"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-order-{{ $order->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post" id="delete-order-{{ $order->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-center">No orders found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="float-right">
                            {!! $orders->appends(request()->all())->links()  !!}
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

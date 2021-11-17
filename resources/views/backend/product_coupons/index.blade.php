@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Product Coupons</h6>
            @ability('admin','create_product_coupons')
            <div class="ml-auto">
                <a href="{{ route('admin.product_coupons.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add new coupon</span>
                    </span>
                </a>
            </div>
            @endability
        </div>


        @include('backend.product_coupons.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Code</th>
                <th>Value</th>
                <th>Status</th>
                {{-- <th>Description</th> --}}
                <th>Use times</th>
                <th>Validity date</th>
                <th>Greater then</th>
                <th>Created at</th>
                <th class="text-center" style="width: 30px">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($coupons as $coupon)

                    <tr>

                    <td>{{$coupon->code}}</td>
                    <td>{{$coupon->value}}  {{ $coupon->type == 'fixed' ? '$' : '%' }}</td>
                    <td>
                         <div class="badge{{$coupon->status()=='Active' ? ' badge-outline-success' : ' badge-outline-warning'}}">{{$coupon->status()}}</div>
                    </td>
                    {{-- <td>{{$coupon->description ?? ''}}</td> --}}
                    <td>{{$coupon->used_times . '/' . $coupon->use_times}}</td>
                    <td>{{$coupon->start_date != '' ? $coupon->start_date->format('Y-m-d') . ' - ' . $coupon->expire_date->format('Y-m-d') :'-' }}</td>
                    <td>{{$coupon->greater_then ?? '-'}}</td>
                    <td>{{$coupon->created_at->format('Y-m-d h:i a')}}</td>


                    <td>
                        <div class="btn-group" style="font-size: 25px;">
                            <a href="{{route('admin.product_coupons.edit' , $coupon->id )}}" >
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-coupon-{{ $coupon->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.product_coupons.destroy', $coupon->id) }}" method="post" id="delete-product-coupon-{{ $coupon->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="8" class="text-center">No coupons found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">
                        <div class="float-right">
                            {!! $coupons->appends(request()->all())->links()  !!}
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

@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Product Reviews</h6>
            {{-- @ability('admin','create_product_reviews')
            <div class="ml-auto">
                <a href="{{ route('admin.product_reviews.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add new revi</span>
                    </span>
                </a>
            </div>
            @endability --}}
        </div>


        @include('backend.product_reviews.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>

                <th>Rating</th>
                <th>Product</th>
                <th>Status</th>
                <th>Created at</th>
                <th class="text-center" style="width: 30px">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($reviews as $review)

                    <tr>

                        <td>
                            {{ $review->name }}<br>
                            {{ $review->email }}<br>
                            <small>{!! $review->user_id != '' ? $review->user->name : '' !!}</small>
                        </td>

                        <td><span class="badge badge-success">{{ $review->rating }}</span></td>
                        <td>{{ $review->product->name }}</td>
                    <td>
                         <div class="badge{{$review->status()=='Active' ? ' badge-outline-success' : ' badge-outline-warning'}}">{{$review->status()}}</div>
                    </td>
                    {{-- <td><label class="badge badge-warning">In progress</label></td> --}}
                    <td>{{$review->created_at}}</td>
                    <td>
                        <div class="btn-group" style="font-size: 25px;">
                            <a href="{{route('admin.product_reviews.edit' , $review->id )}}" >
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-review-{{ $review->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.product_reviews.destroy', $review->id) }}" method="post" id="delete-product-review-{{ $review->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-center">No reviews found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="float-right">
                            {!! $reviews->appends(request()->all())->links()  !!}
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

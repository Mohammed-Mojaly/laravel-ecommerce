@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Product Categories</h6>
            @ability('admin','create_product_categories')
            <div class="ml-auto">
                <a href="{{ route('admin.product_categories.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add new category</span>
                    </span>
                </a>
            </div>
            @endability
        </div>


        @include('backend.product_categories.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Product count</th>
                <th>Parent</th>
                <th>Status</th>
                <th>Created at</th>
                <th class="text-center" style="width: 30px">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($categories as $category)

                    <tr>

                    <td>{{$category->name}}</td>
                    <td>{{$category->products_count}}</td>
                    <td>{{$category->parent !=null ? $category->parent->name : '-'}}</td>
                    <td>
                        {{-- {!! $category->status()== ? '<div class="badge badge-outline-warning">Pending</div>' : '<div class="badge badge-outline-success">Approved</div>' !!} --}}
                        {{-- <div class="badge badge-outline-{{$category->status==0'warning'?}}">Pending</div> --}}
                         <div class="badge{{$category->status()=='Active' ? ' badge-outline-success' : ' badge-outline-warning'}}">{{$category->status()}}</div>

                    </td>
                    {{-- <td><label class="badge badge-warning">In progress</label></td> --}}
                    <td>{{$category->created_at}}</td>
                    <td>
                        <div class="btn-group" style="font-size: 25px;">
                            <a href="{{route('admin.product_categories.edit' , $category->id )}}" >
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-category-{{ $category->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.product_categories.destroy', $category->id) }}" method="post" id="delete-product-category-{{ $category->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center">No categories found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="float-right">
                            {!! $categories->appends(request()->all())->links()  !!}
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

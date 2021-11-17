@extends('layouts.admin')
@section('content')


<div class="col-lg-15 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Products</h6>
            @ability('admin','create_products')
            <div class="ml-auto">
                <a href="{{ route('admin.products.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add new products</span>
                    </span>
                </a>
            </div>
            @endability
        </div>


        @include('backend.products.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Feature</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Tags</th>
                <th>Status</th>
                <th>Created at</th>
                <th class="text-center" style="width: 30px">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($products as $product)

                    <tr>

                    @if ($product->firstMedia)
                    <td> <img src="{{asset('assets/products/' . $product->firstMedia->file_name)}}"  alt="{{$product->name}}" style="border-radius: 0; width:50px; height:50px ; "></td>
                    @else
                    <td> <img src="{{asset('assets/products/default_product.jpg')}}" style="border-radius: 0; width:50px; height:50px ; "></td>
                    @endif


                  <td>{{Str::limit($product->name, 13)}}</td>
                  <td>{{$product->feature()}}</td>
                  <td> <input type="text" class="quantity form-control input-number" value="{{$product->quantity}}" min="0" style="text-align: center; background: black " readonly></td>

                    <td>{{$product->price}}</td>
                    <td>{{$product->tags->pluck('name')->join(', ')}}</td>
                    <td>
                         <div class="badge{{$product->status()=='Active' ? ' badge-outline-success' : ' badge-outline-warning'}}">{{$product->status()}}</div>
                    </td>
                    <td>{{$product->created_at->format('d-m-y h:i')}}</td>

                    <td>
                        <div class="btn-group" style="font-size: 25px;">

                            <a href="javascript:void(0);" onclick="document.getElementById('modal-button-{{$product->id}}').click();" >
                                <i class="mdi mdi mdi-eye"></i>
                            </a>

                            <button style="display: none" class="open_modal" id="modal-button-{{$product->id}}" value="{{$product->id}}"></button>
                            <a href="{{route('admin.products.edit' , $product->id )}}" >
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>


                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-{{ $product->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" id="delete-product-{{ $product->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="9" class="text-center">No products found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">
                        <div class="float-right">
                            {!! $products->appends(request()->all())->links()  !!}
                        </div>
                    </td>
                </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>

  @include('backend.products.mymodal')

  @endsection
  @section('script')
  <script>


    $(document).on('click','.open_modal',function(){
        var tour_id= $(this).val();
        var url = "products/"+tour_id;
        $.get(url , function (data) {
            //success data
            console.log(data);
            $('#tour_id').val(data.id);
             $('#name').val(data.name);
            $('#details').val(data.description);
            $('#price').val('$'+data.price);
            $('#quantity').val(data.quantity);
            $('#btn-save').val("update");
             $('#myModal').modal('show');
        })
    });

</script>
@endsection

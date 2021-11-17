<div wire:ignore>

      <!-- TRENDING PRODUCTS-->
      <section class="py-5">
        <header>
          <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
        </header>
        <div class="row">
          <!-- PRODUCT-->
          @forelse ($featuredProducts as $featured_product)

          <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="product text-center">
                  <div class="position-relative mb-3">
                      <div class="badge text-white badge-"></div><a class="d-block" href="{{route('frontend.product' , $featured_product->slug)}}"><img class="img-fluid w-100" src="{{asset('assets/products/' . $featured_product->firstMedia->file_name)}}" alt="{{$featured_product->name}}"></a>
                      <div class="product-overlay">
                          <ul class="mb-0 list-inline">
                              <li class="list-inline-item m-0 p-0">
                                  <a class="btn btn-sm btn-outline-dark"  wire:click.prevent="addToWishList('{{ $featured_product->id }}')">
                                   <i class="far fa-heart"></i>
                                </a>
                            </li>
                              <li class="list-inline-item m-0 p-0">
                                  <a wire:click.prevent="addToCart('{{ $featured_product->id }}')" class="btn btn-sm btn-dark" style="color: #dcb14a">
                                   Add to cart</a>
                                </li>
                              <li class="list-inline-item mr-0">
                                  <a wire:click.prevent="$emit('showProductModalAction', '{{ $featured_product->slug }}')"
                                    class="btn btn-sm btn-outline-dark"  data-target="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                                </ul>
                </div>
            </div>
            <h6> <a class="reset-anchor" href="{{route('frontend.product' , $featured_product->slug)}}">{{$featured_product->name}}</a></h6>
            <p class="small text-muted">${{$featured_product->price}}</p>
        </div>
    </div>

    @empty
    @endforelse



</section>

</div>

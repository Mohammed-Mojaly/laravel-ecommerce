@extends('layouts.app')
@section('content')



        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Checkout</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('frontend.cart')}}">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>



        <section class="py-5">
          <!-- BILLING ADDRESS-->
          {{-- <h2 class="h5 text-uppercase mb-4">Billing details</h2> --}}
         <livewire:frontend.checkout-component />
        </section>

@endsection

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
            <div class="text-center">
                <div class="spinner-border" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
        </div>

      </div>
    </div>
  </div>


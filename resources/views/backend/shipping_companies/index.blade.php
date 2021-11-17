@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Shipping Companies</h6>
            @ability('admin','create_shipping_companies')
            <div class="ml-auto">
                <a href="{{ route('admin.shipping_companies.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add New Shipping Company</span>
                    </span>
                </a>
            </div>
            @endability
        </div>


        @include('backend.shipping_companies.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Description</th>
                <th>Fast</th>
                <th>Cost</th>
                <th>Countries count</th>
                <th>Status</th>
                <th class="text-center" style="width: 30px">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($shipping_companies as $shipping_company)

                    <tr>

                    <td>{{Str::limit($shipping_company->name, 15)}}</td>
                    <td>{{ $shipping_company->code }}</a></td>
                    <td>{{Str::limit($shipping_company->description, 15)}}</td>
                    <td>{{ $shipping_company->fast() }}</a></td>
                    <td>{{ $shipping_company->cost }}</a></td>
                    <td>{{ $shipping_company->countries_count }}</td>
                    <td>
                         <div class="badge{{$shipping_company->status()=='Active' ? ' badge-outline-success' : ' badge-outline-warning'}}">{{$shipping_company->status()}}</div>
                    </td>

                    <td>
                        <div class="btn-group" style="font-size: 25px;">
                            <a href="{{route('admin.shipping_companies.edit' , $shipping_company->id )}}" >
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-shipping-company-{{ $shipping_company->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.shipping_companies.destroy', $shipping_company->id) }}" method="post" id="delete-shipping-company-{{ $shipping_company->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="8" class="text-center">No shipping companies found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">
                        <div class="float-right">
                            {!! $shipping_companies->appends(request()->all())->links()  !!}
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

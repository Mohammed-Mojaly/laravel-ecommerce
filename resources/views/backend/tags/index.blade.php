@extends('layouts.admin')
@section('content')


<div class="col-lg-12 ml-2 mt-2 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Tags</h6>
            @ability('admin','create_tags')
            <div class="ml-auto">
                <a href="{{ route('admin.tags.create') }}" class="btn btn-inverse-primary btn-fw">
                    <span class="icon text-white-50">
                        <i class="mdi mdi-plus"></i>
                        <span class="text">Add new tag</span>
                    </span>
                </a>
            </div>
            @endability
        </div>


        @include('backend.tags.filter.filter')


        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Product count</th>
                <th>Status</th>
                <th>Created at</th>
                <th class="text-center" style="width: 30px">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($tags as $tag)

                    <tr>

                    <td>{{$tag->name}}</td>
                    <td>{{$tag->products->count()}}</td>
                    <td>
                         <div class="badge{{$tag->status()=='Active' ? ' badge-outline-success' : ' badge-outline-warning'}}">{{$tag->status()}}</div>
                    </td>
                    <td>{{$tag->created_at}}</td>
                    <td>
                        <div class="btn-group" style="font-size: 25px;">
                            <a href="{{route('admin.tags.edit' , $tag->id )}}" >
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-tag-{{ $tag->id }}').submit(); } else { return false; }" >
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="post" id="delete-tag-{{ $tag->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center">No tags found</td>
                    </tr>


                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="float-right">
                            {!! $tags->appends(request()->all())->links()  !!}
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

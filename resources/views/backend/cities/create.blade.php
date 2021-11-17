@extends('layouts.admin')
@section('content')


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">


        <div class="card-header mb-3 py-3 d-flex">
            <h6 class="mt-1 font-weight-bold text-primary">Create City</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.cities.index') }}" class="btn btn-inverse-primary btn-fw">

                    <span class="icon text-white-50">
                        <i class="mdi mdi-home"></i>
                        <span class="text">Cities</span>
                    </span>

                </a>
            </div>
        </div>
        <div class="card-body">
        <form class="forms-sample" action="{{route('admin.cities.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>


               <div class="col-4">
                <div class="form-group">
                    <label for="state_id">States</label>
                    <select name="state_id" class="form-control">
                        <option value=""> --- </option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : null }}>{{ $state->name }}</option>
                        @endforeach
                    </select>
                    @error('state_id')<span class="text-danger">{{ $message }}</span>@enderror
               </div>
            </div>

               <div class="col-4">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == '1' ? 'selected' : null }}>Active</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : null }}>Inactive</option>
                    </select>
                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
               </div>


            </div>
        <div class="form-group pt-4">
            <button type="submit" name="submit" class="btn btn-primary">Add City</button>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection


@extends('layouts.admin')
@section('content')


<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
<div class="content-wrapper">

{{-- statistics --}}
<livewire:backend.dashboard.statistics-component />

{{-- chart line --}}
<livewire:backend.dashboard.chart-component />

{{-- chart line --}}
<livewire:backend.dashboard.count-component />






</div>

@endsection


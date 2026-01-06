@extends('layouts.app')
@section('content')
@include('sweetalert::alert')
<livewire:dashboard-table />
@endsection
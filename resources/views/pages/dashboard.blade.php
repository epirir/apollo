@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
<!-- vendor css files -->
@endsection

@section('page-style')
<!-- Page css files -->
@endsection

@section('content')
    {{ 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id') }};
@endsection

@section('vendor-script')
<!-- vendor files -->
@endsection

@section('page-script')
<!-- Page js files -->
@endsection
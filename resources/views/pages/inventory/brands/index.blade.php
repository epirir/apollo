@extends('layouts/contentLayoutMaster')

@section('title', 'Marcas')

@section('vendor-style')
<!-- vendor css files -->
@endsection

@section('page-style')
<!-- Page css files -->
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Listado</h4>
                </div>
                <div class="card-content">
                    <div id="dataGrid"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('vendor-script')
<!-- vendor files -->
@endsection

@section('page-script')
<!-- Page js files -->
<script src="{{ mix ('js/inventory/brands/index.js') }}" type="text/javascript"></script>
@endsection
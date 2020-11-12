@extends('layouts.app')

@section('title') {{ __('dashboard.dashboard') }} @stop

@section('plugins_css')
    @include('layouts.dataTables_css')
@endsection

@section('content')

    <!--begin::Content-->

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('Portals') }}</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('portals.index') }}" class="text-muted">{{ __('Portals') }}</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <!--begin::Card-->
                <div class="card card-custom gutter-b">

                    <div class="card-header flex-wrap py-3">
                        <div class="card-title">
                            <h3 class="card-label">
                                <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('Portals') }}</h5>
                            </h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin: Datatable-->
                        {!!  $dataTable->table([
                            'class' => 'table table-bordered table-checkable dataTable no-footer dtr-inline',
                            'style' => 'border-bottom: none; border-top: none;box-shadow: 0px 0px 30px 0px rgba(82, 63, 105, 0.05);'
                        ])  !!}
                    </div>
                    <!--end: Datatable-->

                </div>
                <!--end::Card-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>

    <!--end::Content-->

@endsection

@section('plugins_script')
    @include('layouts.dataTables_js')
    {!! $dataTable->scripts() !!}

@endsection



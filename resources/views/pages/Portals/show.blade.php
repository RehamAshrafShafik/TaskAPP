@extends('dashboard.layouts.app')

@section('title') {{ __('dashboard.dashboard') }} @stop

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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('dashboard.Portals') }}</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.portals.index') }}" class="text-muted">{{ __('dashboard.Portals') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.portals.create') }}" class="text-muted">{{ __('dashboard.Show') }}</a>
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

                    <div class="card card-custom">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ __('dashboard.Show') }}
                            </h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                    <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->

                        <div class="card card-custom gutter-b">
                            <div class="card-body">
                                <!--begin::Top-->
                                <div class="d-flex">
                                    <!--end::Pic-->
                                    <!--begin: Info-->
                                    <div class="flex-grow-1">
                                        <!--begin::Title-->
                                        <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                            <!--begin::portal-->
                                            <div class="mr-3">
                                                <!--begin::title-->
                                                <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                                    {{ $portal->title }}
                                                    <a>
                                                        <!--end::Name-->
                                            </div>
                                            <div class="my-lg-0 my-3">
                                                <a href="{{ (route('dashboard.portals.edit',$portal->id)) }}" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">{{ __('dashboard.Edit') }}</a>
                                            </div>
                                            <!--begin::User-->
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Content-->
                                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                                            <!--begin::Description-->
                                            <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                                {{ $portal->description }}
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Content-->
                                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                                            <!--begin::Description-->
                                            <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                                {{ $portal->type }}
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Top-->

                            </div>
                        </div>

                        <!--end::Form-->
                    </div>

                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>

        <!--end::Content-->
@endsection

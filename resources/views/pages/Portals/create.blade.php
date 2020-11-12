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
                                <a href="{{ route('dashboard.portals.create') }}" class="text-muted">{{ __('dashboard.Create') }}</a>
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
                                {{ __('dashboard.Create') }}
                            </h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                    <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form method="post" action="{{ route('dashboard.portals.store') }}">
                            @csrf

                            <div class="card-body">
                                <div class="form-group mb-8">

                                    @include('dashboard.layouts.flash-message')

                                    <div class="form-group">
                                        <label>{{ __('dashboard.Title') }} <span class="text-danger">*</span></label>
                                        <input name="title" type="text" class="form-control" required  placeholder="{{ __('dashboard.Title') }}"/>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('dashboard.Description') }} <span class="text-danger">*</span></label>
                                        <input name="description" type="text" class="form-control"  required placeholder="{{ __('dashboard.Description') }}"/>

                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('dashboard.Type') }} <span class="text-danger">*</span></label>
                                        <input name="type" type="number" min="8" class="form-control" required placeholder="{{ __('dashboard.Type') }}"/>
                                    </div>



                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('dashboard.Submit') }}</button>
                                    <button type="reset" class="btn btn-secondary">{{ __('dashboard.Close') }}</button>
                                </div>
                        </form>
                        <!--end::Form-->
                    </div>

                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>

        <!--end::Content-->
@endsection





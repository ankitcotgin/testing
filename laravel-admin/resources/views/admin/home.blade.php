@extends('admin.layouts.app')
@section('content')
<div id="content" class="app-content">
    <div class="block-header">
        <h1 class="page-header">{{ __('Dashboard') }}</h1>
    </div>
    {{-- Dashboard Tab Section --}}
    <div class="row">
        <div class="col-lg-3">
            <a href="hello">
                <div class="card">
                    <div class="card-body no-padding" style="height:208px">
                        <div class="alert alert-callout alert-info no-margin">
                            <strong class="text-xl" style="font-size: 50px;">1</strong><br>
                            <span class="opacity-90">Request List</span>
                            <!--<h1 class="pull-right text-info" style="margin-top: -20px;"><img src="assets/img/icon.png" width="100px"></h1>-->
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-4">
                    <a href="hello">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-danger no-margin">
                                    <!--<h1 class="pull-right text-danger"><img src="assets/img/icon.png" width="50px;"></h1>-->
                                    <strong class="text-xl">42.90%</strong><br />
                                    <span class="opacity-50">Bounce rate</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="hello">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-warning no-margin">
                                    <!-- <h1 class="pull-right text-warning"><img src="assets/img/icon.png" width="50px;"></h1> -->
                                    <strong class="text-xl">$ 32,829</strong><br />
                                    <span class="opacity-50">Revenue</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="hello">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-success no-margin">
                                    <!-- <h1 class="pull-right text-success"><img src="assets/img/icon.png" width="50px;"></h1> -->
                                    <strong class="text-xl">42.90%</strong><br />
                                    <span class="opacity-50">Bounce rate</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="hello">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-danger no-margin">
                                    <!-- <h1 class="pull-right text-danger"><img src="assets/img/icon.png" width="50px;"></h1> -->
                                    <strong class="text-xl">54 sec.</strong><br />
                                    <span class="opacity-50">Avg. time on site</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="hello">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-warning no-margin">
                                    <!-- <h1 class="pull-right text-warning"><img src="assets/img/icon.png" width="50px;"></h1> -->
                                    <strong class="text-xl">$ 32,829</strong><br />
                                    <span class="opacity-50">Revenue</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="hello">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-success no-margin">
                                    <!-- <h1 class="pull-right text-success"><img src="assets/img/icon.png" width="50px;"></h1> -->
                                    <strong class="text-xl">42.90%</strong><br />
                                    <span class="opacity-50">Bounce rate</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Dashboard Tab Section --}}
</div>
@endsection

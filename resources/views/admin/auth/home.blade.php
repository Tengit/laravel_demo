@section('title', 'Admin page')
@extends('commons.layouts.staff.app')
@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card-box">
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="page-title mb-0">Admin Dashboard</h5>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('message'))
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="alert alert-success alert-block text-center">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row mb-4 mt-5">
                        <div class="col-12">
                            <div class="row justify-content-center dataTables_wrapper">
                                <div class="col-sm-12">
                                    <div class="table-responsive mb-3">
                                        <table id="admin_top_table"
                                               class="table table-striped table-bordered dt-responsive mb-0">
                                            <thead class="table-head">
                                                <tr>
                                                    <th>{{trans('admin_top.place_name')}}</th>
                                                    <th class="width-column-three-letter">{{trans('admin_top.capacity')}}</th>
                                                    <th class="width-column-three-letter">{{trans('admin_top.number_of_evacuees')}}</th>
                                                    <th class="width-column">{{trans('admin_top.accommodation_rate')}}</th>
                                                    <th class="width-column-two-letter">{{trans('admin_top.household')}}</th>
                                                    <th class="width-column-one-letter">{{trans('commons.male')}}</th>
                                                    <th class="width-column-one-letter">{{trans('commons.female')}}</th>
                                                </tr>
                                                <tr>
                                                    <th>{{trans('admin_top.place_name')}}</th>
                                                    <th class="width-column-three-letter">{{trans('admin_top.capacity')}}</th>
                                                    <th class="width-column-three-letter">{{trans('admin_top.number_of_evacuees')}}</th>
                                                    <th class="width-column">{{trans('admin_top.accommodation_rate')}}</th>
                                                    <th class="width-column-two-letter">{{trans('admin_top.household')}}</th>
                                                    <th class="width-column-one-letter">{{trans('commons.male')}}</th>
                                                    <th class="width-column-one-letter">{{trans('commons.female')}}</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

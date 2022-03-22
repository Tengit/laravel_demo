@section('title', trans('staff_dashboard.page_title')." - ".getPlaceName()." - ".getSystemName())
@extends('common.layouts.staff.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="panel-body size-28">
                    <div class="clearfix">
                        <h5 class="text-uppercase mt-0 font-weight-bold size-32">{{ trans('staff_dashboard.section_title') }}</h5>
                        <hr>
                    </div>

                    <div class="row justify-content-center text-center mt-5 mb-5">
                        @if ($message = Session::get('message'))
                            <div class="col-12">
                                <div class="alert alert-success alert-block text-center">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @endif

                        <div class=" col-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <a href="{{ routeByPlaceId('staff.suppliesIndex') }}" class="btn btn-lg btn-primary  mb-2 px-4 width-lg button_staff_page">{{ trans('staff_dashboard.btn_left') }}</a>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <a href="{{ routeByPlaceId('staff.familyIndex') }}" class="btn btn-lg btn-primary mb-2 px-4 width-lg button_staff_page">{{ trans('staff_dashboard.btn_right') }}</a>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <a href="{{ routeByPlaceId('staff.peopleCheckin') }}" class="btn btn-lg btn-primary mb-2 px-4 width-lg button_staff_page">{{ trans('staff_dashboard.go_to_checkin_user') }}</a>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 text-center">
                                    <h5 class="mb-1 size-32">{{ trans('staff_dashboard.box_title') }}</h5>
                                </div>
                                <!-- end col -->

                                <table>
                                    <tbody>
                                        @if (!empty($place))
                                            <tr>
                                                <td class="text-right">{{ trans('staff_dashboard.td_2') }} :</td>
                                                <td>{{ $place->total_place ?? 0 }} {{ trans('staff_dashboard.people') }}</td>
                                            </tr>
                                            @if (!empty($personTotal))
                                                <tr>
                                                    <td class="text-right">{{ trans('staff_dashboard.total_person') }} :</td>
                                                    <td>{{ $personTotal['total_person_checkin'] ?? 0 }} {{ trans('staff_dashboard.people') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">{{ trans('staff_dashboard.total_family') }} :</td>
                                                    <td>{{ $personTotal['total_family'] ?? 0 }} {{ trans('staff_dashboard.people') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">{{ trans('staff_dashboard.td_4') }} :</td>
                                                    <td>{{ $personTotal['person_male'] ?? 0 }} {{ trans('staff_dashboard.people') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">{{ trans('staff_dashboard.td_5') }} :</td>
                                                    <td>{{ $personTotal['person_female'] ?? 0 }} {{ trans('staff_dashboard.people') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">{{ trans('staff_dashboard.td_6') }} :</td>
                                                    <td>{{ $personTotal['person_less_12'] ?? 0 }} {{ trans('staff_dashboard.people') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">{{ trans('staff_dashboard.td_7') }} :</td>
                                                    <td>{{ ($place->total_place - $personTotal['person_total']) ?? 0 }} {{ trans('staff_dashboard.people') }}</td>
                                                </tr>
                                            @endif
                                        @endif
                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

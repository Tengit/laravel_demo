@section('title', trans('cruds.book.title_singular'))
@extends('commons.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ trans('global.list') }} {{ trans('cruds.book.title_singular') }}
        </h6>
    </div>
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h3 class="text-center text-danger">Search Books!</h3><hr>
                    <div class="form-group">
                        <input type="text" name="search" id="search" placeholder="Enter search by id, title or content" class="form-control" onfocus="this.value=''">
                    </div>
                    <div id="search_list"></div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('global.delete') }} {{ trans('cruds.book.title_singular') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body" id="smallBody">
            <div>
                <!--  -->
            </div>
        </div>
    </div>
  </div>
</div>
<!-- end Modal -->

@endsection

@push('scripts')
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/common/custom.js') }}"></script>
@endpush

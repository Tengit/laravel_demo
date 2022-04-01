@section('title', trans('cruds.author.title_singular'))
@extends('commons.layouts.staff.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ trans('global.list') }} {{ trans('cruds.author.title_singular') }}
        </h6>
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
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-sbooked table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">
                            No.
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.biography') }}
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.birthday') }}
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.email') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $key => $author)
                        <tr data-entry-id="{{ $author->id }}">
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                <a href="{{ route('user.authors.show', $author->id) }}">
                                    {{ $author->name }}
                                </a>
                            </td>
                            <td>
                                {!! $author->biography ?? '' !!}
                            </td>
                            <td>
                                {!! $author->address ?? '' !!}
                            </td>
                            <td>
                                {{ $author->birthday ?? '' }}
                            </td>
                            <td>
                                {{ $author->email ?? '' }}
                            </td>
                            <td nowrap align="center">
                                <a class="text-secondary" data-toggle="modal" id="showButton" data-target="#showModal"
                                    data-attr="{{ route('author.popup', $author->id) }}" title="show">
                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- pagination -->
            {{ $authors->render('commons.layouts.pagination') }}
            <!-- end pagination -->
        </div>
    </div>
</div>
<!-- show modal -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('global.show') }} {{ trans('cruds.author.title_singular') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="showBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

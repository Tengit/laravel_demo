@section('title', trans('cruds.publisher.title_singular'))
@extends('commons.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
        {{ trans('global.show') }} {{ trans('cruds.publisher.title_singular') }}
        </h6>
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.publishers.edit', $publisher->id) }}">
                    {{ trans('global.edit') }}
                </a>
                <a class="btn btn-success" href="{{ route('admin.publishers.index') }}">
                    Back to Publishers
                </a>
            </div>
            <table class="table table-bordered table-sbooked">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.publisher.fields.name') }}
                        </th>
                        <td>
                            {{ $publisher->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publisher.fields.address') }}
                        </th>
                        <td>
                            {{ $publisher->address ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publisher.fields.description') }}
                        </th>
                        <td>
                            {{ $publisher->biography }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publisher.fields.email') }}
                        </th>
                        <td>
                            {{ $publisher->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date created:
                        </th>
                        <td>
                            <time>{{ $publisher->created_at }} </time>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date modified:
                        </th>
                        <td>
                            <time>{{ $publisher->updated_at }} </time>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created by:
                        </th>
                        <td>
                            {{ $publisher->created_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Modified by:
                        </th>
                        <td>
                            {{ $publisher->modified_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.publishers.edit', $publisher->id) }}">
                    {{ trans('global.edit') }}
                </a>
                <a class="btn btn-success" href="{{ route('admin.publishers.index') }}">
                    Back to Publishers
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
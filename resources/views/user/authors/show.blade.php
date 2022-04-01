@section('title', trans('cruds.author.title_singular'))
@extends('commons.layouts.staff.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
        {{ trans('global.show') }} {{ trans('cruds.author.title_singular') }}
        </h6>
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-success" href="{{ route('user.authors.index') }}">
                    Back to Authors
                </a>
            </div>
            <table class="table table-bordered table-sbooked">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.name') }}
                        </th>
                        <td>
                            {{ $author->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.biography') }}
                        </th>
                        <td>
                            {!! $author->biography ?? '' !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.address') }}
                        </th>
                        <td>
                            {!! $author->address ?? '' !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        {{ trans('cruds.author.fields.birthday') }}
                        </th>
                        <td>
                            {{ $author->birthday ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.email') }}
                        </th>
                        <td>
                            {{ $author->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date created:
                        </th>
                        <td>
                            <time>{{ $author->created_at }} </time>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date modified:
                        </th>
                        <td>
                            <time>{{ $author->updated_at }} </time>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created by:
                        </th>
                        <td>
                            {{ $author->created_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Modified by:
                        </th>
                        <td>
                            {{ $author->modified_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-success" href="{{ route('user.authors.index') }}">
                    Back to Authors
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
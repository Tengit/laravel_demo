@extends('commons.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Infomations: {{ $book->title }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-success" href="{{ route('admin.home') }}">
                    Back to Books
                </a>
            </div>
            <table class="table table-bordered table-sbooked">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.title') }}
                        </th>
                        <td>
                            {{ $book->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.content') }}
                        </th>
                        <td>
                            {{ $book->content ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.isbn') }}
                        </th>
                        <td>
                            {{ $book->isbn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.quantity') }}
                        </th>
                        <td>
                            {{ $book->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date Published
                        </th>
                        <td>
                            {{ $book->date_published }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.price') }}
                        </th>
                        <td>
                            {{ number_format($book->price) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.num_pages') }}
                        </th>
                        <td>
                            {{ $book->num_pages }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.condition') }}
                        </th>
                        <td>
                            {{ $book->condition }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.description') }}
                        </th>
                        <td>
                            {{ $book->description ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.category') }}
                        </th>
                        <td>
                            {{ $book->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.publisher') }}
                        </th>
                        <td>
                            {{ $book->publisher->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.edition') }}
                        </th>
                        <td>
                            {{ $book->edition }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date created:
                        </th>
                        <td>
                            <time>{{ $book->created_at }} </time>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date modified:
                        </th>
                        <td>
                            <time>{{ $book->updated_at }} </time>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created by:
                        </th>
                        <td>
                            {{ $book->created_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Modified by:
                        </th>
                        <td>
                            {{ $book->modified_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-success" href="{{ route('admin.home') }}">
                    Back to Books
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
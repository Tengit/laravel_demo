@section('title', trans('cruds.book.title_singular'))
@extends('commons.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ trans('global.list') }} {{ trans('cruds.book.title_singular') }}
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
        <div class="form-group">
            <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">Create new Book</span>
            </a>
        </div>

        <div class="table-responsive">
            <table class=" table table-bordered table-sbooked table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">
                            No.
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.isbn') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.content') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.num_pages') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.publisher') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.author') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $key => $book)
                        <tr data-entry-id="{{ $book->id }}">
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                @if( $book->image )
                                <img src="{{ asset('images/books/' . $book->image) }}"
                                    width="60" height="60" alt="{{ $book->title }}">
                                @else
                                    <!-- <img src="{{ asset('img/no-img.png') }}" width="60" height="60" alt="{{ $book->title }}"> -->
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.books.show', $book->id) }}">
                                    {{ $book->title }}
                                </a>
                            </td>
                            <td>
                                {{ $book->isbn ?? '' }}
                            </td>
                            <td>
                                {!! $book->content ?? '' !!}
                            </td>
                            <td>
                                {!! $book->description ?? '' !!}
                            </td>
                            <td>
                                {{ number_format($book->num_pages) }}
                            </td>
                            </td>
                            <td>
                                {{ number_format($book->quantity) }}
                            </td>
                            </td>
                            <td>
                                {{ number_format($book->price) }}
                            </td>
                            <td nowrap>
                                <a href="{{ route('admin.categories.show', $book->category->id) }}" target="_blank">
                                    {{ $book->category->name ?? '' }}
                                </a>
                            </td>
                            <td nowrap>
                                <a href="{{ route('admin.publishers.show', $book->publisher->id) }}" target="_blank">
                                    {{ $book->publisher->name ?? '' }}
                                </a>
                            </td>
                            <td nowrap>
                                @foreach($book->authors as $author)
                                    <a href="{{ route('admin.authors.show', $author->id) }}" target="_blank">
                                        {{ $author->name ?? '' }}
                                    </a>
                                    <br/>
                                @endforeach
                            </td>
                            <td nowrap align="center">
                                <a href="{{ route('admin.books.show', $book->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.books.edit', $book->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('book.delete', $book->id) }}" title="Delete Book">
                                    <i class="fas fa-trash text-danger fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- pagination -->
            {{ $books->render('commons.layouts.pagination') }}
            <!-- end pagination -->
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
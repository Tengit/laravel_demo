@section('title', 'User Page')
@extends('commons.layouts.staff.app')

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
                                <a href="{{ route('user.categories.show', $book->category->id) }}" target="_blank">
                                    {{ $book->category->name ?? '' }}
                                </a>
                            </td>
                            <td nowrap>
                                <a href="{{ route('user.publishers.show', $book->publisher->id) }}" target="_blank">
                                    {{ $book->publisher->name ?? '' }}
                                </a>
                            </td>
                            <td nowrap>
                                @foreach($book->authors as $author)
                                    <a href="{{ route('user.authors.show', $author->id) }}" target="_blank">
                                        {{ $author->name ?? '' }}
                                    </a>
                                    <br/>
                                @endforeach
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
@endsection

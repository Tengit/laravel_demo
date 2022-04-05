@section('title', trans('cruds.publisher.title_singular'))
@extends('commons.layouts.app')
@section('content')

<div class="card">
@if( $publisher )
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
                                    
                <a class="btn btn-danger" data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('publisher.delete', $publisher->id) }}" title="Delete Book">
                    {{ trans('global.delete') }}
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
                                    
                <a class="btn btn-danger" data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('publisher.delete', $publisher->id) }}" title="Delete Book">
                    {{ trans('global.delete') }}
                </a>
               
                <a class="btn btn-success" href="{{ route('admin.publishers.index') }}">
                    Back to Publishers
                </a>
            </div>
        </div>
        @if( $publisher->books )
            <div id="toggle-button">
                <a href="#" class="btn btn-primary">List Book(s) related</a>
            </div>
            <div class="target" style="display:none;">
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
                        @foreach($publisher->books as $key => $book)
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@else <span>Do not find this record</span>
@endif
<!-- delete Modal -->
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
<!-- end delete Modal -->

<script type="text/javascript">
    document.getElementById('toggle-button').addEventListener('click', function () {
        toggle(document.querySelectorAll('.target'));
    });
</script>
</div>

@endsection
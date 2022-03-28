@section('title', trans('global.admin.top_title'))
@extends('commons.layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card-box">
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="page-title mb4">{{trans('global.admin.top_title')}}</h5>
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
                                                    <th class="px-6 py-4">No.</th>
                                                    <th class="px-6 py-4">Title</th>
                                                    <th class="px-6 py-4">Content</th>
                                                    <th class="px-6 py-4">Description</th>
                                                    <th class="px-6 py-4">Pages number</th>
                                                    <th class="px-6 py-4">Quantity</th>
                                                    <th class="px-6 py-4">Price</th>
                                                    <th class="px-6 py-4">Isbn</th>
                                                    <th class="px-6 py-4">Category</th>
                                                    <th class="px-6 py-4">Publisher</th>
                                                    <th class="px-6 py-4">Author</th>
                                                    <th class="px-6 py-4">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($books as $book)
                                                <tr>
                                                    <th class="total">{{ $index++ }}</th>
                                                    <th class="total">
                                                        <div class="flex items-center">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                <a href="{{ route('admin.books.show', $book->id) }}">
                                                                    {{ $book->title }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th class="total">{{ $book->content }}</th>
                                                    <th class="total">{{ $book->description }}</th>
                                                    <th class="total">{{ number_format($book->num_pages)  }}</th>
                                                    <th class="total">{{ number_format($book->quantity)  }}</th>
                                                    <th class="total">{{ number_format($book->price)  }}</th>
                                                    <th class="total">{{ $book->isbn }}</th>
                                                    <th class="total">{{ $book->category->name ?? '' }}</th>
                                                    <th class="total">{{ $book->publisher->name ?? '' }}</th>
                                                    <th class="total"></th>
                                                    <th class="total">
                                                        <a href="{{ route('admin.books.show', $book->id) }}" class="btn btn-xs btn-primary">Show</a>
                                                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-xs btn-info">Edit</a>
                                                        <!-- <a href="{{ route('admin.books.create') }}?title={{ $book->title }}" class="btn btn-xs btn-primary">Copy</a>
                                                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Confirm delete');" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                        </form> -->
                                                        <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('delete', $book->id) }}" title="Delete Book">
                                                            <i class="fas fa-trash text-danger  fa-lg"></i>
                                                        </a>
                                                    </th>
                                                </tr>
                                            @endforeach
                                            </tbody>
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
<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    Are you sure delete this book?
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/common/custom.js') }}"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
@endpush

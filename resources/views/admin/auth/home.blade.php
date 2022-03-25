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
                                <h5 class="page-title mb-0">{{trans('global.admin.top_title')}}</h5>
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
                                                    <th class="px-6 py-4">Author</th>
                                                    <th class="px-6 py-4">Publisher</th>
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
                                                    <th class="total">{{ $book->num_pages }}</th>
                                                    <th class="total">{{ $book->quantity }}</th>
                                                    <th class="total">{{ $book->price }}</th>
                                                    <th class="total">{{ $book->isbn }}</th>
                                                    <th class="total">{{ $book->category_id }}</th>
                                                    <th class="total"></th>
                                                    <th class="total">{{ $book->publisher_id }}</th>
                                                    <th class="total text-right text-sm font-medium">
                                                        
                                                        <a href="{{ route('admin.books.edit', $book->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                                    </th>
                                                    <th class="total text-right text-sm font-medium">
                                                        <a href="{{ route('admin.books.create') }}?title={{ $book->title }}" class="text-blue-500 hover:text-blue-600">Copy</a>
                                                    </th>
                                                    <th class="total text-right text-sm font-medium">
                                                        <form method="POST" action="{{ route('admin.books.destroy', $book->id)}}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="text-xs text-gray-400">Delete</button>
                                                        </form>
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
@endsection

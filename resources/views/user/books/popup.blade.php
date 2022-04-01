@section('title', trans('cruds.book.title_singular'))

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
        {{ trans('global.show') }} {{ trans('cruds.book.title_singular') }}
        </h6>
    </div>

    <div class="card-body">
        <div class="form-group">
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
                            {{ trans('cruds.book.fields.isbn') }}
                        </th>
                        <td>
                            {{ $book->isbn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.content') }}
                        </th>
                        <td>
                            {!! $book->content ?? '' !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        {{ trans('cruds.book.fields.date_published') }}
                        </th>
                        <td>
                            {{ $book->date_published }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.quantity') }}
                        </th>
                        <td>
                            {{ number_format($book->quantity) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.num_pages') }}
                        </th>
                        <td>
                            {{ number_format($book->num_pages) }}
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
                            {!! $book->description ?? '' !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.category') }}
                        </th>
                        <td>
                            <a href="{{ route('admin.categories.show', $book->category->id) }}" target="_blank">
                                {{ $book->category->name ?? '' }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.publisher') }}
                        </th>
                        <td>
                            <a href="{{ route('admin.publishers.show', $book->publisher->id) }}" target="_blank">
                                {{ $book->publisher->name ?? '' }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.author') }}
                        </th>
                        <td>
                            @foreach($book->authors as $author)
                                <a href="{{ route('admin.authors.show', $author->id) }}" target="_blank">
                                    {{ $author->name ?? '' }}
                                </a>
                                <br/>
                            @endforeach
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
                            {{ trans('cruds.book.fields.image') }}
                        </th>
                        <td>
                            @if($book->image)
                            <img src="{{ asset('images/books/' . $book->image) }}"
                                width="60" height="60" alt="{{ $book->title }}">
                            @else
                                <!-- <img src="{{ asset('img/no-img.png') }}" width="60" height="60" alt="{{ $book->title }}"> -->
                            @endif
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
        </div>
    </div>
</div>

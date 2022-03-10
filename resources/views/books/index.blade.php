<x-layout-book>
    <x-setting-book heading="Manage Books">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Edit</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Copy</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Delete</td>
                                    <td class="px-6 py-4 whitespace-nowrap">No.</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Title</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Content</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Description</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Pages number</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Quantity</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Price</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Isbn</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Category</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Author</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Publisher</td>
                                </tr>
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('books.edit', $book->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('books.create') }}?title={{ $book->title }}" class="text-blue-500 hover:text-blue-600">Copy</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="{{ route('books.destroy', $book->id)}}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $index++ }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="{{ route('books.show', $book->id) }}">
                                                        {{ $book->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->content }}</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->description }}</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->num_pages }}</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->price }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->isbn }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->category_id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap"></td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->publisher_id }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting-book>
</x-layout-book>

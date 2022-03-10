<x-layout-author>
    <x-setting-author heading="Manage Authors">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">No.</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Name</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Biography</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Address</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Birthday</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Email</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Edit</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Copy</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Delete</td>
                                </tr>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $index++ }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="{{ route('authors.show', $author->id) }}">
                                                        {{ $author->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">{{ $author->biography }}</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $author->address }}</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $author->birthday }}</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $author->email }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('authors.edit', $author->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('authors.create') }}?name={{$author->name}}&biography={{$author->biography}}" class="text-blue-500 hover:text-blue-600">Copy</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="{{ route('authors.destroy', $author->id)}}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting-author>
</x-layout-author>

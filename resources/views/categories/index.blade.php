<x-layout>
    <x-setting-category heading="Manage Categories">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">No.</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Name</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Abbreviation</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Description</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Edit</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Copy</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Delete</td>
                                </tr>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $index++ }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/categories/{{ $category->name }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->abbreviation }}</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->description }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/categories/{{ $category->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/categories/create/?name={{$category->name}}&description={{$category->description}}" class="text-blue-500 hover:text-blue-600">Copy</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/categories/{{ $category->id }}">
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
    </x-setting-category>
</x-layout>

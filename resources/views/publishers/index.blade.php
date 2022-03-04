<x-layout>
    <x-setting-publisher heading="Manage Publishers">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">No.</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Name</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Address</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Email</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Description</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Edit</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Copy</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Delete</td>
                                </tr>
                                @foreach ($publishers as $publisher)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $index++ }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="{{ route('publishers.show', $publisher->id) }}">
                                                        {{ $publisher->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">{{ $publisher->address }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap">{{ $publisher->email }}</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $publisher->description }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('publishers.edit', $publisher->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/publishers/create?name={{$publisher->name}}&address={{$publisher->address}}&description={{$publisher->description}}" class="text-blue-500 hover:text-blue-600">Copy</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="{{ route('publishers.destroy', $publisher->id)}}">
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
    </x-setting-publisher>
</x-layout>

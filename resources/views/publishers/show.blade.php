<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Infomations: {{ $publisher->name }}
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Date created: <time>{{ $publisher->created_at }}</time>
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Date modified: <time>{{ $publisher->updated_at }}</time>
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Created by: {{ $publisher->created_by }}
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Modified by: {{ $publisher->modified_by }}
                </p>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="{{ route('publishers.index') }}"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Publishers
                    </a>
                </div>

                <x-form.label name="Name"/>

                <h2 class="font-bold text-2xl lg:text-3xl mb-10">
                    {{ $publisher->name }}
                </h2>

                <x-form.label name="Address"/>
                <h4 class="text-1xl lg:text-2xl mb-10">
                    {{ $publisher->address }}
                </h4>

                <x-form.label name="Email"/>
                <div class="space-y-4 lg:text-lg leading-loose">{!! $publisher->email !!}</div>

                <x-form.label name="Description"/>
                <div class="space-y-4 lg:text-lg leading-loose">{!! $publisher->description !!}</div>

            </div>
            <div class="col-span-8 col-start-5 mt-10 space-y-6">
                <form action="{{ route('publishers.destroy',$publisher->id) }}" method="POST">

                    <a href="{{ route('publishers.edit', $publisher->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
    
                    <a href="/publishers/create?name={{$publisher->name}}&abbreviation={{$publisher->abbreviation}}&description={{$publisher->description}}" class="text-blue-500 hover:text-blue-600">Copy</a>

                    @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div> 
        </article>
    </main>
</x-layout>

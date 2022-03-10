<x-layout-author>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Infomations: {{ $author->name }}
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Date created: <time>{{ $author->created_at }}</time>
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Date modified: <time>{{ $author->updated_at }}</time>
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Created by: {{ $author->created_by }}
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Modified by: {{ $author->modified_by }}
                </p>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="{{ route('authors.index') }}"
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

                        Back to Authors
                    </a>
                </div>

                <x-form.label name="Name"/>

                <h2 class="font-bold text-2xl lg:text-3xl mb-10">
                    {{ $author->name }}
                </h2>

                <x-form.label name="BIOGRAPHY"/>
                <h4 class="text-1xl lg:text-2xl mb-10">
                    {{ $author->biography }}
                </h4>

                <x-form.label name="Birthday"/>
                <div class="space-y-4 lg:text-lg leading-loose">{!! $author->birthday !!}</div>

                <x-form.label name="Address"/>
                <div class="space-y-4 lg:text-lg leading-loose">{!! $author->address !!}</div>

                <x-form.label name="Email"/>
                <div class="space-y-4 lg:text-lg leading-loose">{!! $author->email !!}</div>

            </div>
            <div class="col-span-8 col-start-5 mt-10 space-y-6">
                <form action="{{ route('authors.destroy',$author->id) }}" method="POST">

                    <a href="{{ route('authors.edit', $author->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
    
                    <a href="{{ route('authors.create') }}?name={{$author->name}}&biography={{$author->biography}}" class="text-blue-500 hover:text-blue-600">Copy</a>

                    @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div> 
        </article>
    </main>
</x-layout-author>
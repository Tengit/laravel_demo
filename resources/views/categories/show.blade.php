<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Infomations
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Date created: <time>{{ $category->created_at }}</time>
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Date modified: <time>{{ $category->updated_at }}</time>
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Created by: {{ $category->created_by }}
                </p>
                <p align="left" class="mt-4 block text-gray-400 text-xs">
                    Modified by: {{ $category->modified_by }}
                </p>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/categories"
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

                        Back to Categories
                    </a>
                </div>

                <h2 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $category->name }}
                </h2>

                <h3 class="text-1xl lg:text-4xl mb-10">
                    {{ $category->abbreviation }}
                </h3>

                <div class="space-y-4 lg:text-lg leading-loose">{!! $category->description !!}</div>
            </div>
        </article>
    </main>
</x-layout>

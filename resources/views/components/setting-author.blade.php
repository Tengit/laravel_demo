@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Menu</h4>
            <ul>
                <li>
                    <a href="/authors" class="{{ request()->is('authors') ? 'text-blue-500' : '' }}">All Authors</a>
                </li>

                <li>
                    <a href="/authors/create" class="{{ request()->is('authors/create') ? 'text-blue-500' : '' }}">New Author</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>

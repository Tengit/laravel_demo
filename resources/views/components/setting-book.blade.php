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
                    <a href="/books" class="{{ request()->is('books') ? 'text-blue-500' : '' }}">All Books</a>
                </li>

                <li>
                    <a href="/books/create" class="{{ request()->is('books/create') ? 'text-blue-500' : '' }}">New Book</a>
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

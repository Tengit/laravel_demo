<x-layout-category>
    <x-setting-category heading="Add new Category">
        <form method="POST" action="/categories">
            @csrf

            <x-form.input name="name" required />
            <x-form.input name="abbreviation" required />
            <x-form.textarea name="description" required />
            <x-form.button>Save</x-form.button>
        </form>
    </x-setting-category>
</x-layout-category>

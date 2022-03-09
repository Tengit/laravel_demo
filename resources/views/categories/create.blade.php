<x-layout-category>
    <x-setting-category heading="Add new Category">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <x-form.input name="name" required  />
            <x-form.input name="abbreviation" required />
            <x-form.textarea name="description"/>
            <x-form.button>Save</x-form.button>
        </form>
    </x-setting-category>
</x-layout-category>

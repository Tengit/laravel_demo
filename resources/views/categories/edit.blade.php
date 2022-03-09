<x-layout-category>
    <x-setting-category :heading="'Edit Category: ' . $category->name">
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $category->name)" required />
            <x-form.input name="abbreviation" :value="old('abbreviation', $category->abbreviation)" required />
            <x-form.textarea name="description">{{ old('description', $category->description) }}</x-form.textarea>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting-category>
</x-layout-category>

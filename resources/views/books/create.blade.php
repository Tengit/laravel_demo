<x-layout-book>
    <x-setting-book heading="Add new Book">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="parent_id" type="hidden" />
            <x-form.input name="title" required />
            <x-form.input name="isbn" required />

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Categories::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.field>
                <x-form.label name="publisher"/>

                <select name="publisher_id" id="publisher_id" required>
                    @foreach (\App\Models\Publishers::all() as $publisher)
                        <option
                            value="{{ $publisher->id }}"
                            {{ old('publisher') == $publisher->id ? 'selected' : '' }}
                        >{{ ucwords($publisher->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="publisher"/>
            </x-form.field>

            <x-form.input name="num_pages" required />
            <x-form.input name="quantity" required />
            <x-form.input name="price" required />
            <x-form.textarea name="content" required />
            <x-form.textarea name="description" required />
            <x-form.input name="edition" required />
            <x-form.input name="date_published" type="date" />

            <x-form.button>Save</x-form.button>
        </form>
    </x-setting-book>
</x-layout-book>

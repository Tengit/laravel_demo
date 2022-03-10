<x-layout-book>
    <x-setting-book :heading="'Edit Book: ' . $book->title">
        <form method="POST" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $book->title)" required />
            <x-form.textarea name="content">{{ old('content', $book->content) }}</x-form.textarea>
            <x-form.textarea name="description">{{ old('description', $book->description) }}</x-form.textarea>
            <x-form.input name="num_pages" :value="old('num_pages', $book->num_pages)" required />
            <x-form.input name="quantity" :value="old('quantity', $book->quantity)" required />
            <x-form.input name="price" :value="old('price', $book->price)" required />
            <x-form.input name="isbn" :value="old('isbn', $book->isbn)" required />
            <x-form.input name="date_published" type="date" :value="old('date_published', $book->date_published)" required />

            <x-form.field>
                 <x-form.label name="category"/>

                 <select name="category_id" id="category_id" required>
                        <option
                            value="">-Select Category-</option> 
                     @foreach ($categories as $category)
                         <option
                             value="{{ $category->id }}"
                             {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}
                         >{{ ucwords($category->name) }}</option>
                     @endforeach
                 </select>

                 <x-form.error name="category"/>
            </x-form.field>

            <x-form.field>
                 <x-form.label name="publisher"/>

                 <select name="publisher_id" id="publisher_id" required>
                        <option
                            value="">-Select Publisher-</option>
                     @foreach ($publishers as $publisher)
                         <option
                             value="{{ $category->id }}"
                             {{ old('publisher_id', $book->publisher_id) == $publisher->id ? 'selected' : '' }}
                         >{{ ucwords($publisher->name) }}</option>
                     @endforeach
                 </select>

                 <x-form.error name="category"/>
            </x-form.field>

            <x-form.field>
                 <x-form.label name="condition"/>

                 <select name="condition" id="condition">
                    <option @if(old('condition', $book->condition) == '') selected @endif >
                        -Select Condition-
                    </option>
                    <option @if(old('condition', $book->condition) == 'Old') selected @endif >
                        Old
                    </option>
                    <option @if(old('condition', $book->condition) == 'New') selected @endif >
                        New
                    </option>
                </select>

                <x-form.error name="condition"/>
            </x-form.field>
            <x-form.input name="edition" :value="old('edition', $book->edition)" required />

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting-book>
</x-layout-book>

<x-layout>
    <x-setting-book :heading="'Edit Book: ' . $book->name">
        <form method="POST" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $book->name)" required />
            <x-form.textarea name="biography">{{ old('biography', $book->biography) }}</x-form.textarea>
            <x-form.date name="birthday" :value="old('birthday', $book->birthday)" required />
            <x-form.textarea name="address">{{ old('address', $book->address) }}</x-form.textarea>
            <x-form.input name="email" :value="old('email', $book->email)" />

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting-book>
</x-layout>

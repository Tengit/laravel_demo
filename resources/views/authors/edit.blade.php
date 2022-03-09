<x-layout-author>
    <x-setting-author :heading="'Edit Author: ' . $author->name">
        <form method="POST" action="{{ route('authors.update', $author->id) }}">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $author->name)" required />
            <x-form.textarea name="biography">{{ old('biography', $author->biography) }}</x-form.textarea>
            <x-form.input type="date" name="birthday" :value="old('birthday', $author->birthday)" required />
            <x-form.textarea name="address">{{ old('address', $author->address) }}</x-form.textarea>
            <x-form.input name="email" :value="old('email', $author->email)" />

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting-author>
</x-layout-author>

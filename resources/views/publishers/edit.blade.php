<x-layout>
    <x-setting-publisher :heading="'Edit Publisher: ' . $publisher->name">
        <form method="POST" action="{{ route('publishers.update', $publisher->id) }}">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $publisher->name)" required />
            <x-form.textarea name="address">{{ old('address', $publisher->address) }}</x-form.textarea>
            <x-form.input name="email" :value="old('email', $publisher->email)" />
            <x-form.textarea name="description">{{ old('description', $publisher->description) }}</x-form.textarea>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting-publisher>
</x-layout>

<x-layout-author>
    <x-setting-author heading="Add new Author">
        <form method="POST" action="{{ route('authors.store') }}">
            @csrf

            <x-form.input name="name" required  />
            <x-form.textarea name="biography" required />
            <x-form.textarea name="address" />
            <x-form.input name="birthday" type="date"/>
            <x-form.input name="email"/>
            <x-form.button>Save</x-form.button>
        </form>
    </x-setting-author>
</x-layout-author>

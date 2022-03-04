<x-layout-publisher>
    <x-setting-publisher heading="Add new Publisher">
        <form method="POST" action="{{ route('publishers.store') }}">
            @csrf

            <x-form.input name="name" required  />
            <x-form.textarea name="address" required/>
            <x-form.input name="email" required  />
            <x-form.textarea name="description"/>
            <x-form.button>Save</x-form.button>
        </form>
    </x-setting-publisher>
</x-layout-publisher>

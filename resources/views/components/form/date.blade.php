@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}"/>
    <input
        class="form-input form-text has-leading-addon has-trailing-icon"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="Y-m-d"
    />
    <x-form.error name="{{ $name }}"/>
</x-form.field>

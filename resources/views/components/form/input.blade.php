@props(['name', 'type' => 'text', 'placeholder'])
<div class="mb-6 w-full">

    <x-form.label name="{{ $name }}"/>
    
    <input class="border border-gray-200 p-2 w-full rounded"
           type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name) }}"
           required
           @if($name == 'location')
           placeholder="{{ $placeholder }}"
        @endif
    >

    <x-form.error name="{{ $name }}"/>
</div
>

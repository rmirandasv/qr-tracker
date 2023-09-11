@props(['disabled' => false])
<div class="flex flex-col">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-0 focus:border-gray-300']) !!}>
    @error($attributes->get('name') ?? $attributes->get('id'))
        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>

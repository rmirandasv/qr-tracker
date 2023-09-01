<div class="flex flex-col">
    <textarea {!! $attributes->merge(['class' => 'w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-0 focus:border-gray-300']) !!}></textarea>
    @error($attributes->get('wire:model') ?? $attributes->get('name'))
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
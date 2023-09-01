<form wire:submit="save">
    <div class="flex flex-col space-y-2">
        <div class="flex flex-col">
            <label for="url" class="text-sm font-semibold text-gray-600">URL</label>
            <x-input type="text" wire:model="form.url" id="url" placeholder="https://example.com" />
        </div>
        <div class="flex flex-col">
            <label for="name" class="text-sm font-semibold text-gray-600">{{ __('Name') }}</label>
            <x-input type="text" wire:model="form.name" id="name" placeholder="Example" />
        </div>
        <div class="flex flex-col">
            <label for="description" class="text-sm font-semibold text-gray-600">{{ __('Description') }}</label>
            <x-textarea wire:model="form.description" id="description" rows="3" placeholder="{{ __('This is an example description') }}" />
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">{{ __('Save') }}</button>
        </div>
    </div>
</form>
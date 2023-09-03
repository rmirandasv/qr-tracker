<div>
    <div class="flex justify-between">
        <div class="w-4/12 flex flex-col">
            <div class="flex flex-col">
                <label for="size" class="text-sm font-bold text-gray-700 tracking-wide">{{ __('Size') }}</label>
                <select wire:model.live="size" id="size" name="size" class="w-full mt-2">
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                </select>
            </div>
            <div class="flex flex-col mt-4">
                <label for="margin" class="text-sm font-bold text-gray-700 tracking-wide">{{ __('Margin') }}</label>
                <select wire:model.live="margin" id="margin" name="margin" class="w-full mt-2">
                    <option value="0">0</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
            </div>
            <div class="flex flex-col mt-4">
                <x-input wire:model.live="label" id="label" name="label" type="text" placeholder="{{ __('Scan the code') }}" />
            </div>
            <div class="flex flex-col mt-4">
                <x-input wire:model.live="labelFontSize" id="labelFontSize" name="labelFontSize" type="number" step="1" placeholder="{{ __('Label text size') }}" />
            </div>
            <div class="flex flex-col mt-4">
                <label for="logo" class="text-sm font-bold text-gray-700 tracking-wide">{{ __('Logo') }}</label>
                <input wire:model.live="logo" id="logo" name="logo" type="file" />
            </div>
        </div>
        <div class="w-auto flex flex-col">
            <img src="{{ $output }}" alt="QR Code" />
        </div>
    </div>
</div>

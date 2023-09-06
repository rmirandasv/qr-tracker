<div class="p-4 border border-gray-200 bg-white rounded shadow">
    <h2 class="text-lg font-semibold text-gray-700">{{ __('QR Code Generator') }}</h2>
    <div class="mt-3 flex justify-between items-center">
        <div class="w-6/12 flex flex-col space-y-4">
            <div class="flex flex-col">
                <label for="size" class="text-sm font-bold text-gray-700 tracking-wide">{{ __('Size') }}</label>
                <select wire:model.live="size" id="size" name="size"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-0 focus:border-gray-300">
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="margin" class="text-sm font-bold text-gray-700 tracking-wide">{{ __('Margin') }}</label>
                <select wire:model.live="margin" id="margin" name="margin"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-0 focus:border-gray-300">
                    <option value="0">0</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="label"
                    class="text-sm font-bold text-gray-700 tracking-wide">{{ __('Text Label') }}</label>
                <x-input wire:model.live="label" id="label" name="label" type="text"
                    placeholder="{{ __('Scan the code') }}" />
            </div>
            <div class="flex flex-col">
                <label for="labelFontSize"
                    class="text-sm font-bold text-gray-700 tracking-wide">{{ __('Label text size') }}</label>
                <x-input wire:model.live="labelFontSize" id="labelFontSize" name="labelFontSize" type="number"
                    step="1" placeholder="{{ __('Label text size') }}" />
            </div>
            <div class="flex flex-col">
                <button wire:click="download"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">{{ __('Download') }}</button>
            </div>
        </div>
        <div class="w-auto flex flex-col p-5 bg-gray-200 rounded">
            <img src="{{ $output }}" alt="QR Code" />
        </div>
    </div>
</div>

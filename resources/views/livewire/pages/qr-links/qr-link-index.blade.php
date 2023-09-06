<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('QR Links') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">{{ __('QR Links') }}</h1>
            <a href="{{ route('qr-links.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">{{ __('Create') }}</a>
        </div>
        <div class="flex flex-col">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">{{ __('Name') }}</th>
                        <th class="px-4 py-2">{{ __('URL') }}</th>
                        <th class="px-4 py-2">{{ __('QR Code') }}</th>
                        <th class="px-4 py-2">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($qrLinks as $qrLink)
                        <tr>
                            <td class="border px-4 py-2">{{ $qrLink->name }}</td>
                            <td class="border px-4 py-2">{{ $qrLink->url }}</td>
                            <td class="border px-4 py-2">
                                <img class="w-10 h-10" src="{{ Storage::disk($qrLink?->qr->disk)->url($qrLink?->qr->path) }}" alt="QR Code" />
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('qr-links.edit', $qrLink) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">{{ __('Edit') }}</a>
                                <span>Delete</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>

</div>

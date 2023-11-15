<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-breadcrumb :links="[['url' => route('dashboard'), 'label' => __('Dashboard')]]" />
    </x-slot>

    <div>
        <div class="relative isolate overflow-hidden pt-16">
            <!-- Stats -->
            <div class="flex items-center justify-between">
                <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">
                    {{ __('Top QR Links') }}
                </h2>
                <a wire:navigate href="{{ route('qr-links.create') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none">
                    {{ __('New QR Link') }}
                </a>
            </div>
            <div class="mt-2 border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
                <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
                    @foreach ($topQrLinks as $qrLink)
                        <div
                            class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
                            <dt class="text-sm font-medium leading-6 text-gray-500">{{ $qrLink->name }}</dt>
                            <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
                                {{ $qrLink->visits_count }}
                            </dd>
                        </div>
                    @endforeach
                </dl>
            </div>

            <div class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50"
                aria-hidden="true">
                <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]"
                    style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)">
                </div>
            </div>
        </div>
        <div class="mt-4 flex flex-col">
            <div class="h-96">
                @if ($topQrLinks->count() > 0)
                    <livewire:livewire-column-chart :column-chart-model="$columnChartModel" />
                @else
                    <div class="flex flex-col justify-center items-center">
                        <span class="text-gray-500">{{ __('You don\'t have any QR links yet.') }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

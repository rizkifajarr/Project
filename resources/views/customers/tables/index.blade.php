<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-900 uppercase hover:text-yellow-400 sm:text-4xl">
            Robin Billiard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-3xl mx-auto mb-5 text-center">
                        <p class="text-gray-900 sm:text-xl">
                            Pilih salah satu meja untuk memeriksa ketersediaan waktu di meja tersebut
                        </p>
                    </div>
                    @if (auth()->check() && in_array(auth()->user()->role, ['Admin', 'Owner']))
                        <div class="grid grid-cols-1 gap-4 mb-5 text-center lg:grid-cols-3">
                            <a href="{{ route('admin.dashboard') }}"
                                class="inline-block px-12 py-3 text-sm font-medium text-white bg-indigo-600 border border-indigo-600 rounded hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                {{ __('Admin | Dashboard') }}
                            </a>
                            <a href="{{ route('admin.tables.index') }}"
                                class="inline-block px-12 py-3 text-sm font-medium text-white bg-indigo-600 border border-indigo-600 rounded hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                {{ __('Admin | Daftar Meja') }}
                            </a>
                            <a href="{{ route('admin.tables.create') }}"
                                class="inline-block px-12 py-3 text-sm font-medium text-white bg-indigo-600 border border-indigo-600 rounded hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                {{ __('Admin | Tambah Meja') }}
                            </a>
                        </div>
                    @endif
                    <div class="grid grid-cols-3 gap-4 lg:grid-cols-5">
                        @foreach ($tableLists as $tableList)
                            <a href="{{ route('customers.tables.show', $tableList['table_id']) }}">
                                <dl class="grid grid-cols-1 gap-4">
                                    <div
                                        class="flex flex-col px-4 py-8 text-center border border-gray-300 rounded-lg cursor-pointer hover:shadow-lg">
                                        <dt class="text-4xl font-extrabold text-indigo-600 md:text-5xl">
                                            {{ $tableList['table_number'] }}
                                        </dt>
                                        <dd class="order-last text-lg font-medium text-gray-900">
                                            {{ __('Nomor Meja') }}
                                        </dd>
                                    </div>
                                </dl>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

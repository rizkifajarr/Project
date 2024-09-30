<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Jam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                        <dl class="grid grid-cols-1 gap-4">
                            <div
                                class="flex flex-col justify-center px-4 py-8 text-center border border-gray-300 rounded-lg">
                                <dt class="order-last text-lg font-medium text-black">
                                    {{ __('Nomor Meja') }}
                                </dt>
                                <dd class="text-4xl font-extrabold text-indigo-600 md:text-5xl">
                                    {{ $table->table_number }}
                                </dd>
                            </div>
                        </dl>
                        <div class="rounded-lg lg:col-span-2">
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-6 lg:gap-8">
                                @foreach ($table->availabilities as $availability)
                                    <div
                                        class="px-4 py-8 text-center text-black border border-gray-300 rounded-lg cursor-pointer hover:shadow-lg">
                                        <a
                                            href="{{ route('customers.reservations.create', ['table_id' => $table->id, 'hour_id' => $availability->hour->id]) }}">
                                            {{ $availability->hour->hour }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

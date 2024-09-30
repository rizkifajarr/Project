<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin | Daftar Meja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('admin.tables.create') }}"
                            class="inline-block px-12 py-3 text-sm font-medium text-black border border-gray-300 rounded-md shadow-lg hover:bg-indigo-500 hover:text-white focus:outline-none focus:ring active:bg-white">
                            {{ __('Tambah Meja') }}
                        </a>
                    </div>

                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                        @foreach ($tables as $table)
                            <div class="px-4 py-6 text-center border border-gray-100 rounded-lg shadow-lg">
                                <div class="flex flex-col px-4 py-8 text-center rounded-lg shadow-lg">
                                    <dt class="order-last text-lg font-medium text-gray-500">Nomor Meja</dt>

                                    <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">
                                        {{ $table->table_number }}
                                    </dd>
                                </div>
                                <div class="mt-3 text-white">
                                    <strong class="text-black">Jam Tersedia</strong>
                                    <div class="grid grid-cols-1 gap-4 mt-3 lg:grid-cols-3 lg:gap-4">
                                        @foreach ($table->availabilities as $availability)
                                            <div class="bg-green-400 rounded-lg">
                                                <p>{{ $availability->hour->hour }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex justify-between mt-4">
                                    <a href="{{ route('admin.tables.edit', $table->id) }}" class="text-blue-500">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.tables.destroy', $table->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus meja ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

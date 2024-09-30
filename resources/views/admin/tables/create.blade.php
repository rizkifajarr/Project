<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin | Tambah Meja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.tables.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                            <div class="rounded-lg">
                                <label for="table_number" class="block text-base font-medium text-gray-700 ">Nomor
                                    Meja
                                </label>
                                <input type="text" name="table_number" id="table_number"
                                    class="block w-full mt-1 text-black border-2 rounded-lg" min="1" required>
                            </div>
                            <div class="rounded-lg lg:col-span-2">
                                <label class="block text-base font-medium text-center text-gray-700 ">Jam
                                    Tersedia
                                </label>
                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                                    @foreach ($hours as $hour)
                                        <div class="p-3 text-center border border-gray-300 rounded-lg hover:shadow-lg">
                                            <input type="checkbox" name="hours[]" value="{{ $hour->id }}"
                                                class="rounded-lg form-checkbox">
                                            <span class="ml-2">{{ $hour->hour }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-block px-5 py-3 mt-2 text-sm font-medium text-white bg-indigo-600 border border-indigo-600 rounded hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

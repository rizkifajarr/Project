<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin | Edit Meja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.tables.update', $table->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                            <div class="p-6 rounded-lg">
                                <label for="table_number" class="block text-base font-medium text-black">Nomor
                                    Meja
                                </label>
                                <input type="text" name="table_number" id="table_number"
                                    value="{{ old('table_number', $table->table_number) }}" required
                                    class="block w-full mt-2 text-black border-2 border-gray-500 rounded-lg">
                            </div>
                            <div class="p-6 rounded-lg lg:col-span-2">
                                <label class="block text-base font-medium text-center text-black">Jam
                                    Tersedia
                                </label>
                                <div class="grid grid-cols-1 gap-4 mt-2 lg:grid-cols-3 lg:gap-8">
                                    @foreach ($hours as $hour)
                                        <div class="p-3 text-center border border-gray-300 rounded-lg hover:shadow-lg">
                                            <input type="checkbox" name="hours[]" value="{{ $hour->id }}"
                                                {{ in_array($hour->id, old('hours', $tableHours ?? [])) ? 'checked' : '' }}
                                                class="rounded-lg form-checkbox">
                                            <span class="ml-2">{{ $hour->hour }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

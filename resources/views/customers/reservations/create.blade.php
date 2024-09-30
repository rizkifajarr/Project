<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Buat Reservasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('customers.reservations.store') }}">
                        @csrf
                        <input type="hidden" name="table_id" value="{{ $table->id }}">
                        <input type="hidden" name="hour_id" value="{{ $hour->id }}">

                        <div class="px-4 py-3 mb-4 text-black">
                            <p class="text-base font-medium text-center">
                                Silakan lengkapi data Anda terlebih dahulu 👇
                            </p>
                        </div>

                        <div class="grid grid-cols-1 gap-4 mb-4 lg:grid-cols-2 lg:gap-8">
                            <div class="p-3 border border-gray-300 rounded-lg shadow-lg">
                                <div class="mb-4">
                                    <label class="block text-base font-medium text-black">Nomor
                                        Meja
                                    </label>
                                    <input type="text" name="name" id="name"
                                        value="{{ $table->table_number }}" readonly
                                        class="block w-full mt-1 text-black border-2 border-gray-400 rounded-lg">
                                </div>

                                <div class="mb-4">
                                    <label class="block text-base font-medium text-black">Jam Yang
                                        Dipilih
                                    </label>
                                    <input type="text" name="name" id="name" value="{{ $hour->hour }}"
                                        readonly
                                        class="block w-full mt-1 text-black border-2 border-gray-400 rounded-lg">
                                </div>

                                <div class="mb-4">
                                    <label for="duration" class="block text-base font-medium text-black">Durasi Main
                                        (Jam)
                                    </label>
                                    <input type="number" name="duration" id="duration"
                                        value="{{ old('duration', 1) }}" min="1" required
                                        class="block w-full mt-1 text-black border-2 border-gray-400 rounded-lg">
                                </div>

                                <div>
                                    <label for="reservation_date" class="block text-sm font-medium text-black">Tanggal
                                        Reservasi
                                    </label>
                                    <input type="date" id="reservation_date" name="reservation_date" required
                                        class="block w-full mt-1 text-black border-2 border-gray-400 rounded-lg">
                                </div>
                            </div>
                            <div class="p-3 border border-gray-300 rounded-lg shadow-lg">
                                <div class="mb-4">
                                    <label for="name" class="block text-base font-medium text-black">Nama
                                    </label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        required
                                        class="block w-full mt-1 text-black border-2 border-gray-400 rounded-lg">
                                </div>

                                <div class="mb-4">
                                    <label for="phone" class="block text-base font-medium text-black">Nomor
                                        Telepon
                                    </label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                        required
                                        class="block w-full mt-1 text-black border-2 border-gray-400 rounded-lg">
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-base font-medium text-black">Email
                                    </label>
                                    <input type="email" name="email" id="email"
                                        value="{{ auth()->user()->email }}" readonly
                                        class="block w-full mt-1 text-black border-2 border-gray-400 rounded-lg">
                                </div>

                                <div>
                                    <label class="block text-base font-medium text-black">Pastikan
                                        data sudah benar sebelum melanjutkan proses Reservasi 😁
                                    </label>
                                    <button type="submit"
                                        class="inline-block w-full p-2 text-base font-medium text-center uppercase transition border-2 border-gray-400 rounded hover:bg-yellow-500 hover:border-yellow-500 hover:text-white">
                                        Buat Reservasi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

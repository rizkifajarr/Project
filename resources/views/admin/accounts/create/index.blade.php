<x-admin-app-layout>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Tambah Akun
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <div class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @if ($errors->any())
                    <div id="error-modal">
                        <div
                            class="mb-4 bg-white rounded-lg border-gray-300 border p-3 shadow-lg transition-opacity duration-300 ease-in-out">
                            <div class="flex flex-row">
                                <div class="px-2">
                                    <svg class="w-6 h-6" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <div class="ml-2 mr-6">
                                    <span class="font-semibold">Upss..!</span>
                                    @foreach ($errors->all() as $error)
                                        <span class="block text-gray-500">{{ $error }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('admin.accounts.create.store') }}" method="POST">
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        <input type="text" id="name" name="name" required
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Masukkan Nama" />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Email</span>
                        <input type="email" id="email" name="email" required
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Masukkan Email" />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nomor HP</span>
                        <input type="text" id="phone" name="phone" required
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Masukkan Nomor HP" />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Password</span>
                        <input type="password" id="password" name="password" required
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Masukkan Passsword" />
                    </label>
                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Role
                        </span>
                        <div class="mt-2">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    id="owner" name="role" value="Owner" required />
                                <span class="ml-2">Owner</span>
                            </label>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    id="admin" name="role" value="Admin" required />
                                <span class="ml-2">Admin</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Tambah Akun
                        </button>
                    </div>
                </form>
                <script>
                    const modal = document.getElementById('error-modal');

                    function showModal() {
                        modal.classList.remove('hidden');
                    }

                    setTimeout(showModal, 2000);
                </script>
            </div>
        </div>
    </div>
</x-admin-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Detail Reservasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                        <div class="rounded-lg lg:col-span-2">
                            <div class="flow-root py-3 border border-gray-200 rounded-lg shadow-lg">
                                <dl class="-my-3 text-base divide-y">

                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-2">
                                        <dt class="font-medium ">Nama</dt>
                                        <dd class=" sm:col-span-2">{{ $reservation->name }}</dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium ">Nomor Telepon</dt>
                                        <dd class=" sm:col-span-2">{{ $reservation->phone }}</dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium ">Email</dt>
                                        <dd class=" sm:col-span-2">{{ $reservation->email }}</dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium ">Nomor Meja</dt>
                                        <dd class=" sm:col-span-2">
                                            {{ $reservation->table->table_number }}
                                        </dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium ">Jam Main</dt>
                                        <dd class=" sm:col-span-2"> {{ $reservation->hour->hour }}
                                        </dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium ">Durasi Main</dt>
                                        <dd class=" sm:col-span-2"> {{ $reservation->duration }}
                                        </dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium ">Tanggal Reservasi</dt>
                                        <dd class=" sm:col-span-2">
                                            {{ $reservation->reservation_date }}
                                        </dd>
                                    </div>

                                </dl>
                            </div>
                        </div>
                        <div class="rounded-lg ">
                            <div class="p-3">
                                <div class="flex justify-between">
                                    <p class="text-lg font-bold">Total</p>
                                    <div class="">
                                        <p class="mb-1 text-lg font-bold">Rp.
                                            {{ number_format($reservation->duration * 25000, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <button id="pay-button"
                                    class="mt-3 w-full rounded-md hover:shadow-lg bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Bayar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    console.log("Payment Success!", result);
                    alert("Payment Success!");
                },
                onPending: function(result) {
                    console.log("Waiting Your Payment!", result);
                    alert("Waiting Your Payment!");
                },
                onError: function(result) {
                    console.log("Payment Failed!", result);
                    alert("Payment Failed!");
                },
                onClose: function() {
                    alert('You Closed The Popup Without Finishing The Payment');
                }
            });
        });
    </script>
</x-app-layout>

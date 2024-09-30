<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kontak Kami') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <div
                            class="max-w-screen-xl px-4 py-8 mx-auto border-2 rounded-lg shadow-lg sm:px-6 sm:py-12 lg:px-8 lg:py-16">
                            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-16">
                                <div class="relative h-64 overflow-hidden rounded-lg sm:h-80 lg:order-last lg:h-full">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.816529213141!2d109.3340958!3d-0.054290599999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59edf9499093%3A0x8a8eea661e174c45!2sRobin%20Billiard%20N%20Caffe%20Pontianak!5e0!3m2!1sid!2sid!4v1726593341332!5m2!1sid!2sid"
                                        width="600" height="450" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                                <div class="lg:py-24">
                                    <h2 class="text-3xl font-bold sm:text-4xl">Informasi Kontak</h2>
                                    <p class="mt-1 text-base text-gray-500 text-pretty">
                                        15.00 - 01.00 / 02.00 (Satnight)
                                    </p>
                                    <p class="mt-4 text-gray-600">
                                        Jika Anda memiliki pertanyaan atau ingin menghubungi kami, jangan ragu
                                        untuk menghubungi
                                        melalui informasi berikut :
                                    </p>

                                    <details class="mt-3 group [&_summary::-webkit-details-marker]:hidden" open>
                                        <summary
                                            class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg bg-gray-50 p-4 text-gray-900">
                                            <h2 class="font-medium">Detail Kontak
                                            </h2>

                                            <svg class="transition duration-300 size-5 shrink-0 group-open:-rotate-180"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </summary>

                                        <dl class="flex gap-4 px-4 mt-4 leading-relaxed text-gray-700 sm:gap-6">
                                            <div class="flex flex-col-reverse">
                                                <dt class="text-xs text-gray-500">
                                                    info@robinbilliard.com
                                                </dt>
                                                <dd class="text-sm font-medium text-gray-600">Email</dd>
                                            </div>
                                            <div class="flex flex-col-reverse">
                                                <dt class="text-xs text-gray-500">
                                                    <a
                                                        href="https://api.whatsapp.com/send/?phone=6287721912655&text&type=phone_number&app_absent=0">
                                                        +62 877 219 126 55
                                                    </a>
                                                </dt>
                                                <dd class="text-sm font-medium text-gray-600">Telepon</dd>
                                            </div>
                                        </dl>
                                    </details>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="w-full mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-4">Detail Penerimaan Spesimen</h2>
        <div class="grid grid-cols-2 gap-4">
            <!-- Kolom 1 -->
            <div>
                <form>
                    @csrf

                    <!-- Tanggal dan Waktu -->
                    <div class="mb-4">
                        <label for="datetime" class="block mb-2 text-base font-medium text-gray-900">{{ __('Tanggal dan Waktu') }}</label>
                        <input type="text" id="datetime" name="datetime" value="{{ $spesimen->datetime }}" readonly
                            class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    </div>

                    <!-- Asal Pengirim -->
                    <div class="mb-4">
                        <label for="origin" class="block mb-2 text-base font-medium text-gray-900">{{ __('Asal Pengirim') }}</label>
                        <input type="text" id="origin" name="origin" value="{{ $spesimen->origin }}" readonly
                            class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    </div>

                    <!-- Nama Kurir -->
                    <div class="mb-4">
                        <label for="courier_name" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nama Kurir') }}</label>
                        <input type="text" id="courier_name" name="courier_name" value="{{ $spesimen->courier_name }}" readonly
                            class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    </div>

                    <!-- Ekspedisi -->
                    <div class="mb-4">
                        <label for="expedition" class="block mb-2 text-base font-medium text-gray-900">{{ __('Ekspedisi') }}</label>
                        <input type="text" id="expedition" name="expedition" value="{{ $spesimen->expedition }}" readonly
                            class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    </div>

                </form>
                <!-- Tombol Kembali -->
                <div class="mt-16">
                    <a href="{{ route('spesimen.index') }}" class="text-sm text-white bg-blue-500 py-2 px-4 rounded-full inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Kolom 2 -->
            <div>
                <form>
                    <!-- Nama PIC -->
                    <div class="mb-4">
                        <label for="pic_name" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nama PIC') }}</label>
                        <input type="text" id="pic_name" name="pic_name" value="{{ $spesimen->pic_name }}" readonly
                            class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    </div>

                    <!-- Nomor Telepon PIC -->
                    <div class="mb-4">
                        <label for="pic_phone" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nomor Telepon PIC') }}</label>
                        <input type="tel" id="pic_phone" name="pic_phone" value="{{ $spesimen->pic_phone }}" readonly
                            class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    </div>

                    <!-- Jenis Spesimen -->
                    <div class="mb-4">
                        <label for="specimen_type" class="block mb-2 text-base font-medium text-gray-900">{{ __('Jenis Spesimen') }}</label>
                        <input type="text" id="specimen_type" name="specimen_type" value="{{ $spesimen->specimen_type }}" readonly
                            class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    </div>

                    <!-- Jumlah Spesimen -->
                    <div class="mb-4">
                        <label for="specimen_quantity" class="block mb-2 text-base font-medium text-gray-900">{{ __('Jumlah Spesimen') }}</label>
                        <input type="number" id="specimen_quantity" name="specimen_quantity" value="{{ $spesimen->specimen_quantity }}" readonly
                            class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    </div>

                    <!-- Suhu Spesimen -->
                    <div class="mb-4">
                        <label for="specimen_temperature" class="block mb-2 text-base font-medium text-gray-900">{{ __('Suhu Spesimen') }}</label>
                        <input type="text" id="specimen_temperature" name="specimen_temperature" value="{{ $spesimen->specimen_temperature }}" readonly
                            class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

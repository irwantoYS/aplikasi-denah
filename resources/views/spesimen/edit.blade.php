<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Data Penerimaan Spesimen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Letakkan tag link atau style untuk CSS tambahan jika diperlukan -->
</head>
<body>
<x-app-layout>

    <div class="mt-0">
        <a href="{{ route('spesimen.index') }}" class="text-sm text-white bg-blue-500 py-2 px-4 rounded-full inline-flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <div class="w-1/3 mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Data Penerimaan Spesimen</h2>

        @if(session('success'))
            <script>alert('Data Berhasil Disimpan')</script>
        @endif

        <form action="{{ route('spesimen.update', $spesimen->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Field datetime tidak dapat diedit -->
            <div class="mb-4">
                <label for="datetime" class="block mb-2 text-base font-medium text-gray-900">{{ __('Tanggal dan Waktu') }}</label>
                <input type="datetime-local" id="datetime" name="datetime" value="{{ old('datetime', $spesimen->datetime) }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5" readonly>
                @error('datetime')
                    <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field asal pengirim -->
            <div class="mb-4">
                <label for="origin" class="block mb-2 text-base font-medium text-gray-900">{{ __('Asal Pengirim') }}</label>
                <input type="text" id="origin" name="origin" value="{{ old('origin', $spesimen->origin) }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                @error('origin')
                    <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field nama kurir -->
            <div class="mb-4">
                <label for="courier_name" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nama Kurir') }}</label>
                <input type="text" id="courier_name" name="courier_name" value="{{ old('courier_name', $spesimen->courier_name) }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                @error('courier_name')
                    <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field ekspedisi -->
            <div class="mb-4">
                <label for="expedition" class="block mb-2 text-base font-medium text-gray-900">{{ __('Ekspedisi') }}</label>
                <input type="text" id="expedition" name="expedition" value="{{ old('expedition', $spesimen->expedition) }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                @error('expedition')
                    <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field nama PIC -->
            <div class="mb-4">
                <label for="pic_name" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nama PIC') }}</label>
                <input type="text" id="pic_name" name="pic_name" value="{{ old('pic_name', $spesimen->pic_name) }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                @error('pic_name')
                    <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field nomor telepon PIC -->
            <div class="mb-4">
                <label for="pic_phone" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nomor Telepon PIC') }}</label>
                <input type="tel" id="pic_phone" name="pic_phone" value="{{ old('pic_phone', $spesimen->pic_phone) }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                @error('pic_phone')
                    <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field Jenis Spesimen -->
            <div class="mb-4">
                <label for="specimen_type" class="block mb-2 text-base font-medium text-gray-900">{{ __('Jenis Spesimen') }}</label>
                <input type="text" id="specimen_type" name="specimen_type" value="{{ old('specimen_type', $spesimen->specimen_type) }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                @error('specimen_type')
                    <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field Jumlah Spesimen -->
            <div class="mb-4">
                <label for="specimen_quantity" class="block mb-2 text-base font-medium text-gray-900">{{ __('Jumlah Spesimen') }}</label>
                <input type="number" id="specimen_quantity" name="specimen_quantity" value="{{ old('specimen_quantity', $spesimen->specimen_quantity) }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                @error('specimen_quantity')
                    <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="specimen_temperature" class="block mb-2 text-base font-medium text-gray-900">{{ __('Suhu Spesimen') }}</label>
                <select name="specimen_temperature" id="specimen_temperature" 
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    <option value="{{ old('specimen_temperature', $spesimen->specimen_temperature) }}">Pilih Suhu</option>
                    <option value="dingin" @if(old('specimen_temperature') == 'dingin') selected @endif>Dingin</option>
                    <option value="suhu_ruang" @if(old('specimen_temperature') == 'suhu_ruang') selected @endif>Suhu Ruang</option>
                </select>
                @error('specimen_temperature')
                <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>


            <!-- Tombol Simpan -->
            <div class="mt-6">
                <x-primary-button class="w-full">
                    {{ __('Simpan Perubahan') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Penerimaan Spesimen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Letakkan tag link atau style untuk CSS tambahan jika diperlukan -->
</head>
<body>
<x-app-layout>

<body>
    <div class="w-1/3 mx-auto">
        <h2 class="text-2xl font-bold mb-4">Formulir Penerimaan Spesimen</h2>
    
        <form action="{{ route('spesimen.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Tanggal dan Waktu -->
            <div class="mb-4">
                <label for="datetime" class="block mb-2 text-base font-medium text-gray-900">{{ __('Tanggal dan Waktu') }}</label>
                <input type="datetime-local" id="datetime" name="datetime" value="{{ old('datetime') }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5"
                       readonly>
                @error('datetime')
                <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

        
            <script>
                    // Get the current date and time as a string in the format required by datetime-local input.
                    function getCurrentDateTime() {
                        const now = new Date();
                        const year = now.getFullYear();
                        const month = (now.getMonth() + 1).toString().padStart(2, '0');
                        const day = now.getDate().toString().padStart(2, '0');
                        const hours = now.getHours().toString().padStart(2, '0');
                        const minutes = now.getMinutes().toString().padStart(2, '0');
                        return `${year}-${month}-${day}T${hours}:${minutes}`;
                    }

                    // Set the default value to the current date and time.
                    document.getElementById('datetime').value = getCurrentDateTime();
                </script>


            <!-- Asal Pengirim -->
            <div class="mb-4">
                <label for="origin" class="block mb-2 text-base font-medium text-gray-900">{{ __('Asal Pengirim') }}</label>
                <input type="text" id="origin" name="origin" value="{{ old('origin') }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5"
                       placeholder="Asal Pengirim">
                @error('origin')
                <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama Kurir -->
            <div class="mb-4">
                <label for="courier_name" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nama Kurir') }}</label>
                <input type="text" id="courier_name" name="courier_name" value="{{ old('courier_name') }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5"
                       placeholder="Nama Kurir">
                @error('courier_name')
                <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ekspedisi -->
            <div class="mb-4">
                <label for="expedition" class="block mb-2 text-base font-medium text-gray-900">{{ __('Ekspedisi') }}</label>
                <input type="text" id="expedition" name="expedition" value="{{ old('expedition') }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5"
                       placeholder="Ekspedisi">
                @error('expedition')
                <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama PIC -->
            <div class="mb-4">
                <label for="pic_name" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nama PIC') }}</label>
                <input type="text" id="pic_name" name="pic_name" value="{{ old('pic_name') }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5"
                       placeholder="Nama PIC">
                @error('pic_name')
                <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nomor Telepon PIC -->
            <div class="mb-4">
                <label for="pic_phone" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nomor Telepon PIC') }}</label>
                <input type="tel" id="pic_phone" name="pic_phone" value="{{ old('pic_phone') }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5"
                       placeholder="Nomor Telepon PIC">
                @error('pic_phone')
                <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jenis Spesimen -->
            <div class="mb-4">
                <label for="specimen_type" class="block mb-2 text-base font-medium text-gray-900">{{ __('Jenis Spesimen') }}</label>
                <input type="text" id="specimen_type" name="specimen_type" value="{{ old('specimen_type') }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5"
                       placeholder="Jenis Spesimen">
                @error('specimen_type')
                <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jumlah Spesimen -->
            <div class="mb-4">
                <label for="specimen_quantity" class="block mb-2 text-base font-medium text-gray-900">{{ __('Jumlah Spesimen') }}</label>
                <input type="number" id="specimen_quantity" name="specimen_quantity" value="{{ old('specimen_quantity') }}"
                       class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5"
                       placeholder="Jumlah Spesimen">
                @error('specimen_quantity')
                <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Suhu Spesimen -->
            <div class="mb-4">
                <label for="specimen_temperature" class="block mb-2 text-base font-medium text-gray-900">{{ __('Suhu Spesimen') }}</label>
                <select name="specimen_temperature" id="specimen_temperature"
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5">
                    <option value="" selected disabled hidden>Pilih Suhu</option>
                    <option value="dingin" @if(old('specimen_temperature') == 'dingin') selected @endif>Dingin</option>
                    <option value="suhu_ruang" @if(old('specimen_temperature') == 'suhu_ruang') selected @endif>Suhu Ruang</option>
                </select>
                @error('specimen_temperature')
                <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <x-primary-button class="w-full">
                    {{ __('Simpan') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</body>

</x-app-layout>
</body>
</html>
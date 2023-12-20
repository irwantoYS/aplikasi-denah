<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Informasi Denah Penyimpanan Spesimen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="w-full h-screen bg-gray-200 p-6 flex items-center justify-between">
        <div class="p-6 w-1/4 bg-white shadow-md rounded-md">
            <form action="{{ route('histories.store') }}" method="post">
                @csrf
                <!-- Name -->
                <div class="mb-4">
                    <label for="name"
                        class="block mb-2 text-base font-medium text-gray-900">{{ __('Nama') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5 custom-placeholder"
                        autocomplete="off" placeholder="Nama">
                    @error('name')
                        <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Employee ID -->
                <div class="mb-4">
                    <label for="employee_id"
                        class="block mb-2 text-base font-medium text-gray-900">{{ __('Nomor Pegawai') }}</label>
                    <input type="text" id="employee_id" name="employee_id" value="{{ old('employee_id') }}"
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5 custom-placeholder"
                        autocomplete="off" placeholder="Nomor Pegawai">
                    @error('employee_id')
                        <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Datetime -->
                <div class="mb-4">
                    <label for="datetime"
                        class="block mb-2 text-base font-medium text-gray-900">{{ __('Waktu dan Tanggal') }}</label>
                    <input type="datetime-local" id="datetime" name="datetime" value="{{ old('datetime') }}"
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5 custom-placeholder"
                        autocomplete="off" placeholder="Waktu dan Tanggal">
                    @error('datetime')
                        <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Freezer -->
                <div class="mb-4">
                    <label for="freezer_id"
                        class="block mb-2 text-base font-medium text-gray-900">{{ __('Freezer') }}</label>
                    <select name="freezer_id" id="freezer_id"
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5 custom-placeholder">
                        <option value="" selected disabled hidden>Pilih Freezer</option>
                        @foreach ($freezers as $freezer)
                            <option value="{{ $freezer->id }}" @selected(old('freezer_id') == $freezer->id)>
                                {{ $freezer->code }} - {{ $freezer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('unit_id')
                        <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Purpose -->
                <div class="mb-4">
                    <label for="purpose"
                        class="block mb-2 text-base font-medium text-gray-900">{{ __('Tujuan') }}</label>
                    <input type="text" id="purpose" name="purpose" value="{{ old('purpose') }}"
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5 custom-placeholder"
                        autocomplete="off" placeholder="Tujuan">
                    @error('purpose')
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
        <div class="w-3/4 bg-slate-400">
            <img src="{{ asset('img/LandscapeGroup16.png') }}" class="w-full bg-black" alt="">
        </div>
    </div>
</body>

</html>

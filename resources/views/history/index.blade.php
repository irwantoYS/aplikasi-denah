<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data>
    <div class="w-full h-screen bg-gray-200 p-6 flex items-center justify-between">
        <div class="p-6 w-1/4 bg-white shadow-md rounded-md ">
            <form action="{{ route('histories.store') }}" method="post">
                @csrf
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nama') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5 custom-placeholder" 
                        autocomplete="off" placeholder="Nama">
                    @error('name')
                        <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                    @enderror
                </div>
        
                <!-- Employee ID -->
                <div class="mb-4">
                    <label for="employee_id" class="block mb-2 text-base font-medium text-gray-900">{{ __('Nomor Pegawai') }}</label>
                    <input type="text" id="employee_id" name="employee_id" value="{{ old('employee_id') }}"
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5 custom-placeholder" 
                        autocomplete="off" placeholder="Nomor Pegawai">
                    @error('employee_id')
                        <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                    @enderror
                </div>
        
                <!-- Datetime -->
                <div class="mb-4">
                    <label for="datetime" class="block mb-2 text-base font-medium text-gray-900">{{ __('Waktu dan Tanggal') }}</label>
                    <input type="datetime-local" id="datetime" name="datetime" value="{{ old('datetime') }}"
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5 custom-placeholder" 
                        autocomplete="off" placeholder="Waktu dan Tanggal">
                    @error('datetime')
                        <p class="block mt-1 text-xs font-medium text-danger">{{ $message }}</p>
                    @enderror
                </div>
        
                <!-- Freezer -->
                <div class="mb-4">
                    <label for="freezer_id" class="block mb-2 text-base font-medium text-gray-900">{{ __('Freezer') }}</label>
                    <select name="freezer_id" id="freezer_id"
                        class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5 custom-placeholder">
                        <option value="" selected disabled hidden>Pilih Freezer</option>
                        @foreach ($freezers as $freezer)
                            <option value="{{ $freezer->id }}" 
                                @selected(old('freezer_id') == $freezer->id)>
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
                    <label for="purpose" class="block mb-2 text-base font-medium text-gray-900">{{ __('Tujuan') }}</label>
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
        <div class="w-3/4 relative border border-black">
            <img src="{{ asset('img/LandscapeGroup16.png') }}" class="w-full h-auto"  alt="">
            <button id="LEMARI 1" class="freezer-btn absolute top-[4px] right-[711px] bg-blue-400 text-xs p-1">L.A.1</button>
            <button id="LEMARI 2" class="freezer-btn absolute top-[4px] right-[665px] bg-blue-400 text-xs p-1">L.A.2</button>
        </div>
    </div>

    <div id="freezerDetailModal" class="fixed z-[110] inset-0 hidden">
        <div class="absolute z-[112] inset-0 bg-gray-600 bg-opacity-30 flex justify-center items-center py-4">
            <div class="bg-white w-10/12 md:w-3/5 lg:1/2 xl:w-1/3 rounded-md p-5">
                <!-- POP UP HEADER -->
                <div class="flex justify-between items-center mb-6">
                    <p class="block m-0 text-lg font-semibold text-gray-900 tracking-wide">
                        Detail Freezer
                    </p>
                    <button type="button" id="closeFreezerDetailButton" class="block border-none outline-none text-gray-900 hover:text-gray-800 font-medium">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <img id="freezer_picture" src="" class="w-full h-auto block mb-2" alt="">
                    <table class="w-full text-sm text-left text-gray-600">
                        <tbody class="w-full">
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                    Kode
                                </th>
                                <td class="px-2 py-1 align-baseline">:</td>
                                <td id="freezer_code" class="px-2 py-1 align-baseline"></td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                    Nama
                                </th>
                                <td class="px-2 py-1 align-baseline">:</td>
                                <td id="freezer_name" class="px-2 py-1 align-baseline"></td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                    Tipe
                                </th>
                                <td class="px-2 py-1 align-baseline">:</td>
                                <td id="freezer_type" class="px-2 py-1 flex flex-start gap-1.5 flex-wrap"></td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                    Tipe Spesimen
                                </th>
                                <td class="px-2 py-1 align-baseline">:</td>
                                <td id="freezer_specimen_type" class="px-2 py-1 flex flex-start gap-1.5 flex-wrap"></td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                    Merek
                                </th>
                                <td class="px-2 py-1 align-baseline">:</td>
                                <td id="freezer_merk" class="px-2 py-1 flex flex-start gap-1.5 flex-wrap"></td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                    Model
                                </th>
                                <td class="px-2 py-1 align-baseline">:</td>
                                <td id="freezer_model" class="px-2 py-1 flex flex-start gap-1.5 flex-wrap"></td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                    Kapasistas
                                </th>
                                <td class="px-2 py-1 align-baseline">:</td>
                                <td id="freezer_capacity" class="px-2 py-1 flex flex-start gap-1.5 flex-wrap"></td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                    Waktu Kalibrasi
                                </th>
                                <td class="px-2 py-1 align-baseline">:</td>
                                <td id="freezer_calibration_time" class="px-2 py-1 align-baseline"></td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                    BMN
                                </th>
                                <td class="px-2 py-1 align-baseline">:</td>
                                <td id="freezer_BMN" class="px-2 py-1 align-baseline"></td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                    Lokasi
                                </th>
                                <td class="px-2 py-1 align-baseline">:</td>
                                <td id="freezer_location" class="px-2 py-1 align-baseline"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function () {
            $(".freezer-btn").click(function (e) { 
                e.preventDefault();
                let code = $(this).attr("id");
                $.ajax({
                    type        : "GET",
                    url         : "/data-freezer/"+code,
                    success: function (response) {
                        console.log(response);
                        $("#freezer_code").text(response.code);
                        $("#freezer_name").text(response.name);
                        $("#freezer_type").text(response.type);
                        $("#freezer_specimen_type").text(response.specimen_type);
                        $("#freezer_merk").text(response.merk);
                        $("#freezer_model").text(response.model);
                        $("#freezer_capacity").text(response.capacity);
                        $("#freezer_calibration_time").text(response.calibration_time);
                        $("#freezer_BMN").text(response.bmn);
                        $("#freezer_location").text(response.location);
                        // $("#freezer_picture").attr('src', response.picture);
                        
                        
                        $("#freezerDetailModal").removeClass('hidden');
                    }
                });
            });

            $("#closeFreezerDetailButton").click(function (e) { 
                e.preventDefault();
                $("#freezer_code").text('');
                $("#freezer_name").text('');
                $("#freezer_type").text('');
                $("#freezer_specimen_type").text('');
                $("#freezer_merk").text('');
                $("#freezer_model").text('');
                $("#freezer_capacity").text('');
                $("#freezer_calibration_time").text('');
                $("#freezer_BMN").text('');
                $("#freezer_location").text('');
                // $("#freezer_picture").attr('src', '');
                
                $("#freezerDetailModal").addClass('hidden');
            });
        });
    </script>
</body>
</html>
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
    @if (session('success'))
        <div class="w-full">
            <div id="alertMessage" class="flex items-center p-4 m-4 bg-green-200 rounded-lg" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium text-green-700">
                    <span class="font-semibold">Berhasil!</span> {{ session('success') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-300 inline-flex h-8 w-8" data-dismiss-target="#alertMessage" aria-label="Close">
                    <span class="sr-only">Tutup</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
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
                    <input type="datetime-local" id="datetime" name="datetime" class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 block w-full p-2.5 custom-placeholder" autocomplete="off" placeholder="Waktu dan Tanggal" disabled value="{{ now()->format('Y-m-d\TH:i') }}">
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
        <div class="w-3/4 relative ">
            <img src="{{ asset('img/LandscapeGroup16.png') }}" class="w-full h-auto"  alt="">
            <button id="LEMARI 1" class="freezer-btn absolute top-[4px] right-[711px] bg-blue-400 text-xs p-1">L.A.1</button>
            <button id="LEMARI 2" class="freezer-btn absolute top-[4px] right-[665px] bg-blue-400 text-xs p-1">L.A.2</button>
            <button id="LEMARI 3" class="freezer-btn absolute top-[4px] right-[620px] bg-blue-400 text-xs p-1">L.A.3</button>
            <button id="LEMARI 4" class="freezer-btn absolute top-[4px] right-[530px] bg-blue-400 text-xs p-1">L.A.4</button>
            <button id="LEMARI 5" class="freezer-btn absolute top-[4px] right-[489px] bg-blue-400 text-xs p-1">L.A.5</button>
            <button id="LEMARI 6" class="freezer-btn absolute top-[4px] right-[448px] bg-blue-400 text-xs p-1">L.A.6</button>
            <button id="LEMARI 7" class="freezer-btn absolute top-[4px] right-[406px] bg-blue-400 text-xs p-1">L.A.7</button>
            <button id="NDF11" class="freezer-btn absolute top-[93px] right-[668px] bg-blue-400 text-xs p-1.5">DF.A.1</button>
            <button id="NDF9" class="freezer-btn absolute top-[93px] right-[616px] bg-blue-400 text-xs p-1.5">DF.A.2</button>
            <button id="NDF8" class="freezer-btn absolute top-[93px] right-[539px] bg-blue-400 text-xs p-1.5">DF.A.3</button>
            <button id="NDF29" class="freezer-btn absolute top-[93px] right-[487px] bg-blue-400 text-xs p-1.5">DF.A.4</button>
            <button id="NDF28" class="freezer-btn absolute top-[93px] right-[435px] bg-blue-400 text-xs p-1.5">DF.A.5</button>
            <button id="NDF14" class="freezer-btn absolute top-[145px] right-[695px] bg-blue-400 text-xs p-1.5">DF.B.1</button>
            <button id="NDF15" class="freezer-btn absolute top-[145px] right-[641px] bg-blue-400 text-xs p-1.5">DF.B.2</button>
            <button id="NDF16" class="freezer-btn absolute top-[145px] right-[586px] bg-blue-400 text-xs p-1.5">DF.B.3</button>
            <button id="NDF17" class="freezer-btn absolute top-[145px] right-[530px] bg-blue-400 text-xs p-1.5">DF.B.4</button>
            <button id="NDF18" class="freezer-btn absolute top-[145px] right-[474px] bg-blue-400 text-xs p-1.5">DF.B.5</button>
            <button id="NDF32" class="freezer-btn absolute top-[145px] right-[418px] bg-blue-400 text-xs p-1.5">DF.B.6</button>
            <button id="NDF10" class="freezer-btn absolute top-[355px] right-[849px] bg-blue-400 text-xs p-1.5">DF.B.7</button>
            <button id="NDF" class="freezer-btn absolute top-[355px] right-[798px] bg-blue-400 text-xs p-1.5">DF.B.8</button>
            <button id="NDF" class="freezer-btn absolute top-[355px] right-[745px] bg-blue-400 text-xs p-1.5">DF.B.9</button>
            <button id="NDF" class="freezer-btn absolute top-[355px] right-[689px] bg-blue-400 text-xs p-1.5">DF.B.10</button>
            <button id="NDF" class="freezer-btn absolute top-[355px] right-[635px] bg-blue-400 text-xs p-1.5">DF.B.11</button>
            <button id="NDF" class="freezer-btn absolute top-[355px] right-[582px] bg-blue-400 text-xs p-1.5">DF.B.12</button>
            <button id="NDF13" class="freezer-btn absolute top-[355px] right-[523px] bg-blue-400 text-xs p-1.5">DF.B.13</button>
            <button id="NDF30" class="freezer-btn absolute top-[355px] right-[470px] bg-blue-400 text-xs p-1.5">DF.B.14</button>
            <button id="NDF4" class="freezer-btn absolute top-[422px] right-[852px] bg-blue-400 text-xs p-1">DF.C.1</button>
            <button id="NDF5" class="freezer-btn absolute top-[422px] right-[808px] bg-blue-400 text-xs p-1">DF.C.2</button>
            <button id="NDF6" class="freezer-btn absolute top-[586px] right-[826px] bg-blue-400 text-xs p-1.5">DF.C.3</button>
            <button id="NDF1" class="freezer-btn absolute top-[586px] right-[778px] bg-blue-400 text-xs p-1.5">DF.C.4</button>
            <button id="NK1" class="freezer-btn absolute top-[590px] right-[374px] bg-purple-900 text-xs p-1">K.C.1</button>
            <button id="NK2" class="freezer-btn absolute top-[590px] right-[336px] bg-purple-900 text-xs p-1">K.C.2</button>
            <button id="NK3" class="freezer-btn absolute top-[590px] right-[297px] bg-purple-900 text-xs p-1">K.C.3</button>
            <button id="NDF19" class="freezer-btn absolute top-[145px] right-[280px] bg-blue-400 text-xs p-1.5">DF.D.1</button>
            <button id="NDF20" class="freezer-btn absolute top-[145px] right-[228px] bg-blue-400 text-xs p-1.5">DF.D.2</button>
            <button id="NDF21" class="freezer-btn absolute top-[145px] right-[176px] bg-blue-400 text-xs p-1.5">DF.D.3</button>
            <button id="NDF22" class="freezer-btn absolute top-[145px] right-[123px] bg-blue-400 text-xs p-1.5">DF.D.4</button>
        </div>
    </div>

    <div id="freezerDetailModal" class="fixed z-[110] inset-0 hidden">
        <div class="absolute z-[112] inset-0 bg-gray-600 bg-opacity-30 flex justify-center items-center py-4">
            <div class="bg-white w-10/12 lg:2/3 xl:w-2/5 rounded-md p-5">
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
                <div class="flex justify-between gap-5">
                    <div class="w-1/3 aspect-[9/16]" id="freezer_picture">
                    </div>
                    <div class="w-2/3">
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
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-2 py-1 align-baseline font-medium text-gray-900 whitespace-nowrap">
                                        Keterangan
                                    </th>
                                    <td class="px-2 py-1 align-baseline">:</td>
                                    <td id="freezer_status" class="px-2 py-1 align-baseline"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-end mt-4">
                            <button type="button" id="select-freezer-btn" data-id="" class="py-1 px-2 mr-2 text-white text-sm bg-blue-600 rounded outline-none hover:bg-blue-700">Pilih Freezer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FlowBite -->
    <script src="{{ asset('js/flowbite.min.js') }}"></script>
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
                        $("#freezer_status").text(response.status);
                        $("#select-freezer-btn").attr('data-id', response.id);
                        if (response.picture) {
                            let pictureElement = `<img src="{{ asset('storage/`+response.picture+`') }}" class="w-full h-auto">`
                            $("#freezer_picture").html(pictureElement);
                        } else {
                            let pictureElement = `<div class="w-full aspect-[9/16] rounded bg-gray-200 flex flex-col justify-center">
                                <p class="block w-full text-center text-sm font-medium text-gray-600">Belum ada gambar</p>
                            </div>`;
                            $("#freezer_picture").html(pictureElement);
                        }
                        
                        
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
                $("#freezer_status").text('');
                $("#select-freezer-btn").attr('data-id', '');
                $("#freezer_picture").html('');
                
                $("#freezerDetailModal").addClass('hidden');
            });
            $("#select-freezer-btn").click(function (e) { 
                e.preventDefault();
                let freezer_id = $(this).attr('data-id');
                $("#freezer_id").val(freezer_id);
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
                $("#select-freezer-btn").attr('data-id', '');
                // $("#freezer_picture").attr('src', '');
                
                $("#freezerDetailModal").addClass('hidden');
            });
        });
    </script>
</body>
</html>
</body>
</html>
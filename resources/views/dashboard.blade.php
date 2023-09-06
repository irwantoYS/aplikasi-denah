<x-app-layout>
    <x-slot name="header">
            {{ __('Dashboard') }}
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <div class="w-full relative">
                <img src="{{ asset('img/LandscapeGroup16.png') }}" class="w-full h-auto"  alt="">
                <button id="LEMARI 1" class="freezer-btn absolute top-[4px] right-[711px] bg-blue-400 text-xs p-1">L.A.1</button>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
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
                        <img id="freezer_picture" src="{{ asset('img/sample.jpeg') }}" class="w-1/3 h-auto" alt="">
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
                            $("#select-freezer-btn").attr('data-id', response.id);
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
                    $("#select-freezer-btn").attr('data-id', '');
                    // $("#freezer_picture").attr('src', '');
                    
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
    </x-slot>
</x-app-layout>

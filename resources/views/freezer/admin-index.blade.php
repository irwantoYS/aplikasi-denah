<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/cropper.min.css') }}">
    </x-slot>

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

    <x-slot name="header">
            {{ __('Data Freezer') }}
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <div class="w-full relative">
                <img src="{{ asset('img/LandscapeGroup16.png') }}" class="w-full h-auto"  alt="">
                <button id="LEMARI 1" class="freezer-btn absolute top-[5px] right-[746px] bg-blue-400 text-xs p-1">L.A.1</button>
                <button id="LEMARI 2" class="freezer-btn absolute top-[5px] right-[698px] bg-blue-400 text-xs p-1">L.A.2</button>
                <button id="LEMARI 3" class="freezer-btn absolute top-[5px] right-[651px] bg-blue-400 text-xs p-1">L.A.3</button>
                <button id="LEMARI 4" class="freezer-btn absolute top-[5px] right-[556px] bg-blue-400 text-xs p-1">L.A.4</button>
                <button id="LEMARI 5" class="freezer-btn absolute top-[5px] right-[514px] bg-blue-400 text-xs p-1">L.A.5</button>
                <button id="LEMARI 6" class="freezer-btn absolute top-[5px] right-[470px] bg-blue-400 text-xs p-1">L.A.6</button>
                <button id="LEMARI 7" class="freezer-btn absolute top-[5px] right-[425px] bg-blue-400 text-xs p-1">L.A.7</button>
                <button id="NDF11" class="freezer-btn absolute top-[99px] right-[700px] bg-blue-400 text-xs p-1.5">DF.A.1</button>
                <button id="NDF9" class="freezer-btn absolute top-[99px] right-[647px] bg-blue-400 text-xs p-1.5">DF.A.2</button>
                <button id="NDF8" class="freezer-btn absolute top-[99px] right-[566px] bg-blue-400 text-xs p-1.5">DF.A.3</button>
                <button id="NDF29" class="freezer-btn absolute top-[99px] right-[511px] bg-blue-400 text-xs p-1.5">DF.A.4</button>
                <button id="NDF28" class="freezer-btn absolute top-[99px] right-[457px] bg-blue-400 text-xs p-1.5">DF.A.5</button>
                <button id="NDF14" class="freezer-btn absolute top-[153px] right-[728px] bg-blue-400 text-xs p-1.5">DF.B.1</button>
                <button id="NDF15" class="freezer-btn absolute top-[153px] right-[670px] bg-blue-400 text-xs p-1.5">DF.B.2</button>
                <button id="NDF16" class="freezer-btn absolute top-[153px] right-[612px] bg-blue-400 text-xs p-1.5">DF.B.3</button>
                <button id="NDF17" class="freezer-btn absolute top-[153px] right-[555px] bg-blue-400 text-xs p-1.5">DF.B.4</button>
                <button id="NDF18" class="freezer-btn absolute top-[153px] right-[495px] bg-blue-400 text-xs p-1.5">DF.B.5</button>
                <button id="NDF32" class="freezer-btn absolute top-[153px] right-[437px] bg-blue-400 text-xs p-1.5">DF.B.6</button>
                <button id="NDF10" class="freezer-btn absolute top-[372px] right-[890px] bg-blue-400 text-xs p-1.5">DF.B.7</button>
                <button id="NDF" class="freezer-btn absolute top-[372px] right-[835px] bg-blue-400 text-xs p-1.5">DF.B.8</button>
                <button id="NDF" class="freezer-btn absolute top-[372px] right-[783px] bg-blue-400 text-xs p-1.5">DF.B.9</button>
                <button id="NDF" class="freezer-btn absolute top-[372px] right-[727px] bg-blue-400 text-xs p-1.5">DF.B.10</button>
                <button id="NDF" class="freezer-btn absolute top-[372px] right-[669px] bg-blue-400 text-xs p-1.5">DF.B.11</button>
                <button id="NDF" class="freezer-btn absolute top-[372px] right-[614px] bg-blue-400 text-xs p-1.5">DF.B.12</button>
                <button id="NDF13" class="freezer-btn absolute top-[372px] right-[550px] bg-blue-400 text-xs p-1.5">DF.B.13</button>
                <button id="NDF30" class="freezer-btn absolute top-[372px] right-[493px] bg-blue-400 text-xs p-1.5">DF.B.14</button>
                <button id="NDF4" class="freezer-btn absolute top-[442px] right-[892px] bg-blue-400 text-xs p-1">DF.C.1</button>
                <button id="NDF5" class="freezer-btn absolute top-[442px] right-[848px] bg-blue-400 text-xs p-1">DF.C.2</button>
                <button id="NDF6" class="freezer-btn absolute top-[613px] right-[865px] bg-blue-400 text-xs p-1.5">DF.C.3</button>
                <button id="NDF1" class="freezer-btn absolute top-[613px] right-[817px] bg-blue-400 text-xs p-1.5">DF.C.4</button>
                <button id="NK1" class="freezer-btn absolute top-[617px] right-[393px] bg-purple-900 text-xs p-1">K.C.1</button>
                <button id="NK2" class="freezer-btn absolute top-[617px] right-[352px] bg-purple-900 text-xs p-1">K.C.2</button>
                <button id="NK3" class="freezer-btn absolute top-[617px] right-[312px] bg-purple-900 text-xs p-1">K.C.3</button>
                <button id="NDF19" class="freezer-btn absolute top-[153px] right-[297px] bg-blue-400 text-xs p-1.5">DF.D.1</button>
                <button id="NDF20" class="freezer-btn absolute top-[153px] right-[242px] bg-blue-400 text-xs p-1.5">DF.D.2</button>
                <button id="NDF21" class="freezer-btn absolute top-[153px] right-[189px] bg-blue-400 text-xs p-1.5">DF.D.3</button>
                <button id="NDF22" class="freezer-btn absolute top-[153px] right-[135px] bg-blue-400 text-xs p-1.5">DF.D.4</button>
            </div>
        </div>
    </div>

    <div id="modal" class="fixed z-[2220] inset-0 hidden">
        <div class="absolute z-[2222] inset-0 bg-black bg-opacity-30 flex justify-center items-center py-4">
            <div class="bg-white w-10/12 md:w-1/2 lg:2/5 xl:w-1/3 rounded-md p-3">
                <!-- POP UP HEADER -->
                <div class="flex justify-between items-center mb-4">
                    <p class="block m-0 text-lg font-semibold text-gray-900 tracking-wide">
                        Sesuaikan Gambar 
                    </p>
                    <button id="closeModal" type="button" class="block border-none outline-none text-gray-900 hover:text-gray-800 font-medium">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </button>
                </div>
    
                <!-- POP UP BODY -->
                <div id="popUpBody" class="w-full aspect-square mb-4">
                </div>
                <div class="w-full">
                    <button id="crop_image" type="button" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                        {{ __('Pilih Gambar') }}
                    </button>
                </div>
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
                    <form action="{{ route('freezers.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="picture" id="upload_picture" class="hidden">
                        <div class="flex items-center justify-between gap-5">
                            <div class="w-1/3 relative overflow-hidden">
                                <p id="file_error" class="hidden w-full text-xs font-medium mb-2 text-red-600 text-center"></p>
                                <label for="upload_picture" class="relative w-full aspect-[9/16] overflow-hidden group" id="freezer_picture">
                                    {{-- <img id="cropped_image" src="{{ asset('img/sample.jpeg') }}" class="w-full h-auto" alt="">
                                    <div class="absolute bottom-0 w-full bg-white bg-opacity-75 lg:bg-opacity-90 font-semibold lg:font-normal text-sm text-center py-4 text-primary-50 lg:translate-y-full lg:group-hover:translate-y-0 lg:transition-all lg:ease-in-out lg:duration-300">
                                        <p>Klik untuk mengubah <br> foto freezer</p>
                                    </div> --}}
                                </label>
                            </div>
                            <div class="w-2/3">
                                <input type="hidden" name="id" id="freezer_id">
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">Kode</div>
                                    <div class="w-[55%]">
                                        <input type="text" name="code" id="freezer_code" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">Nama</div>
                                    <div class="w-[55%]">
                                        <input type="text" name="name" id="freezer_name" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">Tipe</div>
                                    <div class="w-[55%]">
                                        <input type="text" name="type" id="freezer_type" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">Tipe Spesimen</div>
                                    <div class="w-[55%]">
                                        <input type="text" name="specimen_type" id="freezer_specimen_type" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">Merek</div>
                                    <div class="w-[55%]">
                                        <input type="text" name="merk" id="freezer_merk" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">Model</div>
                                    <div class="w-[55%]">
                                        <input type="text" name="model" id="freezer_model" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">Kapasistas</div>
                                    <div class="w-[55%]">
                                        <input type="number" name="capacity" id="freezer_capacity" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">Waktu Kalibrasi</div>
                                    <div class="w-[55%]">
                                        <input type="number" name="calibration_time" id="freezer_calibration_time" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">BMN</div>
                                    <div class="w-[55%]">
                                        <input type="text" name="bmn" id="freezer_bmn" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">Lokasi</div>
                                    <div class="w-[55%]">
                                        <input type="text" name="location" id="freezer_location" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex w-full gap-4 mb-1">
                                    <div class="w-[40%] text-sm">Keterangan</div>
                                    <div class="w-[55%]">
                                        <input type="text" name="status" id="freezer_status" class="block w-full text-sm py-0.5 px-1 outline-none border border-blue-300 rounded-sm">
                                    </div>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button type="submit" class="py-1 px-2 mr-2 text-white text-sm bg-blue-600 rounded outline-none hover:bg-blue-700">Ubah Data Freezer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/cropper.min.js') }}"></script>
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
                            $("#freezer_id").val(response.id);
                            $("#freezer_code").val(response.code);
                            $("#freezer_name").val(response.name);
                            $("#freezer_type").val(response.type);
                            $("#freezer_specimen_type").val(response.specimen_type);
                            $("#freezer_merk").val(response.merk);
                            $("#freezer_model").val(response.model);
                            $("#freezer_capacity").val(response.capacity);
                            $("#freezer_calibration_time").val(response.calibration_time);
                            $("#freezer_bmn").val(response.bmn);
                            $("#freezer_location").val(response.location);
                            $("#freezer_status").val(response.status);
                            if (response.picture) {
                                let pictureElement = ""
                                + "<img id=\"cropped_image\" src=\"storage/"+response.picture+"\" class=\"w-full h-full\">"
                                + "<div class=\"absolute bottom-0 w-full bg-white bg-opacity-75 lg:bg-opacity-90 font-semibold lg:font-normal text-sm text-center py-4 text-primary-50 lg:translate-y-full lg:group-hover:translate-y-0 lg:transition-all lg:ease-in-out lg:duration-300\">"
                                    + "<p>Klik untuk mengubah <br> foto freezer</p>"
                                + "</div>";
                                $("#freezer_picture").html(pictureElement);
                            } else {
                                let pictureElement = `<img id="cropped_image" src="{{ asset('img/BelumAdaGambar.png') }}" class="w-full h-auto" alt="">
                                    <div class="absolute bottom-0 w-full bg-white bg-opacity-75 lg:bg-opacity-90 font-semibold lg:font-normal text-sm text-center py-4 text-primary-50 lg:translate-y-full lg:group-hover:translate-y-0 lg:transition-all lg:ease-in-out lg:duration-300">
                                        <p>Klik untuk mengubah <br> foto freezer</p>
                                    </div>`;
                                $("#freezer_picture").html(pictureElement);
                            }
                            
                            $("#freezerDetailModal").removeClass('hidden');
                        }
                    });
                });
    
                $("#closeFreezerDetailButton").click(function (e) { 
                    e.preventDefault();
                    $("#freezer_id").val('');
                    $("#freezer_code").val('');
                    $("#freezer_name").val('');
                    $("#freezer_type").val('');
                    $("#freezer_specimen_type").val('');
                    $("#freezer_merk").val('');
                    $("#freezer_model").val('');
                    $("#freezer_capacity").val('');
                    $("#freezer_calibration_time").val('');
                    $("#freezer_BMN").val('');
                    $("#freezer_location").val('');
                    $("#freezer_status").val('');
                    
                    $("#freezerDetailModal").addClass('hidden');
                });
                
                // INPUT FILE CHANGE EVENT
                $("#upload_picture").on("change", function (event) { 
                    let file = event.target.files[0];
                    let done = (url) => {
                        let img = "<img id=\"preview\" src=\""+url+"\" class=\"w-auto h-full\">";
                        $("#popUpBody").empty();
                        $("#popUpBody").html(img);
                        let image = document.getElementById("preview");
                        cropper = new Cropper(image, {
                            aspectRatio     : 9/16,
                            viewMode        : 1,
                            minCropBoxWidth : 240,
                            minCropBoxHeight: 240,
                        });
                        $("#modal").removeClass("hidden");
                    };
                    
                    if(file){
                        if(file.type.split("/")[0] == "image"){
                            if(file.size <= 1048578){
                                if($("#file_error").hasClass("block")){
                                    $("#file_error").removeClass("block");
                                    $("#file_error").addClass("hidden");
                                }
                                let reader = new FileReader();
                                reader.onload = (event) => {
                                    done(reader.result);
                                };
                                reader.readAsDataURL(file);
                            }else{
                                if($("#file_error").hasClass("hidden")){
                                    $("#file_error").removeClass("hidden");
                                    $("#file_error").addClass("block");
                                }
                                $("#file_error").text("Ukuran maksimal file yang dipilih adalah 1MB.");
                                $(this).val("");
                            }
                        }else{
                            if($("#file_error").hasClass("hidden")){
                                $("#file_error").removeClass("hidden");
                                $("#file_error").addClass("block");
                            }
                            $("#file_error").text("Hanya dapat menerima file gambar JPG, JPEG, atau PNG.");
                            $(this).val("");
                        }
                    }
                });

                // FORCE-CLOSE THE MODAL
                $("#closeModal").click(function (event) { 
                    event.preventDefault();
                    $("#modal").addClass("hidden");
                    $("#popUpBody").empty();
                    $("#profile_picture").val("");
                    $("#cropped_image").attr("src", originalSrc);
                    cropper = null;
                });

                // USER CLICK THE "CROP" BUTTON
                $("#crop_image").on("click", function () {
                    let canvas = cropper.getCroppedCanvas({
                        width   : 180,
                        height  : 320,
                    });

                    canvas.toBlob(function(blob){
                        url = URL.createObjectURL(blob);
                        $("#cropped_image").attr("src", url);
                        let newFile = new File([blob], 'TempFileName.jpg', {type:"image/jpeg", lastModified:new Date().getTime()}, 'utf-8');
                        let container = new DataTransfer(); 
                        container.items.add(newFile);
                        $("#upload_picture").val("")
                        document.querySelector('#upload_picture').files = container.files;
                        $("#modal").addClass("hidden");
                    });
                });
            });
        </script>
    </x-slot>
</x-app-layout>

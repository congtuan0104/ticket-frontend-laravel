<x-app-layout>
    <div class="flex flex-col items-center justify-center px-12 mt-2 py-4 w-screen">
        <div class="bg-white w-full flex items-center py-4">
            <ul class="steps w-full">
                <li class="step step-primary">Thông tin sự kiện</li>
                <li class="step">Thời gian và loại vé</li>
                <!-- <li class="step">Khuyến mãi</li> -->
            </ul>
        </div>

        <div class="bg-white w-full px-12 py-4 mt-2">
            <form class="w-full flex flex-col justify-between items-center gap-3 mt-2" method="post"
                enctype="multipart/form-data" action="{{route('event.store')}}">
                @csrf
                <div class="w-full h-64 flex items-center justify-around">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <label for="thumbnail"
                            class="hover:border-blue-400 hover:border-2 h-64 w-80 gap-6 flex flex-col items-center justify-center hover:text-blue-900"
                            id="thumbnail_review">
                            <div class="w-60 h-60 flex flex-col justify-center items-center relative"
                                id="thumbnail_holder">
                                <img class="size-58 object-cover"
                                    src="https://www.svgrepo.com/show/485545/upload-cicle.svg" alt="file upload icon"
                                    id="presentThumbnail">
                            </div>
                            <input onchange="loadThumbnail(event)" type="file" id="thumbnail" name="thumbnail" hidden>
                        </label>
                        <span class="block text-base font-semibold relative" id="thumbnail_description">
                            UPLOAD THUMBNAIL
                        </span>
                        @if ($errors->get('thumbnail'))
                            <span class="block sm:inline text-sm text-red-700 bg-red-100 border-red-400 py-1 px-2 mt-2">
                                Vui lòng chọn ảnh.
                            </span>
                        @endif
                    </div>
                    <div class="flex flex-col items-center justify-center gap-1">
                        <label for="logo"
                            class="hover:border-blue-400 hover:border-2 h-52 w-52 gap-6 flex flex-col items-center justify-center hover:text-blue-900"
                            id="logo_review">
                            <div class="w-48 h-48 flex flex-col justify-center items-center" id="logo_holder">
                                <img class="size-46 object-cover"
                                    src="https://www.svgrepo.com/show/485545/upload-cicle.svg" alt="file upload icon"
                                    id="presentLogo" />
                            </div>
                            <input onchange="loadLogo(event)" type="file" id="logo" name="logo" hidden>
                        </label>
                        <span class="block text-base font-semibold relative" id="logo_description">
                            UPLOAD LOGO
                        </span>
                        @if ($errors->get('logo'))
                            <span class="block sm:inline text-sm text-red-700 bg-red-100 border-red-400 py-1 px-2 mt-2">
                                Vui lòng chọn ảnh.
                            </span>
                        @endif
                    </div>
                </div>



                <div class="w-full grid grid-cols-5 gap-12">
                    <label class="form-control col-span-3" for="eventName">
                        <div class="label">
                            <span class="label-text">Tên sự kiện</span>
                        </div>
                        <input type="text" class="input input-bordered" id="eventName" name="eventName">

                        @if ($errors->get('eventName'))
                            <span class="block sm:inline text-sm text-red-700 bg-red-100 border-red-400 py-1 px-2 mt-2">
                                Vui lòng nhập tên sự kiện
                            </span>
                        @endif
                    </label>

                    <label class="form-control col-span-2" for="eventCategoryId">
                        <div class="label">
                            <span class="label-text">Thể loại</span>
                        </div>
                        <select name="eventCategoryId" id="eventCategoryId" class="select select-bordered">
                            <option disabled selected>Chọn thể loại</option>
                            @foreach ($categories as $category)
                                <option value={{$category['eventCategoryId']}}>
                                    {{$category['eventCategoryName']}}
                                </option>
                            @endforeach
                        </select>


                        @if ($errors->get('eventCategoryId'))
                            <span class="block sm:inline text-sm text-red-700 bg-red-100 border-red-400 py-1 px-2 mt-2">
                                Vui lòng chọn thể loại
                            </span>
                        @endif
                    </label>

                </div>

                <div class="w-full items-center grid grid-cols-9 gap-12" for="eventAddress">
                    <label class="form-control col-span-3">
                        <div class="label">
                            <span class="label-text">Địa chỉ tổ chức</span>
                        </div>
                        <input id="eventAddress" name="eventAddress" type="text" class="input input-bordered">

                        @if ($errors->get('eventAddress'))
                            <span class="block sm:inline text-sm text-red-700 bg-red-100 border-red-400 py-1 px-2 mt-2">
                                Vui lòng nhập địa chỉ
                            </span>
                        @endif
                    </label>

                    <label class="form-control col-span-2" for="event_location_1">
                        <div class="label">
                            <span class="label-text">Phường / Xã</span>
                        </div>
                        <input type="text" class="input input-bordered" id="event_location_1" name="event_location_1">

                        @if ($errors->get('event_location_1'))
                            <span class="block sm:inline text-sm text-red-700 bg-red-100 border-red-400 py-1 px-2 mt-2">
                                Còn trống
                            </span>
                        @endif
                    </label>

                    <label class="form-control col-span-2" for="event_location_2">
                        <div class="label">
                            <span class="label-text">Quận / Huyện</span>
                        </div>
                        <input type="text" class="input input-bordered" id="event_location_2" name="event_location_2">
                        @if ($errors->get('event_location_2'))
                            <span class="block sm:inline text-sm text-red-700 bg-red-100 border-red-400 py-1 px-2 mt-2">
                                Còn trống
                            </span>
                        @endif
                    </label>

                    <label class="form-control col-span-2" for="cityId">
                        <div class="label">
                            <span class="label-text">Tỉnh / Thành Phố</span>
                        </div>
                        <select name="cityId" id="cityId" class="select select-bordered">
                            <option disabled selected>Tên Tỉnh / Thành Phố</option>
                            @foreach ($cities as $city)
                                <option value={{$city['cityId']}}>{{$city['cityName']}}</option>
                            @endforeach
                        </select>
                        @if ($errors->get('cityId'))
                            <span class="block sm:inline text-sm text-red-700 bg-red-100 border-red-400 py-1 px-2 mt-2">
                                Vui lòng chọn thành phố
                            </span>
                        @endif
                    </label>
                </div>

                <div class="w-full flex items-center">
                    <label class="form-control w-full" for="eventDescription">
                        <div class="label">
                            <span class="label-text">Mô tả</span>
                        </div>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Thông tin sự kiện"
                            id="eventDescription" name="eventDescription"></textarea>
                    </label>
                </div>

                <button class="btn btn-neutral mt-4 self-end" type="submit">
                    Tạo sự kiện
                    <i class="fa fa-arrow-circle-right"></i>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    var loadThumbnail = function (event) {
        var file = event.target.files[0]
        var output = document.getElementById('presentThumbnail');

        output.src = URL.createObjectURL(file);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    }

    var loadLogo = function (event) {
        var file = event.target.files[0]
        var output = document.getElementById('presentLogo');

        output.src = URL.createObjectURL(file);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    }


</script>
</script>
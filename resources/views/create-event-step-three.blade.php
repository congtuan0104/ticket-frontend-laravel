<x-app-layout>
    <div class="flex flex-col items-center justify-center px-12 mt-2 py-4 w-screen">
        <div class="bg-white w-full flex items-center py-4">
            <ul class="steps w-full">
                <li class="step step-primary">Thông tin sự kiện</li>
                <li class="step step-primary">Thời gian và loại vé</li>
                <li class="step step-primary">Khuyến mãi</li>
            </ul>
        </div>
    </div>

    <div class="bg-white w-full px-12 py-4 mt-2">
        <p class="font-semibold text-xl">Thiết lập khuyến mãi</p>
        <form class="w-full flex flex-col justify-between items-center gap-3 mt-2" method="post"
            action="{{route('event.create.step.three.post')}}">
            @csrf
        </form>
    </div>
</x-app-layout>
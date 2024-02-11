<x-top-layout>
    <x-slot name="title">ホーム</x-slot>

    <div class="h-screen w-screen bg-bkg-color space-y-4 flex flex-col justify-center items-center">

        @if (Auth::check());
            <x-refer-button type="button" onclick="location.href='{{ route('login') }}'"
                class="group-hover:text-black-color">マイページ</x-refer-button>
        @else
            <x-refer-button type="button" onclick="location.href='{{ route('login') }}'"
                class="group-hover:text-black-color">ログイン</x-refer-button>
            <x-refer-button type="button" onclick="location.href='{{ route('register') }}'"
                class="group-hover:text-black-color ">登録</x-refer-button>
        @endif
    </div>
</x-top-layout>

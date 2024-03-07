<x-top-layout>
    <x-slot name="title">ホーム</x-slot>

    <div class="h-screen w-screen bg-bkg-color space-y-4 flex flex-col justify-center items-center">
        <x-submit-button type="button" onclick="location.href='{{ route('login') }}'"
            class="group-hover:text-black-color">
            <x-slot name="normal"> ログイン</x-slot></x-submit-button>

        <x-submit-button type="button" onclick="location.href='{{ route('register') }}'"
            class="group-hover:text-black-color">
            <x-slot name="normal">新規登録</x-slot>
        </x-submit-button>
    </div>
</x-top-layout>

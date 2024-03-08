<x-top-layout>
    <x-slot name="title">ホーム</x-slot>

    <div class="h-screen w-screen bg-bkg-color space-y-4 flex flex-col justify-center items-center">
        <x-action-button type="button" onclick="location.href='{{ route('login') }}'"
            class="group-hover:text-black-color">
            ログイン</x-action-button>

        <x-action-button type="button" onclick="location.href='{{ route('register') }}'"
            class="group-hover:text-black-color">
            新規登録
        </x-action-button>
    </div>
</x-top-layout>

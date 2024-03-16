<x-top-layout>
    <x-slot name="title">ホーム</x-slot>
    @if (!Auth::check())
        <div class="h-screen w-screen space-y-4 flex flex-col justify-center items-center">
            <x-action-button type="button" onclick="location.href='{{ route('login') }}'" class="">
                ログイン</x-action-button>

            <x-action-button type="button" onclick="location.href='{{ route('register') }}'" class="">
                新規登録
            </x-action-button>
        </div>
    @else
        <div class="h-screen w-screen space-y-4 flex flex-col justify-center items-center">
            <x-action-button onclick="location.href='{{ route('dashboard') }}'">本日の記録</x-action-button>
        </div>
    @endif

</x-top-layout>

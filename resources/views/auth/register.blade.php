<x-guest-layout>
    <x-slot name="title">新規登録</x-slot>
    <div class="flex items-center justify-center mb-3 text-2xl font-semibold text-black-color">
        新規登録
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- age  -->
        <div class="mt-4">
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" pattern="^([1-9]\d*|0)(\.\d+)?$"
                min="0" name="age" :value="old('age')" required autofocus autocomplete="age" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <!-- sex  -->
        <div class="mt-4">
            <x-input-label :value="__('Sex')" />
            <div class="mt-2 ">
                <label for="female" class="text-xs">男性
                    <x-text-input id="female" type="radio" name="sex" :value="0"
                        class=" text-main-color bg-main-hover-color border-explain-color focus:ring-main-color focus:ring-2 "
                        Frequired autofocus autocomplete="sex" />
                </label>
                <label for="female" class="ml-3 text-xs">女性
                    <x-text-input id="female" type="radio" name="sex" :value="1"
                        class=" text-main-color bg-main-hover-color border-explain-color focus:ring-main-color focus:ring-2 "
                        Frequired autofocus autocomplete="sex" />
                </label>
            </div>
        </div>

        <!-- height  -->
        <div class="mt-4">
            <x-input-label for="height" :value="__('Height')" />
            <x-text-input id="height" class="block mt-1 w-full" type="number" min="0"
                pattern="^([1-9]\d*|0)(\.\d+)?$" name="height" :value="old('height')" step="0.1" required autofocus
                autocomplete="height" />
            <x-input-error :messages="$errors->get('height')" class="mt-2" />
        </div>

        <div class="flex flex-col  items-center w-full  mt-12">
            <x-refer-button>
                {{ __('Register') }}
            </x-refer-button>

            <a class="mt-3 text-xs tet-explain-color font-thin hover:opacity-70 hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main-color"
                href="{{ route('login') }}">
                {{ __('Already have an account?') }}
            </a>
        </div>
    </form>
</x-guest-layout>

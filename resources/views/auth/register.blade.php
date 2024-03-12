<x-guest-layout>
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

        <div class="flex justify-start mt-4">
            <!-- age  -->
            <div class="mr-10">
                <x-input-label for="age" :value="__('Age')" />
                <div class="flex">
                    <x-text-input id="age" class="block mt-1 h-9 w-20" type="number"
                        pattern="^([1-9]\d*|0)(\.\d+)?$" min="0" name="age" :value="old('age')" required
                        autofocus autocomplete="age" />
                    <x-text-label class="text-xs ml-1 mt-5">歳</x-text-label>
                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                </div>
            </div>

            <!-- sex  -->
            <div class="">
                <x-input-label :value="__('Sex')" />
                <select name="sex"
                    class="block text-sm mt-1 h-9 w-20 border-gray-300 focus:border-main-color focus:ring-main-color rounded-md shadow-sm">
                    <option value="" class="">選択</option>
                    <option value="0" class="">男性</option>
                    <option value="1" class="">女性</option>
                </select>
            </div>

            <!-- height  -->
            <div class="ml-10">
                <x-input-label for="height" :value="__('Height')" />
                <div class="flex">
                    <x-text-input id="height" class="block mt-1 h-9 w-20" type="number" min="0"
                        pattern="^([1-9]\d*|0)(\.\d+)?$" name="height" :value="old('height')" step="0.1" required
                        autofocus autocomplete="height" />
                        <x-text-label class="text-xs ml-1 mt-5">cm</x-text-label>
                    <x-input-error :messages="$errors->get('height')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="flex flex-col  items-center w-full  mt-9">
            <x-action-button>
                {{ __('Register') }}
            </x-action-button>

            <a class="mt-3 text-xs tet-explain-color font-thin hover:opacity-70 hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main-color"
                href="{{ route('login') }}">
                {{ __('Already have an account?') }}
            </a>
        </div>
    </form>
</x-guest-layout>

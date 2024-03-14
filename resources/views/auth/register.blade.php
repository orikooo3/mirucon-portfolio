<x-guest-layout>
    <div class="flex items-center justify-center mb-3 text-2xl font-semibold text-black-color">
        新規登録
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- ユーザー名 -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- メールアドレス -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- パスワード -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- 確認パスワード -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-start mt-4">
            <!-- 年齢  -->
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

            <!-- 性別  -->
            <div class="">
                <x-input-label :value="__('Sex')" />
                <div class="mt-4 flex">
                    <div class="">
                        <label formale class="text-xs">男性</label>
                        <input id="male" type="radio" value="0" name="sex" class="">
                    </div>
                    <div class=" ">
                        <label for="female" class="text-xs ml-3">女性</label>
                        <input checked id="female" type="radio" value="1" name="sex" class="">
                    </div>
                </div>
            </div>

            <!-- 身長  -->
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

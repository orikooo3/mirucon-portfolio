<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex items-center justify-center mb-6 text-2xl font-semibold text-black-color">
        ログイン
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="mt-7" />
            <x-text-input id="email" class="w-full mt-1" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <div class="flex items-start">
                <div class="flex items-center  mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="text-main-color border-gray-300 rounded shadow-sm focus:ring-main-color"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
            </div>

            <!-- Forgot password? -->
            @if (Route::has('password.request'))
                <a class="text-sm mt-4 text-main-color  rounded-md hover:text-main-color hover:opacity-70 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main-color"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <div class="flex items-center justify-center mt-7">
            <x-submit-button>
                <x-slot name="normal">{{ __('Log in') }}</x-slot>
            </x-submit-button>
        </div>
    </form>
    <!-- Already have an account?-->
    <div class="flex flex-col items-center w-full mt-12">
        <p class="text-xs font-thin mb-3 text-explain-color">アカウントをお持ちではないですか？</p>
        <x-submit-button onclick="location.href='{{ route('register') }}'"><x-slot
                name="normal">新規登録</x-slot></x-submit-button>
    </div>
</x-guest-layout>

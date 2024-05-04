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
                            class="text-sub-color border-gray-300 rounded shadow-sm focus:ring-sub-dark-color"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
            </div>

            <!-- Forgot password? -->
            @if (Route::has('password.request'))
                <a class="text-sm mt-4 text-explain-color  rounded-md hover:text-explain-color hover:opacity-70 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main-color"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <div class="flex justify-center mt-7">
            <x-action-button class="w-32">
                {{ __('Log in') }}
            </x-action-button>
        </div>
    </form>
    <!-- Already have an account?-->
    <div class="flex flex-col items-center mt-7">
        <p class="text-xs font-thin mb-3 text-explain-color">アカウントをお持ちではないですか？</p>
        <x-action-button onclick="location.href='{{ route('register') }}'" class="w-32">
            {{__('New Register')}}
        </x-action-button>
    </div>
</x-guest-layout>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- 年齢 --}}
        <div class="">
            <x-input-label for="name" :value="__('Age')" />
            <x-text-input id="name" name="age" type="number" class="mt-1 block h-9 w-20" :value="old('height', $user->age)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- 性別 --}}
        <div class="">
            <x-input-label :value="__('Sex')" />
            <select name="sex"
                class="block text-sm mt-1 h-9 w-20 border-gray-300 focus:border-main-color focus:ring-main-color rounded-md shadow-sm">
                @if ($user->sex == '0')
                    <option selected :value="old('sex', $user - > sex)" class="">男性</option>
                    <option :value="old('sex', $user - > sex)" class="">女性</option>
                @elseif($user->sex == '1')
                    <option :value="old('sex', $user - > sex)" class="">男性</option>
                    <option selected :value="old('sex', $user - > sex)" class="">女性</option>
                @endif
            </select>
        </div>

        <div>
            <x-input-label for="height" :value="__('Height')" />
            <x-text-input id="height" name="height" type="number" class="mt-1 block h-9 w-20" step="0.1"
                :value="old('height', $user->height)" required autofocus autocomplete="height" />
            <x-input-error class="mt-2" :messages="$errors->get('height')" />
        </div>

        <div class="flex items-center gap-4">
            <x-action-button class="text-xs w-16">{{ __('Save') }}</x-action-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

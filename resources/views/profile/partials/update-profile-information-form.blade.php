<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="row g-3 ">
        @csrf
        @method('patch')

        <div class="col-md-4">
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="col-md-4">
            @php
                $userprofile=\App\Models\User::join("profiles","profiles.userid","=","users.id")->where("users.id",Auth::id())->first();
            @endphp
            <x-input-label for="firstnames" :value="__('First Names')" />
            <x-text-input id="firstnames" name="firstnames" type="text" class="mt-1 block w-full" :value="old('profiles_firstnames', $userprofile->firstnames)" required autofocus autocomplete="firstnames" />
            <x-input-error class="mt-2" :messages="$errors->get('profiles_firstnames')" />
        </div>
        <div class="col-md-4">
            @php
                $userprofile=\App\Models\User::join("profiles","profiles.userid","=","users.id")->where("users.id",Auth::id())->first();
            @endphp
            <x-input-label for="lastname" :value="__('Last Names')" />
            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('profiles_lastname', $userprofile->lastname)" required autofocus autocomplete="lastname" />
            <x-input-error class="mt-2" :messages="$errors->get('profiles_lastname')" />
        </div>

        <div class="col-md-4">
            @php
                $userprofile=\App\Models\User::join("profiles","profiles.userid","=","users.id")->where("users.id",Auth::id())->first();
            @endphp
            <x-input-label for="national_id" :value="__('National ID Number')" />
            <x-text-input id="national_id" name="national_id" type="text" class="mt-1 block w-full" :value="old('profiles_national_id', $userprofile->national_id)" required autofocus autocomplete="national_id" />
            <x-input-error class="mt-2" :messages="$errors->get('profiles_national_id')" />
        </div>
        <div class="col-md-4">
            @php
                $userprofile=\App\Models\User::join("profiles","profiles.userid","=","users.id")->where("users.id",Auth::id())->first();
            @endphp
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('profiles_address', $userprofile->address)" required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('profiles_address')" />
        </div>

        <div class="col-md-4">
            @php
                $userprofile=\App\Models\User::join("profiles","profiles.userid","=","users.id")->where("users.id",Auth::id())->first();
            @endphp
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('profiles_phone_number', $userprofile->phone_number)" required autofocus autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('profiles_phone_number')" />
        </div>

        <div class="col-md-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary w-20">{{ __('Save') }}</button>


            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-bg text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

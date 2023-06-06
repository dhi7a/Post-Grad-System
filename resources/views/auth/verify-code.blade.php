<x-guest-layout>
    {{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Check your phone for the code, Type it below and press verify.') }}
    </div>
    <form action="/verify-code" method="post">
        @csrf
        <div>
            <label for="verification_code">Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" required>
        </div>
        <div>
            <button type="submit">Verify</button>
        </div>
    </form> --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Verify Your Phone Number') }}</h5>
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Check your phone for the code, type it below, and press verify.') }}
            </div>
            <form action="/verify-code" method="post">
                @csrf
                <div class="mb-3">
                    <label for="verification_code" class="form-label">{{ __('Verification Code') }}:</label>
                    <input type="text" id="verification_code" name="verification_code" class="form-control" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">{{ __('Verify') }}</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

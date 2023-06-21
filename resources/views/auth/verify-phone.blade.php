<x-app-layout>
    <!-- resources/views/verify-phone.blade.php -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Phone Number Verification') }}</h5>
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Thanks for signing up! Before getting started, could you verify your phone number by typing it in the text field and pressing the Send Verification button? Check your phone for the code.') }}
            </div>
            <form action="{{ route('verify.phone') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="contact_number" class="form-label">{{ __('Phone Number') }}:</label>
                    <input type="text" id="contact_number" name="contact_number" class="form-control" pattern="\+\d{1,3}\s?\(\d{1,3}\)\s?\d{3}-\d{4}" title="Please enter a phone number in the format +XXX (XXX) XXX-XXXX">
                    @error('contact_number')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">{{ __('Send Verification Code') }}</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>




<x-app-layout>
    <!-- resources/views/verify-phone.blade.php -->

    <form action="{{ route('verify.phone') }}" method="post">
        @csrf
        <div>
            <label for="contact_number">Phone Number:</label>
            <input type="text" id="contact_number" name="contact_number" required>
            @error('contact_number')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">Send Verification Code</button>
        </div>
    </form>

</x-app-layout>

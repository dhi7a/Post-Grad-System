<x-app-layout>
    <form action="/verify-code" method="post">
        @csrf
        <div>
            <label for="verification_code">Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" required>
        </div>
        <div>
            <button type="submit">Verify</button>
        </div>
    </form>
</x-app-layout>

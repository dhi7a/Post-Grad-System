<x-app-layout>
    <form action="{{ route('proposed-field.store') }}" method="POST">
    @csrf

    <!-- Description -->
    <div>
        <label for="description">Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit">Save</button>
    </div>
</form>
</x-app-layout>

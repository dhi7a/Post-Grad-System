<x-app-layout>
    <form action="{{ route('university-studies.store') }}" method="POST">
    @csrf

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <legend>"O" and "A" Level Subjects</legend>
            </div><br>
            <div class="card-body">
                <div class="form-group">
                    <div>
                        <!-- Programme -->
                    <div>
                        <label for="programme">Programme:</label>
                        <input type="text" name="programme" value="{{ old('programme') }}">
                        @error('programme')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Class -->
                    <div>
                        <label for="class">Class:</label>
                        <input type="text" name="class" value="{{ old('class') }}">
                        @error('class')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Institution -->
                    <div>
                        <label for="institution">Institution:</label>
                        <input type="text" name="institution" value="{{ old('institution') }}">
                        @error('institution')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="date">Date:</label>
                        <input type="text" name="date" value="{{ old('date') }}">
                        @error('date')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Application') }}
                                </button>
                            </div>
    </form>
</x-app-layout>


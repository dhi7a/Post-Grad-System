<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="card">
        <div class="card-header">
            <legend>University details</legend>
        </div>
        <br>
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <!-- Programme -->
                    <div class="col-md-6">
                        <label for="programme">Programme:</label>
                        <input type="text" name="programme" value="{{ old('programme') }}" class="form-control" required>
                        @error('programme')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    <!-- Class -->
                    <div class="col-md-6">
                        <label for="class">Class:</label>
                        <input type="text" name="class" value="{{ old('class') }}" class="form-control" required>
                        @error('class')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <br>

            <div class="row">
            <!-- Institution -->
            <div class="col-md-6">
                <label for="institution">Institution:</label>
                <input type="text" name="institution" value="{{ old('institution') }}" class="form-control" required>
                @error('institution')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <br>

            <!-- Date -->
            <div class="col-md-6">
                <label for="date">Date:</label>
                <input type="date" name="date" value="{{ old('date') }}" class="form-control" required>
                @error('date')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <br>
        </div>
    </div>
</div>

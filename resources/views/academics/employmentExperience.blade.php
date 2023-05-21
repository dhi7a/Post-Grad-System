<x-app-layout>
    <form action="{{ route('employment-experience.store') }}" method="POST">
        @csrf

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <legend>Employment Details / Experience</legend>
                </div><br>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <!-- Position -->
                            <div class="col-md-6">
                                <label for="position">Position:</label>
                                <input type="text" name="position" value="{{ old('position') }}" class="form-control">
                                @error('position')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Employer -->
                            <div class="col-md-6">
                                <label for="employer">Employer:</label>
                                <input type="text" name="employer" value="{{ old('employer') }}" class="form-control">
                                @error('employer')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <!-- From -->
                            <div class="col-md-6">
                                <label for="from">From:</label>
                                <input type="text" name="from" value="{{ old('from') }}" class="form-control">
                                @error('from')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- To -->
                            <div class="col-md-6">
                                <label for="to">To:</label>
                                <input type="text" name="to" value="{{ old('to') }}" class="form-control">
                                @error('to')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Application') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>

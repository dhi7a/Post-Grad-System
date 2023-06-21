<x-app-layout>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success')}}
    </div>
    @endif
    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding: 1.5rem; border-radius: 0.5rem;">
        <strong>Step 8 of 11:</strong> This is the eighth step of the application process. Almost there.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <form action="{{ route('employment-experience.store') }}" method="POST">
        @csrf

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <legend style="color: black;">Employment Details / Experience</legend>
                </div><br>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <!-- Position -->
                            <div class="col-md-6">
                                <label for="position">Position:</label>
                                <input type="text" name="position" value="{{ old('position') }}" class="form-control" required>
                                @error('position')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Employer -->
                            <div class="col-md-6">
                                <label for="employer">Employer:</label>
                                <input type="text" name="employer" value="{{ old('employer') }}" class="form-control" required>
                                @error('employer')
                                    <span>{{ $message }}</span>
                                @enderror <br>
                            </div>
                        </div>
                        <div class="row">
                            <!-- From -->
                            <div class="col-md-6">
                                <label for="from">From:</label>
                                <input type="date" name="from" value="{{ old('from') }}" class="form-control" required>
                                @error('from')
                                    <span>{{ $message }}</span>
                                @enderror <br>
                            </div>

                            <!-- To -->
                            <div class="col-md-6">
                                <label for="to">To:</label>
                                <input type="date" name="to" value="{{ old('to') }}" class="form-control" required>
                                @error('to')
                                    <span>{{ $message }}</span>
                                @enderror <br>
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

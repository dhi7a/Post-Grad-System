<x-app-layout>
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding: 1.5rem; border-radius: 0.5rem;">
    <strong>Step 3 of 11:</strong> This is the third step of the application process. You are almost half way there.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

    <form action="{{ route('diploma.store') }}" method="POST">
    @csrf

    <div class="col-md-12">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
        @endif
         <div class="card">
            <div class="card-header">
                 <legend>Diploma Details or Other Qualifications Held</legend>
                 <p>e.g CIS, IMM etc</p>
            </div><br>
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

                     <!-- Result -->
                     <div class="col-md-6">
                        <label for="result">Grade/Class</label>
                            <select name="result" class="form-control" required>
                                <option value="" selected disabled>Select Grade</option>
                                <option value="Distinction">Distinction</option>
                                <option value="Credit">Credit</option>
                                <option value="Pass">Pass</option>
                                <option value="Fail">Fail</option>
                                {{-- <option value="Other">Other</option> --}}
                            </select>
                    </div>
                    </div><br>
                </div>
                <div class="row">
                    <!-- Level -->
                    <div class="col-md-6">
                        <label for="level">Level:</label>
                        <input type="text" name="level" value="{{ old('level') }}" class="form-control" required>
                        @error('level')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date -->
                    <div class="col-md-6">
                        <label for="date">Date:</label>
                        <input type="date" name="date" value="{{ old('date') }}" class="form-control" required>
                        @error('date')
                            <span>{{ $message }}</span>
                        @enderror
                    </div><br>
                </div><br>

                    <!-- Institution -->
                    <div>
                        <label for="institution">Institution:</label>
                        <input type="text" name="institution" value="{{ old('institution') }}" class="form-control" required>
                        @error('institution')
                            <span>{{ $message }}</span>
                        @enderror
                    </div><br>

                </div>
                 <!-- Submit Button -->
                 <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit Application') }}
                        </button>
                    </div>
                </div><br>
        </form>
    </x-app-layout>

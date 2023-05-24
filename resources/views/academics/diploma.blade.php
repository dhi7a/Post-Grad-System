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
    <form action="{{ route('diploma.store') }}" method="POST">
    @csrf

    <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                 <legend>Diploma details or other qualifications held</legend>
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
                    </div><br>

                     <!-- Result -->
                     <div class="col-md-6">
                        <label for="result">Result/Class:</label>
                        <input type="text" name="result" value="{{ old('result') }}" class="form-control" required>
                        @error('result')
                            <span>{{ $message }}</span>
                        @enderror
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
                    </div><br>

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

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
    <form action="{{ route('university-studies.store') }}" method="POST">
        @csrf

        {{-- <div class="col-md-12"> --}}
            {{-- <div class="card">
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
            </div> --}}
            @livewire('degrees-component')


                <!-- Submit Button -->
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit Application') }}
                        </button>
                    </div>
                </div><br>
        </div>
    </form>
</x-app-layout>

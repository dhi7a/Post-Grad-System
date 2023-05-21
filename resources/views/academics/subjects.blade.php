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
    <form action="{{ route('subjects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <legend>"O" and "A" Level Subjects</legend>
            </div><br>
            <div class="card-body">
                <div class="form-group">
                    <div>
                        <!-- Subject -->
                        <div>
                            <label for="subject">Subject:</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control">
                            @error('subject')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Grade -->
                        <div>
                            <label for="grade">Grade:</label>
                            <input type="text" name="grade" value="{{ old('grade') }}" class="form-control">
                            @error('grade')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Exam Board -->
                        <div>
                            <label for="exam_board">Exam Board:</label>
                            <input type="text" name="exam_board" value="{{ old('exam_board') }}" class="form-control">
                            @error('exam_board')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Date -->
                        <div>
                            <label for="date">Date:</label>
                            <input type="text" name="date" value="{{ old('date') }}" class="form-control">
                            @error('date')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Level -->
                        <div>
                            <label for="level">Level:</label>
                            <input type="text" name="level" value="{{ old('level') }}" class="form-control">
                            @error('level')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                                        </div>
                                    </div><br>
    <!-- User ID -->
    {{-- <div>
        <label for="userid">User ID:</label>
        <input type="text" name="userid" value="{{ auth()->user()->id }}" readonly>
    </div> --}}

    <!-- Submit Button -->
    <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit Application') }}
                </button>
            </div>
    </form>
</x-app-layout>

<div>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success')}}
    </div>
    @endif
    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding: 1.5rem; border-radius: 0.5rem;">
        <strong>Step 2 of 11:</strong> This is the second step of the application process.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <form action="{{ route('subjects.store') }}" method="POST" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="card">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('Success')}}
                    </div>
                @endif

                <div class="card-header">
                    <legend>School Examinations For Which Reults Are known {{$count}}</legend>
                    <p>Indicate 'O' Level Mathematics And English Subjects Only, Then 'A' Level Subjects</p>
                </div><br>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                                <!-- Exam Board -->
                                <div class="col-md-6">
                                    <label for="exam_board">Exam Board: eg, ZIMSEC,CAMBRIDGE</label>
                                    <input type="text" wire:model="exam_board" value="{{ old('exam_board') }}" class="form-control" required>
                                    @error('exam_board')
                                        <span>{{ $message }}</span>
                                    @enderror <br>
                                </div>
                                <div class="col-md-2">
                                    <label for="level">A or O</label>
                                        <select wire:model="level" class="form-control" required>
                                            <option value="" selected disabled>Select level</option>
                                            <option value="A level">A level</option>
                                            <option value="O level">O level</option>
                                            <option value="Other">Other</option>
                                        </select>

                                        @error('level')
                                            <span>{{ $message }}</span>
                                        @enderror <br>
                                </div>
                                <div class="col-md-4">
                                    <label for="level">Specify other:eg, Matric</label>
                                    <input type="text" wire:model="other" class="form-control">
                                </div>
                        </div>
                        <div class="row">

                            <!-- Subject -->
                            <div class="col-md-6">
                                <label for="subject">Subject:</label>
                                <input type="text" wire:model="newSubject" value="{{ old('subject') }}" class="form-control" required>
                                @error('subject')
                                    <span>{{ $message }}</span>
                                @enderror <br>
                            </div>

                            <!-- Grade -->
                            <div class="col-md-6">
                             {{--    <label for="grade">Grade:</label>
                                <input type="text" wire:model="grade" value="{{ old('grade') }}" class="form-control" required>
                                @error('grade')
                                    <span>{{ $message }}</span>
                                @enderror <br>
                            </div> --}}

                            <label for="level">Grade/Class</label>
                            <select wire:model="grade" class="form-control" required>
                                <option value="" selected disabled>Select Grade</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                {{-- <option value="F">F</option>
                                <option value="O">O</option>
                                <option value="U">U</option> --}}
                                {{-- <option value="Other">Other</option> --}}
                            </select>
                        </div>

                            <!-- Date -->
                            <div class="col-md-6">
                                <label for="date">Date:</label>
                                <input type="date" wire:model="date" value="{{ old('date') }}" class="form-control" required>
                                @error('date')
                                    <span>{{ $message }}</span>
                                @enderror  <br>
                            </div>
                        </div>
                    </div>
                </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" wire:click.submit="addSubject" class="btn btn-primary">
                                    {{ __('Submit Application') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

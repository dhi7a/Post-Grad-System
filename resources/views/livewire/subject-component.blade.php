<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <legend>"O" and "A" Level Subjects</legend>
            </div><br>
            <div class="card-body">
                <div class="form-group">
                    <div>
                        <div class="form-group">
                            <label for="level">Level:</label>
                            <select name="level" class="form-control" required>
                                <option value="">Select Level</option>
                                <option value="A"{{ old('level') == 'A' ? ' selected' : '' }}>A Level</option>
                                <option value="O"{{ old('level') == 'O' ? ' selected' : '' }}>O Level</option>
                            </select>
                    
                            @error('level')
                                <span>{{ $message }}</span>
                            @enderror <br>
                        </div>
                        <!-- Subject -->
                        <div>
                            <label for="subject">Subject:</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" required>
                            @error('subject')
                                <span>{{ $message }}</span>
                            @enderror <br>
                        </div>

                        <!-- Grade -->
                        <div>
                            <label for="grade">Grade:</label>
                            <input type="text" name="grade" value="{{ old('grade') }}" class="form-control" required>
                            @error('grade')
                                <span>{{ $message }}</span>
                            @enderror <br>
                        </div>

                        <!-- Exam Board -->
                        <div>
                            <label for="exam_board">Exam Board:</label>
                            <input type="text" name="exam_board" value="{{ old('exam_board') }}" class="form-control" required>
                            @error('exam_board')
                                <span>{{ $message }}</span>
                            @enderror <br>
                        </div>

                        <!-- Date -->
                        <div>
                            <label for="date">Date:</label>
                            <input type="date" name="date" value="{{ old('date') }}" class="form-control" required>
                            @error('date')
                                <span>{{ $message }}</span>
                            @enderror <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

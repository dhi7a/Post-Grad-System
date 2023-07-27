<div>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success')}}
    </div>
    @endif
    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding: 1.5rem; border-radius: 0.5rem;">
        <strong>Step 4 of 11:</strong> This is the fourth step in your application process.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <form action="{{ route('university-studies.store') }}" method="POST" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <legend style="color: black;"> {{$label}} </legend>
                    <p style="color: black;">Degrees indicated: <b>{{$count}}</b></p>
                </div>
                <br>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <!-- Programme -->
                            <div class="col-md-6">
                                <label for="programme">Degree Programme:</label>
                                <input type="text" wire:model="programme" value="{{ old('programme') }}" class="form-control" required>
                                @error('programme')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Class -->
                            <div class="col-md-6">
                                <label for="level">Degree class:</label>
                                <select wire:model="class" class="form-control" required>
                                    <option value="" selected>Select Grade</option>
                                    <option value="1">1</option>
                                    <option value="2.1">2.1</option>
                                    <option value="2.2">2.2</option>
                                    <option value="3">3</option>
                                    <option value="n/a">n/a</option>
                                </select>
                                @error('level')
                                    <span>{{ $message }}</span>
                                @enderror <br>
                            </div>

                        <br>
                    <div class="row">
                    <!-- Institution -->
                    <div class="col-md-6">
                        <label for="institution">Institution:</label>
                        <input type="text" wire:model="institution" value="{{ old('institution') }}" class="form-control" required>
                        @error('institution')
                            <span>{{ $message }}</span>
                        @enderror <br>
                    </div> <br>


                    <!-- Date -->
                    {{-- <div class="col-md-6">
                        <label for="date">Date Of Award:</label>
                        <input type="date" wire:model="date" value="{{ old('date') }}" class="form-control" required>
                        @error('date')
                            <span>{{ $message }}</span>
                        @enderror <br>
                    </div>
                    <br> --}}
                    <!-- Date -->
                  <!-- Date -->
                <div class="col-md-6">
                    <label for="date">Year Of Award:</label>
                    <select wire:model="date" class="form-control" required>
                        <option value="">Select Year</option>
                        <!-- Assuming you want to show years from 1950 to the current year -->
                        @php
                        $currentYear = date('Y');
                        @endphp
                        @for ($year = $currentYear; $year >= 1950; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                    @error('date')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                      <br>


                </div>
            </div>
        </div>
    </form>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="button" wire:click.submit="addDegree" class="btn btn-primary">
                {{ __('Next') }}
            </button>
        </div>
        @if ($count == 2)
            <a href="{{ route('research-experience.index') }}" class="btn btn-secondary">Skip</a>
        @endif
    </div>
</div>

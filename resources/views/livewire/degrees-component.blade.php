<div>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success')}}
    </div>
    @endif

    <form action="{{ route('university-studies.store') }}" method="POST" enctype="multipart/form-data">
        <div class="col-md-12">
            {{-- Success is as dangerous as failure. --}}
            <div class="card">
                <div class="card-header">
                    <legend>({{$count}}) {{$label}} </legend>
                </div>
                <br>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <!-- Programme -->
                            <div class="col-md-6">
                                <label for="programme">Programme:</label>
                                <input type="text" wire:model="programme" value="{{ old('programme') }}" class="form-control" required>
                                @error('programme')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <!-- Class -->
                            <div class="col-md-6">
                                <label for="class">Class:</label>
                                <input type="number" wire:model="class" value="{{ old('class') }}" class="form-control" required>
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
                        <input type="text" wire:model="institution" value="{{ old('institution') }}" class="form-control" required>
                        @error('institution')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    <!-- Date -->
                    <div class="col-md-6">
                        <label for="date">Date:</label>
                        <input type="date" wire:model="date" value="{{ old('date') }}" class="form-control" required>
                        @error('date')
                            <span>{{ $message }}</span>
                        @enderror <br>
                    </div>
                    <br>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" wire:click.submit="addDegree" class="btn btn-primary">
                                {{ __('Submit Application') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

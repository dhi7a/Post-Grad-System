<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding: 1.5rem; border-radius: 0.5rem;">
        <strong>Step 10 of 11:</strong> This is the tenth step of the application process. The last stretch.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <form wire:submit.prevent="addReferee">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <legend style="color: black;">({{$count}}) Referees</legend>
                    <p style="color: black;">Give names and addresses of two persons, atleast one from your previous University,
                         who are familiar with your academic ability perfomance. </p>
                </div><br>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label for="full_name">Full Name:</label>
                                <input type="text" wire:model="full_name" value="{{ old('full_name') }}" class="form-control" required>
                                @error('full_name')
                                    <span>{{ $message }}</span>
                                @enderror <br>
                            </div>
                            <!-- Address -->
                            <div class="col-md-6">
                                <label for="address">Address:</label>
                                <input type="text" wire:model="address" value="{{ old('address') }}" class="form-control" required>
                                @error('address')
                                    <span>{{ $message }}</span>
                                @enderror <br>
                            </div><br>
                        </div>
                        <div class="row">
                            <!-- Phone -->
                            <div class="col-md-6">
                                <label for="phone">Phone:</label>
                                <input type="text" wire:model="phone" value="{{ old('phone') }}" class="form-control" required>
                                @error('phone')
                                    <span>{{ $message }}</span>
                                @enderror <br>
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email">Email:</label>
                                <input type="email" wire:model="email" value="{{ old('email') }}" class="form-control" required>
                                @error('email')
                                    <span>{{ $message }}</span>
                                @enderror <br>
                            </div>
                        </div>
                        <!-- Occupation -->
                        <div>
                            <label for="occupation">Occupation:</label>
                            <input type="text" wire:model="occupation" value="{{ old('occupation') }}" class="form-control" required>
                            @error('occupation')
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
    </form>
</div>

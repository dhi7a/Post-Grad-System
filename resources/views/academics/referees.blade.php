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
<form action="{{ route('referees.store') }}" method="POST">
    @csrf

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <legend>Referees</legend>
            </div><br>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                   <!-- Full Name -->
                        <div class="col-md-6">
                            <label for="full_name">Full Name:</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" required>
                            @error('full_name')
                                <span>{{ $message }}</span>
                            @enderror <br>
                        </div><br>
                    <!-- Address -->
                        <div class="col-md-6">
                            <label for="address">Address:</label>
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control" required>
                            @error('address')
                                <span>{{ $message }}</span>
                            @enderror <br>
                        </div><br>
                    </div>
                    <div class="row">
                    <!-- Phone -->
                         <div class="col-md-6">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" required>
                            @error('phone')
                                <span>{{ $message }}</span>
                            @enderror <br>
                        </div><br>
                    <!-- Email -->
                        <div class="col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror <br>
                        </div>
                    </div>
                    <!-- Occupation -->
                        <div>
                            <label for="occupation">Occupation:</label>
                            <input type="text" name="occupation" value="{{ old('occupation') }}" class="form-control" required>
                            @error('occupation')
                                <span>{{ $message }}</span>
                            @enderror <br>
                        </div>
                    <!-- Submit Button -->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit Application') }}
                            </button>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div><br>
</x-app-layout>

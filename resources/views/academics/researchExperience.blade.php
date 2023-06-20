<x-app-layout>
    <div>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success')}}
    </div>
    @endif
    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding: 1.5rem; border-radius: 0.5rem;">
        <strong>Step 6 of 11:</strong> This is the sixth step of the application process.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <form action="{{ route('research-experience.store') }}" method="POST">
    @csrf

    <div class="col-md-12">
        <div class="card">
           <div class="card-header">
                <legend>Research Experience</legend>
           </div><br>
           <div class="card-body">
               <div class="form-group">
                   <div class="row">
                    <!-- Description -->
                    <div>
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <span>{{ $message }}</span>
                        @enderror <br>
                    </div><br>

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
</x-app-layout>

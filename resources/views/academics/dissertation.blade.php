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
<form action="{{ route('dissertation.store') }}" method="POST">
    @csrf

    <div class="col-md-12">
        <div class="card">
           <div class="card-header">
                <legend>Dissertation Details</legend>
           </div><br>
           <div class="card-body">
               <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description">{{ old('description') }}</textarea>
                @error('description')
                    <span>{{ $message }}</span>
                @enderror
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
</x-app-layout>
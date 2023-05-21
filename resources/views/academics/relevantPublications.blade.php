<x-app-layout>
<form action="{{ route('publications.store') }}" method="POST">
    @csrf


    <div class="col-md-12">
        <div class="card">
           <div class="card-header">
                <legend>Publications</legend>
           </div><br>
           <div class="card-body">
               <div class="form-group">

                   <div class="row">
                    <!-- Description -->
                            <div>
                                <label for="description">Description:</label>
                                <textarea type="text" name="description" value="{{ old('description') }}" class="form-control" cols="md-4"></textarea>
                                @error('description')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                   </div><br>

                    <!-- Submit Button -->
                 <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit Application') }}
                        </button>
                    </div>
                </div>

</x-app-layout>

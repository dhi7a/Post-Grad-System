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
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success')}}
    </div>
    @endif
    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding: 1.5rem; border-radius: 0.5rem;">
        <strong>Step 9 of 11:</strong> This is the ninth step of the application process.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <form action="{{ route('dissertation.store') }}" method="POST">
        @csrf


        <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                    <legend style="color: black;">Dissertation/Thesis Topic</legend>
                    {{-- <p>(Dissertation/Thesis topic)</p> --}}
               </div><br>
               <div class="card-body">
                   <div class="form-group">

                       <div class="row">
                        <!-- Description -->
                                <div>
                                    <label for="description">Description:</label>
                                    <textarea type="text" name="description" value="{{ old('description') }}" class="form-control" cols="md-4" required></textarea>
                                    @error('description')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                       </div><br>

                        <!-- Submit Button -->
                     <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Next') }}                            </button>
                        </div>
                    </div>

    </x-app-layout>

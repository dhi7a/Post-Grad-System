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
    <form action="{{ route('subjects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

   @livewire('subject-component')
                        

    <!-- Submit Button -->
    <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit Application') }}
                </button>
            </div>
    </form>
</x-app-layout>


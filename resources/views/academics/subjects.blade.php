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

    </form>
</x-app-layout>

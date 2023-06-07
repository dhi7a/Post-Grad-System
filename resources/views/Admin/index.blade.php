
<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="margin-left: 20px;">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="welcome-message">Welcome, {{ Auth::user()->name }}!</p>
                    </div>
                        <div class="card">
                            @foreach ($applications as $application)
                                {{-- {{dd($application)}} --}}
                                {{$application->id}} {{$application->forenames}} {{$application->surname}} {{$application->description}} <br>


                            @endforeach

                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

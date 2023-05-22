<x-app-layout>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Welcome, {{ Auth::user()->name }}!</p>

                        <div>
                            <p>To <b>start</b> your <b>APPLICATION PROCESS</b>, please fill in your details by pressing the button below</p>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                            <a class="btn btn-success btn-lg" data-toggle="button" href="http://127.0.0.1:8000/applications/create" role="button">START</a>
                             </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

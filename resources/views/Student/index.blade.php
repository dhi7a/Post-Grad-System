<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><b>{{ __('Student Dashboard') }}</b></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Welcome, {{ Auth::user()->name }}!</p>

                        <div>
                            <p>To <b>start</b> your <b>APPLICATION PROCESS</b>, please fill in your details by pressing the START below.
                            When you have completed the steps that follow, your application will be done.</p>
                        </div>
                        <div class="row">
                            <b style="color:red">IMPORTANT NOTICE</b>
                        </div>
                        <div>
                            <p align="justify">Applicants must complete all sections of the application form carefully and legibly.
                               If the University discovers that any information submitted by the applicant is false,
                                the University will reject that application and may refer the matter for legal action.
                            </p>

                            {{-- <p align="justify"> b.
                             </p> --}}
                        </div>
                        <div class="alert alert-info" role="alert" style="margin-top: 20px;" align >
                            <b>You are about to fill in your details in 11 steps. These steps include entering your personal details, education background,
                                research as well as work experience, what you want to study and submission of certificates among other things. Take your time
                                to fill in all your details, correctly to boost the success of your application.
                            </b>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <a class="btn btn-primary btn-lg" data-toggle="button" href="http://127.0.0.1:8000/applications/create" role="button">START</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

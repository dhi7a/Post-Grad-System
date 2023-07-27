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
        <strong>Step 11 of 11:</strong> This is the final step in your application process. Upload your Identification documents, certificate and dissertation proposal.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                       <legend> <div class="card-header" style="color: black;">{{ __('Personal Documents') }}</div></legend>

                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                @foreach($errors->all() as $err)
                                    <div class="alert alert-danger">
                                        {{ $err }}
                                    </div>
                                @endforeach
                            @endif
                            <br>
                            <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                                @csrf

                               <!-- Identity Documents -->
                                <div class="form-group row">
                                    <label for="id_documents" class="col-md-4 col-form-label text-md-right">{{ __('Identity Documents') }}</label>
                                    <div class="col-md-6">
                                        <input id="id_documents" type="file" class="form-control @error('id_documents') is-invalid @enderror" name="id_documents" required>
                                        @error('id_documents')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                </div>

                                <!-- Certificates -->
                                <div class="form-group row">
                                    <label for="certificates" class="col-md-4 col-form-label text-md-right">{{ __('Certificates') }}</label>
                                    <div class="col-md-6">
                                        <input id="certificates" type="file" class="form-control @error('certificates') is-invalid @enderror" name="certificates" required>
                                        @error('certificates')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                </div>

                                <!-- Dissertation Proposal -->
                                <div class="form-group row">
                                    <label for="proposal" class="col-md-4 col-form-label text-md-right">{{ __('Dissertation Proposal/Concept Note') }}</label>
                                    <div class="col-md-6">
                                        <input id="proposal" type="file" class="form-control @error('proposal') is-invalid @enderror" name="dissertation_proposal" required>
                                        @error('proposal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                </div>


                                <!-- Submit Button -->
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Finish Application') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

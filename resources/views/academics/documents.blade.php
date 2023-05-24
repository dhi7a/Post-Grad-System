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
    
        <div class="container" style="margin-left: 70px">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Personal Documents') }}</div>
    
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
                                        @enderror <br>
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
                                        @enderror <br>
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
                                        @enderror <br>
                                    </div>
                                </div>
    
                                <!-- Submit Button -->
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
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
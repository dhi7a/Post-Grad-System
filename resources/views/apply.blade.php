<x-app-layout>

@section('content')
    <div class="container" style="margin-left:70px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ph.D. Enrollment Application') }}</div>

                    <div class="card-body">
                    @if(session('success'))
                         <div class="alert alert-success">
                         {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        @foreach($errors->all() as $err)
                            {{$err}}
                        @endforeach
                    @endif



                        <form method="POST" action="{{ route('apply.submit') }}" enctype="multipart/form-data">
                            @csrf <br>

                            <div class="form-group row" >
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><br>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><br>

                            <div class="form-group row">
                                <label for="research_interests" class="col-md-4 col-form-label text-md-right">{{ __('Research Interests') }}</label>

                                <div class="col-md-6">
                                    <textarea id="research_interests" class="form-control @error('research_interests') is-invalid @enderror" name="research_interests" required>{{ old('research_interests') }}</textarea>

                                    @error('research_interests')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><br>

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
                        </div>
                    </div><br>

                            <!-- Applicationn Form -->
                    <div class="form-group row">
                        <label for="id_documents" class="col-md-4 col-form-label text-md-right">{{ __('Identity Documents') }}</label>

                        <div class="col-md-6">
                            <input id="id_documents" type="file" class="form-control @error('id_documents') is-invalid @enderror" name="id_documents" required>

                            @error('id_documents')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div><br>



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
                        </div>
                    </div><br>

                    <!-- Dissertation Proposal -->
                    <div class="form-group row">
                        <label for="proposal" class="col-md-4 col-form-label text-md-right">{{ __('Dissertation Proposal') }}</label>

                        <div class="col-md-6">
                            <input id="proposal" type="file" class="form-control @error('proposal') is-invalid @enderror" name="dissertation_proposal" required>

                            @error('proposal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div><br>

                    <!-- Intake -->
                    <div class="form-group row">
                        <label for="intake" class="col-md-4 col-form-label text-md-right">{{ __('Intake') }}</label>

                        <div class="col-md-6">
                            <select id="intake" class="form-control @error('intake') is-invalid @enderror" name="intake" required>
                                <option value="" disabled selected>Select intake period</option>
                                @foreach(\App\Models\Intake::all() as $intake)
                                    <option value="{{$intake->id}}">{{$intake->description}}</option>
                                @endforeach
                            </select>

                            @error('intake')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div><br>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit Application') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>

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
    <form class="row g-3" method="POST" action="{{ route('personal-details.store') }}" enctype="multipart/form-data">
         @csrf
            <br>
        <fieldset>
            <div class="section">
                <div class="row">
                    <div class="col-md-12">
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">

                        <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding: 1.5rem; border-radius: 0.5rem;">
                            <strong>Step 1 of 11:</strong> This is the first step of the application process.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <legend>Programme Details</legend>
                            </div><br>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="programme">Programme:</label>
                                    <input type="text" id="programme" name="programme" class="form-control" style="color:black" required>
                                </div><br>
                                <div class="form-group">
                                    <label for="degree">Degree:</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="mphil" name="degree[]" value="MPhil" required>
                                        <label class="form-check-label" for="mphil">MPhil</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="dphil" name="degree[]" value="DPhil" required>
                                        <label class="form-check-label" for="dphil">DPhil</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="DoctoralFellow" name="degree[]" value="DoctoralFellow" required>
                                        <label class="form-check-label" for="DoctoralFellow">Post Doctoral Fellow</label>
                                    </div>
                                </div><br>

                                {{-- <div class="form-group">
                                    <label for="employment">Atte:</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="full-time" name="employment" value="Full-time" required>
                                        <label class="form-check-label" for="full-time">Full-time</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="part-time" name="employment" value="Part-time" required>
                                        <label class="form-check-label" for="part-time">Part-time</label>
                                    </div>
                                </div><br> --}}

                            </div>

                            <div class="card-footer">
                                <b>Make sure all sections are completed</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <legend>Personal Details</legend>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label for="title">Title:</label>
                                    <select name="title" id="title">
                                        <option value="MR">MR</option>
                                        <option value="MRS">MRS</option>
                                        <option value="MS">MS</option>
                                        <option value="DR">DR</option>
                                        <option value="MISS">MISS</option>
                                        <option value="REV">REV</option>
                                        <option value="SR">SR</option>
                                    </select>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="surname">Surname:</label>
                                        <input type="text" name="surname" id="surname" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="forenames">Forenames:</label>
                                        <input type="text" name="forenames" id="forenames" class="form-control">
                                    </div><br>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="national_id">National ID No: <i>eg 00-0000000-A-00</i></label>
                                        <input type="text" name="national_id" id="national_id" class="form-control" pattern="\d{2}-\d{7}-[A-Za-z]-\d{2}" title="Please enter a National ID in the format 00-0000000-A-00">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="passport_no">Passport No: <i>Indiicate none to skip</i></label>
                                        <input type="text" name="passport_no" id="passport_no" class="form-control">
                                    </div><br>

                                </div><br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="permanent_residence">Country of Permanent Residence:</label>
                                        <input type="text" name="permanent_residence" id="permanent_residence" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="nationality">Nationality:</label>
                                        <input type="text" name="nationality" id="nationality" class="form-control">
                                    </div><br>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="date_of_birth">Date of Birth:</label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" max="{{ date('Y-m-d', strtotime('-21 years')) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="place_of_birth">Place of Birth: <i>eg Harare,Zimbabwe</i></label>
                                        <input type="text" name="place_of_birth" id="place_of_birth" class="form-control">
                                    </div><br>
                                </div><br>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-4">Gender:</label>
                                        <div class="col-sm-4">
                                            <select id="gender" @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="marital_status">Marital Status:</label>
                                        <input type="text" name="marital_status" id="marital_status" class="form-control">
                                    </div><br>
                            </div>

                                <div class="row">
                                    <div>
                                        <label for="disabilities">Disabilities (if any):</label>
                                        <textarea name="disabilities" id="disabilities" class="form-control"></textarea>
                                    </div><br>
                                    </div>
                                </div><br>
                            <div class="card-footer">
                                <b>Make sure all sections are completed</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <legend>Contact Details</legend>
                    </div><br>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_number">Contact Number: <i>eg +263 012 3456789</i></label>
                                    <input type="text" name="contact_number" id="contact_number" class="form-control" pattern="\+\d{1,3}\s?\d{1,3}\s?\d{7}" title="Please enter a phone number in the format +XXX XXX XXXXXXX" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="home_phone">Home Telephone: <i>eg +263 012 3456789</i></label>
                                    <input type="text" name="home_phone" id="home_phone" class="form-control" pattern="\+\d{1,3}\s?\d{1,3}\s?\d{7}" title="Please enter a phone number in the format +XXX (XXX) XXXXXXX">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fax">Fax:</label>
                                    <input type="text" name="fax" id="fax" class="form-control">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contact_address">Contact Address:</label>
                                    <textarea name="contact_address" id="contact_address" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <b style="color:black">All correspondence will be forwarded to the above address</b>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <legend>Prospective Sponsors</legend>
                        <p>(e.g. self, parent, guardian or name of organization)</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prospective_sponsors">Prospective Sponsors:</label>
                                    <textarea name="prospective_sponsors" id="prospective_sponsors" class="form-control"></textarea>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="msu_staff_dependant">Are you an MSU Staff Dependant?</label>
                                    <div>
                                        <input type="radio" name="msu_staff_dependant" id="msu_staff_dependant_true" >
                                        <label for="msu_staff_dependant_true">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="msu_staff_dependant" id="msu_staff_dependant_false" >
                                        <label for="msu_staff_dependant_false">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="msu_staff_member">Are you an MSU Staff Member?</label>
                                    <div>
                                        <input type="radio" name="msu_staff_member" id="msu_staff_member_true" >
                                        <label for="msu_staff_member_true">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="msu_staff_member" id="msu_staff_member_false" >
                                        <label for="msu_staff_member_false">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Next') }}
                            </button>
                        </div>
                    </div>
  </form>
</x-app-layout>

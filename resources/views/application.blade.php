<x-app-layout>
    <form class="row g-3" method="POST" action="{{ route('apply.submit') }}" enctype="multipart/form-data">
        @csrf <br>
    <fieldset>
        <div class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <legend>Programme Details</legend>
                        </div><br>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="programme">Programme:</label>
                                <input type="text" id="programme" name="programme" class="form-control" required>
                            </div><br>
                            <div class="form-group">
                                <label for="degree">Degree:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="masters" name="degree[]" value="Masters" required>
                                    <label class="form-check-label" for="masters">Masters</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="mphil" name="degree[]" value="MPhil" required>
                                    <label class="form-check-label" for="mphil">MPhil</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="dphil" name="degree[]" value="DPhil" required>
                                    <label class="form-check-label" for="dphil">DPhil</label>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="employment">Employment:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="full-time" name="employment" value="Full-time" required>
                                    <label class="form-check-label" for="full-time">Full-time</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="part-time" name="employment" value="Part-time" required>
                                    <label class="form-check-label" for="part-time">Part-time</label>
                                </div>
                            </div><br>

                        </div>

                        <div class="card-footer">
                            footer
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
                                    <input type="text" name="surname" id="surname">
                                </div><br>

                                <div class="col-md-6">
                                    <label for="forenames">Forenames:</label>
                                    <input type="text" name="forenames" id="forenames">
                                </div><br>
                            </div><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="national_id">National ID No:</label>
                                    <input type="text" name="national_id" id="national_id">
                                </div><br>

                                <div class="col-md-6">
                                    <label for="passport_no">Passport No:</label>
                                    <input type="text" name="passport_no" id="passport_no">
                                </div><br>

                            </div><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="permanent_residence">Country of Permanent Residence:</label>
                                    <input type="text" name="permanent_residence" id="permanent_residence">
                                </div><br>

                                <div class="col-md-6">
                                    <label for="nationality">Nationality:</label>
                                    <input type="text" name="nationality" id="nationality">
                                </div><br>
                            </div><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date_of_birth">Date of Birth:</label>
                                    <input type="date" name="date_of_birth" id="date_of_birth">
                                </div><br>

                                <div class="col-md-6">
                                    <label for="place_of_birth">Place of Birth:</label>
                                    <input type="text" name="place_of_birth" id="place_of_birth">
                                </div><br>
                            </div><br>


                            <div class="row" style="align-items: center">
                                <div class="col-md-6">
                                    <label for="marital_status">Marital Status:</label>
                                        <input type="text" name="marital_status" id="marital_status">
                                </div><br>

                                <div class="col-md-6">
                                    <label for="gender">Gender:</label>
                                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><br>
                            </div><br>








                            <div class="row">
                                <div>
                                    <label for="disabilities">Disabilities (if any):</label>
                                    <textarea name="disabilities" id="disabilities" rows="4" cols="49"></textarea>
                                </div><br>
                                </div>
                            </div><br>
                        <div class="card-footer">
                            footer
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <legend>Programme Details</legend>
        <div class="form-group">
            <label for="programme">Programme:</label>
            <input type="text" id="programme" name="programme" class="form-control" required>
        </div><br>

        <div class="form-group">
            <label for="degree">Degree:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="masters" name="degree[]" value="Masters" required>
                <label class="form-check-label" for="masters">Masters</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="mphil" name="degree[]" value="MPhil" required>
                <label class="form-check-label" for="mphil">MPhil</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="dphil" name="degree[]" value="DPhil" required>
                <label class="form-check-label" for="dphil">DPhil</label>
            </div>
        </div><br>

        <div class="form-group">
            <label for="employment">Employment:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="full-time" name="employment" value="Full-time" required>
                <label class="form-check-label" for="full-time">Full-time</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="part-time" name="employment" value="Part-time" required>
                <label class="form-check-label" for="part-time">Part-time</label>
            </div>
        </div><br>

        <legend>Personal Details</legend>
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

        <div class="col-md-6">
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname">
        </div><br>

        <div class="col-md-6">
            <label for="forenames">Forenames:</label>
            <input type="text" name="forenames" id="forenames">
        </div><br>

        <div>
            <label for="marital_status">Marital Status:</label>
            <input type="text" name="marital_status" id="marital_status">
        </div><br>

        <div>
            <label for="nationality">Nationality:</label>
            <input type="text" name="nationality" id="nationality">
        </div><br>

        <div>
            <label for="national_id">National ID No.:</label>
            <input type="text" name="national_id" id="national_id">
        </div><br>

        <div>
            <label for="permanent_residence">Country of Permanent Residence:</label>
            <input type="text" name="permanent_residence" id="permanent_residence">
        </div><br>

        <div>
            <label for="passport_no">Passport No.:</label>
            <input type="text" name="passport_no" id="passport_no">
        </div><br>

        <div>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" id="date_of_birth">
        </div><br>

        <div>
            <label for="place_of_birth">Place of Birth:</label>
            <input type="text" name="place_of_birth" id="place_of_birth">
        </div><br>

        <div>
            <label for="disabilities">Disabilities (if any):</label>
            <textarea name="disabilities" id="disabilities" rows="4"></textarea>
        </div><br>


        <legend>Personal Details</legend>
        <div>
            <label for="contact_address">Contact Address:</label>
            <textarea name="contact_address" id="contact_address" ></textarea>
        </div><br>

        <div>
            <label for="home_phone">Home Telephone:</label>
            <input type="text" name="home_phone" id="home_phone">
        </div><br>

        <div>
            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number" id="contact_number">
        </div><br>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div><br>

        <div>
            <label for="fax">Fax:</label>
            <input type="text" name="fax" id="fax">
        </div><br>

        <div>
            <label for="correspondence_address">Correspondence Address:</label>
            <input type="checkbox" name="correspondence_address_same" id="correspondence_address_same" value="1">
            <label for="correspondence_address_same">Same as Contact Address</label>
        </div><br>

        <div>
            <label for="prospective_sponsors">Prospective Sponsors:</label>
            <input type="text" name="prospective_sponsors" id="prospective_sponsors">
        </div><br>

        <div>
            <label for="msu_staff_dependant">Are you an MSU Staff Dependant?</label>
            <div>
                <input type="radio" name="msu_staff_dependant" id="msu_staff_dependant_yes" value="yes">
                <label for="msu_staff_dependant_yes">Yes</label>
            </div>
            <div>
                <input type="radio" name="msu_staff_dependant" id="msu_staff_dependant_no" value="no">
                <label for="msu_staff_dependant_no">No</label>
            </div>
        </div><br>

        <div>
            <label for="msu_staff_member">Are you an MSU Staff Member?</label>
            <div>
                <input type="radio" name="msu_staff_member" id="msu_staff_member_yes" value="yes">
                <label for="msu_staff_member_yes">Yes</label>
            </div>
            <div>
                <input type="radio" name="msu_staff_member" id="msu_staff_member_no" value="no">
                <label for="msu_staff_member_no">No</label>
            </div>
        </div><br>











      {{-- <legend>Personal Details</legend>
      <!-- Surname -->
      <div class="form-group row">
        <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>
      <div class="col-md-6">
        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
        @error('surname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <!-- Forenames -->
      <div class="form-group row">
        <label for="forenames" class="col-md-4 col-form-label text-md-right">{{ __('Forenames') }}</label>
        <div class="col-md-6">
          <input id="forenames" type="text" class="form-control @error('forenames') is-invalid @enderror" name="forenames" value="{{ old('forenames') }}" required autocomplete="forenames" autofocus>
          @error('forenames')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
       </div>

      <!-- Marital Status -->
      <div class="form-group row">
        <!-- label and input code here -->
        <div class="form-group row">
            <label for="marital_status" class="col-md-4 col-form-label text-md-right">{{ __('Marital Status') }}</label>
            <div class="col-md-6">
              <input id="marital_status" type="text" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" value="{{ old('marital_status') }}" required autocomplete="marital_status" autofocus>
              @error('marital_status')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
      </div>

      <!-- Nationality -->
      <div class="form-group row">
        <!-- label and input code here -->
        <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>
      <div class="col-md-6">
        <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}" required autocomplete="nationality" autofocus>
        @error('nationality')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      </div>

      <!-- National ID -->
      <div class="form-group row">
        <!-- label and input code here -->
        <label for="national_id" class="col-md-4 col-form-label text-md-right">{{ __('National ID') }}</label>
      <div class="col-md-6">
        <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>
        @error('national_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      </div>

      <!-- Permanent Residence -->
      <div class="form-group row">
        <!-- label and input code here -->
        <div class="form-group row">
            <label for="permanent_residence" class="col-md-4 col-form-label text-md-right">{{ __('Permanent Residence') }}</label>
            <div class="col-md-6">
              <input id="permanent_residence" type="text" class="form-control @error('permanent_residence') is-invalid @enderror" name="permanent_residence" value="{{ old('permanent_residence') }}" required autocomplete="permanent_residence" autofocus>
              @error('permanent_residence')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
      </div>

      <!-- Passport Number -->
      <div class="form-group row">
        <!-- label and input code here -->
      </div>

      <!-- Date of Birth -->
      <div class="form-group row">
        <!-- label and input code here -->
        <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
        <div class="col-md-6">
          <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">
          @error('date_of_birth')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
      </div>

      <!-- Place of Birth -->
      <div class="form-group row">
        <!-- label and input code here -->
      </div>

      <!-- Gender -->
      <div class="form-group row">
        <!-- label and input code here -->
        <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
            <div class="col-md-6">
              <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
              </select>
              @error('gender')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
      </div>

      <!-- Disabilities -->
      <div class="form-group row">
      </div>
    </fieldset>

    <fieldset>
      <legend>Application Details</legend>
      <!-- Programme -->
      <div class="form-group row">
      </div>

      <!-- Status -->
      <div class="form-group row">
      </div>

      <!-- Title -->
      <div class="form-group row">
      </div>
    </fieldset>

    <fieldset>
      <legend>Other Details</legend>
      <!-- Contact Address -->
      <div class="form-group row">
      </div>

      <!-- Home Phone -->
      <div class="form-group row">
      </div>

      <!-- Contact Number -->
      <div class="form-group row">
        <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
      <div class="col-md-6">
        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
        @error('phone_number')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      </div>

      <!-- Email -->
      <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
        <div class="col-md-6">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
      </div>

      <!-- Fax -->
      <div class="form-group row">
        <!-- label and input code here -->
      </div>

      <!-- Prospective Sponsors -->
      <div class="form-group row">
        <!-- label and input code here -->
      </div>

      <!-- MSU Staff Dependant -->
      <div class="form-group row">
        <!-- label and input code here -->
      </div>

      <!-- MSU Staff Member -->
      <div class="form-group row">
        <!-- label and input code here -->
      </div>
    </fieldset> --}}

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Submit Application') }}
            </button>
        </div>
    </div>
  </form>
</x-app-layout>

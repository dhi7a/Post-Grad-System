<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Application Details') }}</div>

                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="card-body">
                        <p><strong>Application ID:</strong> {{ $application->id }}</p>
                        <p><strong>Programme:</strong> {{ $application->programme }}</p>
                        <p><strong>Status:</strong> {{ $application->status }}</p>

                    <div class="card">
                        <!-- Display Personal Details -->
                        <h4>Personal Details</h4>
                        <p><strong>Marital Status:</strong> {{ $personalDetails->marital_status }}</p>
                        <p><strong>Nationality:</strong> {{ $personalDetails->nationality }}</p>
                        <p><strong>National ID:</strong> {{ $personalDetails->national_id }}</p>
                        <p><strong>Permanent Residence:</strong> {{ $personalDetails->permanent_residence }}</p>
                        <p><strong>Passport No:</strong> {{ $personalDetails->passport_no }}</p>
                        <p><strong>Date of Birth:</strong> {{ $personalDetails->date_of_birth }}</p>
                        <p><strong>Place of Birth:</strong> {{ $personalDetails->place_of_birth }}</p>
                        <p><strong>Disabilities:</strong> {{ $personalDetails->disabilities }}</p>
                        <p><strong>Contact Address:</strong> {{ $personalDetails->contact_address }}</p>
                        <p><strong>Home Phone:</strong> {{ $personalDetails->home_phone }}</p>
                        <p><strong>Contact Number:</strong> {{ $personalDetails->contact_number }}</p>
                        <p><strong>Email:</strong> {{ $personalDetails->email }}</p>
                        <p><strong>Fax:</strong> {{ $personalDetails->fax }}</p>
                        <p><strong>Prospective Sponsors:</strong> {{ $personalDetails->prospective_sponsors }}</p>
                        <p><strong>MSU Staff Dependant:</strong> {{ $personalDetails->msu_staff_dependant }}</p>
                        <p><strong>MSU Staff Member:</strong> {{ $personalDetails->msu_staff_member }}</p>
                    </div>

                    <h4>Subjects Details</h4>
                            <p><strong>Subject Name:</strong> {{ $subjects->subject }}</p>
                            {{-- <p><strong>Subject Code:</strong> {{ $subject->code }}</p> --}}
                            <p><strong>Subject Grade:</strong> {{ $subjects->grade }}</p>
                            <p><strong>Exam Board:</strong> {{ $subjects->exam_board }}</p>
                            <p><strong>Date:</strong> {{ $subjects->date }}</p>
                            <p><strong>Level:</strong> {{ $subjects->level }}</p>
                            <!-- Add more subject details fields as needed -->


                        <!-- Display Diploma Details -->
                        <h4>Diploma Details</h4>

                            <p><strong>Diploma Name:</strong> {{ $diplomas->programme }}</p>
                            <p><strong>Result:</strong> {{ $diplomas->result }}</p>
                            <p><strong>Level:</strong> {{ $diplomas->level }}</p>
                            <p><strong>Date:</strong> {{ $diplomas->date }}</p>
                            <p><strong>Institution:</strong> {{ $diplomas->institution }}</p>
                            <!-- Add more diploma details fields as needed -->


                        <!-- Display Dissertation Details -->
                        <h4>Dissertation Details</h4>
                            <p><strong>Description:</strong> {{ $dissertations->description }}</p>

                        <!-- Display University Studies Details -->
                        <h4>University Studies Details</h4>
                         <p><strong>Degree:</strong> {{ $universityStudies->programme }}</p>
                            <p><strong>Class:</strong> {{ $universityStudies->class }}</p>
                            <p><strong>Institution:</strong> {{ $universityStudies->institution }}</p>
                            <p><strong>Date:</strong> {{ $universityStudies->date }}</p>

                        <!-- Display Research Experience Details -->
                        <h4>Research Experience Details</h4>
                            <p><strong>Description:</strong> {{ $researchExperiences->description }}</p>

                        <!-- Display Relevant Publications Details -->
                        <h4>Relevant Publications Details</h4>
                            <p><strong>Description:</strong> {{ $relevantPublications->description }}</p>

                        <!-- Display Employment Experience Details -->
                        <h4>Employment Experience Details</h4>
                            <p><strong>Position:</strong> {{ $employmentExperiences->position }}</p>
                            <p><strong>Employer:</strong> {{ $employmentExperiences->employer }}</p>
                            <p><strong>From:</strong> {{ $employmentExperiences->from }}</p>
                            <p><strong>To:</strong> {{ $employmentExperiences->to }}</p>

                        <!-- Display Proposed Field Study Details -->
                        <h4>Proposed Field Of Study Details</h4>
                            <p><strong>Description:</strong> {{ $proposedFieldStudies->description }}</p>

                            <!-- Display Referees Details -->
                        <h4>Referees Details</h4>
                        {{-- @foreach ($referees as $referee) --}}

                            <p><strong>Name:</strong> {{ $referees->full_name }}</p>
                            <p><strong>Address:</strong> {{ $referees->address }}</p>
                            <p><strong>Phone:</strong> {{ $referees->phone }}</p>
                            <p><strong>Email:</strong> {{ $referees->email }}</p>
                            <p><strong>Occupation:</strong> {{ $referees->occupation }}</p>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

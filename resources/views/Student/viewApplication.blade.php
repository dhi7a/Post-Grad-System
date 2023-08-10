<x-app-layout>
    {{-- <x-slot name="header">
        <!-- Add your page header content here -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </x-slot> --}}
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
                        <p hidden><strong>Application ID:</strong> {{ $application->id }}</p>
                        <p><strong>Programme:</strong> {{ $personalDetails->programme }}</p>
                        <p><strong>Status:</strong> {{ $application->status }}</p> <br>
                        @if ($application->status == 'Accepted')
                        <p><strong>Application Status:</strong> Accepted</p>

                            <!-- Additional content for the accepted status -->
                        @elseif ($application->status == 'Revise and resubmit')
                            <p><strong>Application Status:</strong> Revise and resubmit</p>
                            <!-- Additional content for the recommended status -->
                        @elseif ($application->status == 'Rejected')
                            <p><strong>Application Status:</strong><span style="color: red;">{{ $application->status }}</span></p>
                            <!-- Additional content for the rejected status -->
                        @else
                            <p><strong>Application Status:</strong> Unknown</p>
                        @endif
                    </div>
                    <div class="message-section">
                        @if($application->status === 'Revise and resubmit')
                        @foreach($revisionMessages as $revision)
                        <h4>Revision Messages</h4>
                            <div class="message">
                                <p>{{ $revision->message }}</p>
                            </div>
                        @endforeach
                        @endif

                        @if($application->status === 'Rejected')
                        @foreach($rejectionMessage as $rejection)
                            <h4>Rejection Messages</h4>
                                <div class="message">
                                    <p>{{ $rejection->message }}</p>
                                </div>
                        @endforeach
                        @endif
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <!-- Display Personal Details -->
                            <h4>Personal Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Surname:</strong> {{ $personalDetails->surname}}</p>
                                    <p><strong>Forenames:</strong> {{ $personalDetails->forenames }}</p>
                                    <p><strong>Marital Status:</strong> {{ $personalDetails->marital_status }}</p>
                                    <p><strong>Nationality:</strong> {{ $personalDetails->nationality }}</p>
                                    <p><strong>National ID:</strong> {{ $personalDetails->national_id }}</p>
                                    <p><strong>Permanent Residence:</strong> {{ $personalDetails->permanent_residence }}</p>

                                </div>
                                <div class="col-md-4">
                                    <p><strong>Passport No:</strong> {{ $personalDetails->passport_no }}</p>
                                    <p><strong>Date of Birth:</strong> {{ $personalDetails->date_of_birth }}</p>
                                    <p><strong>Place of Birth:</strong> {{ $personalDetails->place_of_birth }}</p>
                                    <p><strong>Disabilities:</strong> {{ $personalDetails->disabilities }}</p>
                                    <p><strong>Contact Address:</strong> {{ $personalDetails->contact_address }}</p>
                                    <p><strong>Home Phone:</strong> {{ $personalDetails->home_phone }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Contact Number:</strong> {{ $personalDetails->contact_number }}</p>
                                    <p><strong>Email:</strong> {{ $personalDetails->email }}</p>
                                    <p><strong>Fax:</strong> {{ $personalDetails->fax }}</p>
                                    <p><strong>Prospective Sponsors:</strong> {{ $personalDetails->prospective_sponsors }}</p>
                                    <p><strong>MSU Staff Dependant:</strong> {{ $personalDetails->msu_staff_dependant }}</p>
                                    <p><strong>MSU Staff Member:</strong> {{ $personalDetails->msu_staff_member }}</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Research Experience Details</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Display Research Experience Details -->
                                    <p><strong>Description:</strong> {{ $researchExperiences->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Relevant Publications Details</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Display Relevant Publications Details -->
                                    <p><strong>Description:</strong> {{ $relevantPublications->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h4>Employment Experience Details</h4>
                        </div>
                        <div class="card-body">
                        <!-- Display Employment Experience Details -->
                        <h4>Employment Experience Details</h4>
                            <p><strong>Position:</strong> {{ $employmentExperiences->position }}</p>
                            <p><strong>Employer:</strong> {{ $employmentExperiences->employer }}</p>
                            <p><strong>From:</strong> {{ $employmentExperiences->from }}</p>
                            <p><strong>To:</strong> {{ $employmentExperiences->to }}</p> <br>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Proposed Field Of Study Details</h4>
                        </div>
                        <div class="card-body">
                        <!-- Display Proposed Field Study Details -->
                            <p><strong>Description:</strong> {{ $proposedFieldStudies->description }}</p> <br>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Referees Details</h4>
                        </div>
                        <div class="card-body">
                            <!-- Display Referees Details -->
                            <div class="row">
                                @foreach ($referees as $referee)
                                <div class="col-md-6">
                                    <p><strong>Name:</strong> {{ $referee->full_name }}</p>
                                    <p><strong>Address:</strong> {{ $referee->address }}</p>
                                    <p><strong>Phone:</strong> {{ $referee->phone }}</p>
                                    <p><strong>Email:</strong> {{ $referee->email }}</p>
                                    <p><strong>Occupation:</strong> {{ $referee->occupation }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Uploaded Documents</h4>
                        </div>
                        <div class="card-body">
                            <!-- Display Uploaded Documents -->
                            @foreach ($documents as $document)
                                {{-- <p><strong>Document Name:</strong> {{ $document->name }}</p>
                                <p><strong>File:</strong> <a href="{{ $document->file_url }}">{{ $document->file_name }}</a></p> --}}

                                <a href="{{ route('documents.download', ['filename' => 'documents/'.$document->id_documents]) }}">Download ID Documents</a><br>
                                <a href="{{ route('documents.download', ['filename' => 'documents/'.$document->certificates]) }}">Download Certificates</a><br>
                                <a href="{{ route('documents.download', ['filename' => 'documents/'.$document->dissertation_proposal]) }}">Download Dissertation Proposal</a><br>

                            @endforeach
                        </div>
                    </div>
                </div>
                @if(Auth::id() === $application->userid) {{-- Show edit button only for the owner --}}
                <a href="{{ route('editApplication', $application->id) }}" class="btn btn-primary">Edit Application</a>
            @endif
            </div>
        </div>
    </div>
</div>

</div>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</x-app-layout>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

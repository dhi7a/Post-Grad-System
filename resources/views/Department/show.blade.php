<x-app-layout>
    {{-- <x-slot name="header">
        <!-- Add your page header content here -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </x-slot> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="legend">Department Show</div>
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
                        <p><strong>Status:</strong> {{ $application->status }}</p> <br>
                        @if ($application->status == 'Accepted')
                        <p><strong>Application Status:</strong> Accepted</p>

                            <!-- Additional content for the accepted status -->
                        @elseif ($application->status == 'Recommended')
                            <p><strong>Application Status:</strong> Recommended</p>
                            <!-- Additional content for the recommended status -->
                        @elseif ($application->status == 'Rejected')
                            <p><strong>Application Status:</strong> Rejected</p>
                            <!-- Additional content for the rejected status -->
                        @else
                            <p><strong>Application Status:</strong> Unknown</p>
                        @endif
                    </div>
                    <div>
                        @if($application->status === 'Rejected')
                            <h4>Rejection Message</h4>
                            <p>{{ $rejectionMessage ?? 'No rejection message available.' }}</p>
                        @endif

                        @if($application->status === 'revise')
                            <h4>Revision Message</h4>
                            <p>{{ $revisionMessage ?? 'No revision messages available.' }}</p>
                        @endif

                    </div>


                    <div class="card">
                        <div class="card-header">
                            <!-- Display Personal Details -->
                            <h4>Personal Details</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Surname:</strong> {{ $personalDetails->surname}}</p>
                            <p><strong>Forenames:</strong> {{ $personalDetails->forenames }}</p>
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
                            <p><strong>MSU Staff Member:</strong> {{ $personalDetails->msu_staff_member }}</p> <br>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Subjects Details</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($subjects as $subject)
                                <p><strong>Subject Name:</strong> {{ $subject->subject }}</p>
                                {{-- <p><strong>Subject Code:</strong> {{ $subject->code }}</p> --}}
                                <p><strong>Subject Grade:</strong> {{ $subject->grade }}</p>
                                <p><strong>Exam Board:</strong> {{ $subject->exam_board }}</p>
                                <p><strong>Date:</strong> {{ $subject->date }}</p>
                                <p><strong>Level:</strong> {{ $subject->level }}</p>
                                <hr> <!-- Add a horizontal line between each referee's details -->
                                @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Diploma Details</h4>
                        </div>
                        <div class="card-body">
                        <!-- Display Diploma Details -->
                            <p><strong>Diploma Name:</strong> {{ $diplomas->programme }}</p>
                            <p><strong>Result:</strong> {{ $diplomas->result }}</p>
                            <p><strong>Level:</strong> {{ $diplomas->level }}</p>
                            <p><strong>Date:</strong> {{ $diplomas->date }}</p>
                            <p><strong>Institution:</strong> {{ $diplomas->institution }}</p> <br>
                            <!-- Add more diploma details fields as needed -->
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Dissertation Details</h4>
                        </div>
                        <div class="card-body">
                        <!-- Display Dissertation Details -->
                            <p><strong>Description:</strong> {{ $dissertations->description }}</p> <br>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>University Studies Details</h4>
                        </div>
                        <div class="card-body">
                        <!-- Display University Studies Details -->
                         <p><strong>Degree:</strong> {{ $universityStudies->programme }}</p>
                            <p><strong>Class:</strong> {{ $universityStudies->class }}</p>
                            <p><strong>Institution:</strong> {{ $universityStudies->institution }}</p>
                            <p><strong>Date:</strong> {{ $universityStudies->date }}</p> <br>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Research Experience Details</h4>
                        </div>
                        <div class="card-body">
                        <!-- Display Research Experience Details -->
                            <p><strong>Description:</strong> {{ $researchExperiences->description }}</p> <br>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Relevant Publications Details</h4>
                        </div>
                        <div class="card-body">
                        <!-- Display Relevant Publications Details -->
                            <p><strong>Description:</strong> {{ $relevantPublications->description }}</p> <br>
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
                            @foreach ($referees as $referee)
                            <p><strong>Name:</strong> {{ $referee->full_name }}</p>
                            <p><strong>Address:</strong> {{ $referee->address }}</p>
                            <p><strong>Phone:</strong> {{ $referee->phone }}</p>
                            <p><strong>Email:</strong> {{ $referee->email }}</p>
                            <p><strong>Occupation:</strong> {{ $referee->occupation }}</p>
                            <hr> <!-- Add a horizontal line between each referee's details -->
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Uploaded Documents</h4>
                        </div>
                        <div class="card-body">
                            <!-- Display Uploaded Documents -->
                            @foreach ($documents as $document)
                                <p><strong>Document Name:</strong> {{ $document->name }}</p>
                                <p><strong>File:</strong> <a href="{{ $document->file_url }}">{{ $document->file_name }}</a></p>
                                <hr> <!-- Add a horizontal line between each document -->
                                <a href="{{ route('documents.download', ['filename' => 'documents/'.$document->id_documents]) }}">Download ID Documents</a>
                                <a href="{{ route('documents.download', ['filename' => 'documents/'.$document->certificates]) }}">Download Certificates</a>
                                <a href="{{ route('documents.download', ['filename' => 'documents/'.$document->dissertation_proposal]) }}">Download Dissertation Proposal</a>

                            @endforeach
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <br>
                                    <form method="POST" action="{{ route('department.proceed', $application->id) }}" class="d-inline-block">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Recommend Accepting</button>
                                    </form>

                                    <form method="POST" action="{{ route('department.recommend', $application->id) }}" class="d-inline-block">
                                        @csrf
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#recommendModal">Revise and resubmit</button>
                                    </form>

                                    <form method="POST" action="{{ route('department.reject', $application->id) }}" class="d-inline-block">
                                        @csrf
                                        {{-- <button type="submit" class="btn btn-danger">Reject</button> --}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal">Reject</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<!-- Recommendation Modal -->
<!-- Recommendation Modal -->
<div class="modal fade" id="recommendModal" tabindex="-1" role="dialog" aria-labelledby="recommendModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recommendModalLabel">Recommendation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route ('department.revise', $application->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <textarea id="recommendationText" name="message" class="form-control" rows="3" placeholder="Enter your recommendation"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary" onclick="sendRecommendation()">Send</button> --}}
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </form>
        </div>
    </div>
</div>

<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Reject Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('faculty.reject', $application->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <textarea id="rejectText" name="message" class="form-control" rows="3" placeholder="Enter your rejection reason"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

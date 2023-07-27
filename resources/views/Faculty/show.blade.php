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
                        <p><strong>Application ID:</strong> {{ $application->id }}</p>
                        <p><strong>Programme:</strong> {{ $application->programme }}</p>
                        <p><strong>Status:</strong> {{ $application->status }}</p> <br>
                        @if ($application->status == 'Accepted')
                        <p><strong>Application Status:</strong> Accepted</p>

                            <!-- Additional content for the accepted status -->
                        @elseif ($application->status == 'Revise and resubmit')
                            <p><strong>Application Status:</strong> Revise and resubmit</p>
                            <!-- Additional content for the recommended status -->
                        @elseif ($application->status == 'Rejected')
                            <p><strong>Application Status:</strong> Rejected</p>
                            <!-- Additional content for the rejected status -->
                        @else
                            <p><strong>Application Status:</strong> Unknown</p>
                        @endif
                    </div>
                    <div class="message-section">
                        @if($application->status === 'revise')
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
                                <p><strong>Document Name:</strong> {{ $document->name }}</p>
                                <p><strong>File:</strong> <a href="{{ $document->file_url }}">{{ $document->file_name }}</a></p>
                                <hr> <!-- Add a horizontal line between each document -->
                                <a href="{{ route('documents.download', ['filename' => 'documents/'.$document->id_documents]) }}">Download ID Documents</a><br>
                                <a href="{{ route('documents.download', ['filename' => 'documents/'.$document->certificates]) }}">Download Certificates</a><br>
                                <a href="{{ route('documents.download', ['filename' => 'documents/'.$document->dissertation_proposal]) }}">Download Dissertation Proposal</a><br>

                            @endforeach
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <br>
                                    <form method="POST" action="{{ route('faculty.proceed', $application->id) }}" class="d-inline-block">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Recommend Accepting</button>
                                    </form>
                                    <form method="POST" action="{{ route('faculty.recommend', $application->id) }}" class="d-inline-block">
                                        @csrf
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#recommendModal">Revise and resubmit</button>
                                    </form>

                                    <form method="POST" action="{{ route('faculty.reject', $application->id) }}" class="d-inline-block">
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
                <h5 class="modal-title" id="recommendModalLabel">Revise and resubmit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form action="{{route ('faculty.revise', $application->id) }}" method="post">
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

{{-- new --}}
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

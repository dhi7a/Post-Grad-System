
<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="margin-left: 20px;">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="welcome-message">Welcome, {{ Auth::user()->name }}!</p>
                        <!-- <p class="permissions-message">You have the following permissions:</p>
                        <ul class="permissions-list">
                            @foreach(Auth::user()->roles as $role)
                                @foreach($role->permissions as $permission)
                                    <li>{{ ucfirst($permission->name) }}</li>
                                @endforeach
                            @endforeach
                        </ul> -->

                        <!-- <p class="profile-message">Here is your profile information:</p>
                        <ul class="profile-list">
                            <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
                            <li><strong>Email:</strong> {{ Auth::user()->email }}</li> -->
                            <!-- <li><strong>Phone:</strong> {{ Auth::user()->phone }}</li>
                            <li><strong>Address:</strong> {{ Auth::user()->address }}</li> -->
                        </ul>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-left: 20px;"> 
    <tbody>
        @foreach($applications as $application)
        <div class="row">
        <div class="col-md-6">{{ $application->name }}</div>
        <div class="col-md-6">{{ $application->email }}</div>
        <div class="col-md-12">
            <button class="btn btn-primary view-details-btn" data-name="{{ $application->name }}" data-email="{{ $application->email }}" data-phone="{{ $application->phone }}" data-address="{{ $application->address }}">View Details</button>
        </div>
    </div>
    <br>
    <br>
        @endforeach
    </tbody>
    <div id="details-modal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Application Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Application details will be inserted here -->
        </div>
    </div>
</div>

    </div>
    
	
    
</x-app-layout>

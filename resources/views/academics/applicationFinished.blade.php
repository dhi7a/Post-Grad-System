<x-app-layout>
    <b>Thank you for applying with MSU <br></b><br>
    <div class="card">
        <div class="row">
            <br> <b style="color:red; margin-left:10px" > <br>IMPORTANT NOTICE</b> <br>
        </div><br>
        <div>
            <br> <p  style="margin-left:10px; text-align:justify" >Applications are normally take 20 days to process.</p>
        </div>
    </div>

    <!-- Add the View Application Button -->
    <div class="row justify-content-center mt-4">
        {{-- <a href="{{ route('view-application', ['id' => $application->id]) ) }}" class="btn btn-primary">View Your Application</a> --}}
        <a href="{{ route('view-application', ['id' => $application->id]) }}" class="btn btn-primary">View Application</a>

    </div><br>
    <div>
        <h4>Application Status: {{ $status }}</h4>
        <!-- Display other application details if needed -->

        <div class="progress-bar-container">
            <div class="progress-bar">
                <div class="progress" style="width: {{ $progressPercentage }}%"></div>
            </div>
            {{-- <div class="progress-labels">
                <span class="{{ $status == 'Admin side' ? 'active' : '' }}">Admin side</span>
                <span class="{{ $status == 'Faculty' ? 'active' : '' }}">Faculty</span>
                <span class="{{ $status == 'Department' ? 'active' : '' }}">Department</span>
                <span class="{{ $status == 'DCCa (final stage)' ? 'active' : '' }}">DCCa (final stage)</span>
            </div> --}}
        </div>
    </div>
</x-app-layout>
@push('styles')
<style>
    .progress-bar-container {
        width: 100%;
        border: 1px solid #ddd;
        background-color: #f1f1f1;
    }

    .progress-bar {
        height: 20px;
        width: 100%;
        background-color: #4CAF50;
    }

    .progress {
        height: 100%;
        background-color: #007bff;
    }

    .progress-labels {
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
    }

    .progress-labels span {
        flex: 1; /* This will make the spans evenly distribute within the available space */
        text-align: center;
        color: #333;
    }

    .progress-labels span.active {
        color: #007bff;
        font-weight: bold;
    }
</style>
@endpush

@push('scripts')
<script>
    // Calculate the progress percentage based on the current status
    const statuses = ['Admin side', 'Faculty', 'Department', 'DCCa (final stage)'];
    const currentStatus = '{{ $status }}';
    const progressPercentage = (statuses.indexOf(currentStatus) + 1) / statuses.length * 100;

    // Set the progress width dynamically
    const progressBar = document.querySelector('.progress');
    progressBar.style.width = `${progressPercentage}%`;
</script>
@endpush

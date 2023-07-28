<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Applications') }}</div>
                    <div class="card-body">
                        <h3>Total Applications: </h3>
                        <a href="{{route('applications')}}">View All Applications</a>
                        {{-- <a href="">View All Applications</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Reports') }}</div>
                    <div class="card-body">
                        {{-- <h3>Total Reports: {{ $totalReports }}</h3> --}}
                        <h3>Total Reports: </h3>
                        <a href="#">View All Reports</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>
                    <div class="card-body">
                        {{-- <h3>Total Users: {{ $totalUsers }}</h3> --}}
                        <h3>Total Users:</h3>
                        <a href="{{route('accounts')}}">View All Users</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Recent Activities Tile -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Recent Activities') }}</div>
                    <div class="card-body">
                        <ul>
                            {{-- @foreach ($recentApplications as $application)
                                <li>Submitted Application by {{ $application->applicant_name }} on {{ $application->created_at }}</li>
                            @endforeach --}}
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Data Export Tile -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Data Export') }}</div>
                    <div class="card-body">
                        {{-- <a href="{{ route('admin.export.applications') }}">Export Applications Data</a>
                        <a href="{{ route('admin.export.users') }}">Export Users Data</a> --}}
                        <a href="#">Export Applications Data</a><br>
                        <a href="#">Export Users Data</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Number of Students') }}</div>
                <div class="card-body">
                    <h3>Total Students: {{ $totalStudents }}</h3>
                    <canvas id="studentsChart" width="200" height="200"></canvas>
                </div>
            </div>
        </div> --}}

    </div>
</x-app-layout>

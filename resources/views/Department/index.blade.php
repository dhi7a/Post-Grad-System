<!-- resources/views/department/index.blade.php -->
<x-app-layout>
<p class="welcome-message">Welcome, {{ Auth::user()->name }}!</p>
    <h1>Accepted Applications from PostGrad</h1>
            <div class="card">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="margin-left: 20px;">{{ __('Department Dashboard') }}</div>
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
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <p class="welcome-message">Welcome, {{ Auth::user()->name }}!</p>
                                </div>
                                <div class="card">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Forenames</th>
                                                <th>Surname</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($acceptedApplications as $application)
                                                <tr>
                                                    <td>{{ $application->id }}</td>
                                                    <td>{{ $application->forenames }}</td>
                                                    <td>{{ $application->surname }}</td>
                                                    <td>{{ $application->description }}</td>
                                                    <td>
                                                        <a href="{{ route('department.show', $application->id)}}">View Full Application</a>
                                                    {{-- <a href="{{ route('apply', ['id' => $application->id]) }}">View Full Application</a> --}}
                                                    </td>
                                                    {{-- <td>{{ $application->status }}</td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>

<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="margin-left: 20px;">{{ __('Admin Dashboard') }}</div>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>{{ $application->forenames }}</td>
                                        <td>{{ $application->surname }}</td>
                                        <td>{{ $application->description }}</td>
                                        <td>
                                            <a href="{{ route('application.show',$application->id)}}">View Full Application</a>
                                        {{-- <a href="{{ route('apply', ['id' => $application->id]) }}">View Full Application</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

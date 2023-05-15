<x-app-layout>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Welcome, {{ Auth::user()->name }}!</p>
                        <p>You have the following permissions:</p>
                        <ul>
                            @foreach(Auth::user()->roles as $role)
                                @foreach($role->permissions as $permission)
                                    <li>{{ ucfirst($permission->name) }}</li>
                                @endforeach
                            @endforeach
                        </ul>

                        <p>Here is your profile information:</p>
                        <ul>
                            <li>Name: {{ Auth::user()->name }}</li>
                            <li>Email: {{ Auth::user()->email }}</li>
                            <li>Phone: {{ Auth::user()->phone }}</li>
                            <li>Address: {{ Auth::user()->address }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <x-app-layout>
        <div class="card">
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
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                                        <i class="bi bi-person mr-1"></i> Add New User
                                    </a>
                                </h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td>{{ $account->id }}</td>
                                                <td>{{ $account->name }}</td>
                                                <td>{{ $account->email }}</td>
                                                <td>{{ $account->role }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $account->id }}">Edit</a>

                                                    <!-- Delete Button (Example using a form) -->
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $account->id }}">Delete</a>

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
        </div>
        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add-accounts') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <!-- Add options for roles here -->
                                    <option value="admin">Admin</option>
                                    {{-- <option value="user">User</option> --}}
                                    <option value="faculty">Faculty</option>
                                    <option value="department">Department</option>
                                    <option value="dcca">Dcca</option>
                                    <option value="supervisor">Supervisor</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="departmentid">Department ID</label>
                                <select name="departmentid" id="departmentid" class="form-control" required>
                                    <!-- Add options for roles here -->
                                    <option value="option1">option1</option>
                                    <option value="option2">option2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="facultyid">Faculty ID</label>
                                <select name="facultyid" id="facultyid" class="form-control" required>
                                    <!-- Add options for roles here -->
                                    <option value="option1">option1</option>
                                    <option value="option2">option2</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </x-app-layout>

 <!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $account->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $account->id }}">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit Form -->
                <form action="{{ route('update-accounts', ['id' => $account->id]) }}" method="POST">
                    @csrf
                    <!-- Edit Name -->
                    <div class="form-group">
                        <label for="edit-name">Name</label>
                        <input type="text" name="name" id="edit-name" class="form-control" value="{{ $account->name }}" required>
                    </div>
                    <!-- Edit Email -->
                    <div class="form-group">
                        <label for="edit-email">Email</label>
                        <input type="email" name="email" id="edit-email" class="form-control" value="{{ $account->email }}" required>
                    </div>
                    <!-- Edit Role -->
                    <div class="form-group">
                        <label for="edit-role">Role</label>
                        <select name="role" id="edit-role" class="form-control" required>
                            <!-- Add options for roles here -->
                            <option value="admin" @if($account->role === 'admin') selected @endif>Admin</option>
                            <option value="faculty" @if($account->role === 'faculty') selected @endif>Faculty</option>
                            <option value="department" @if($account->role === 'department') selected @endif>Department</option>
                            <option value="dcca" @if($account->role === 'dcca') selected @endif>Dcca</option>
                            <option value="supervisor" @if($account->role === 'supervisor') selected @endif>Supervisor</option>
                        </select>
                    </div>
                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Delete modal -->
    <div class="modal fade" id="deleteModal{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $account->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $account->id }}">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <!-- Add your delete form here -->
                    <!-- Example: -->
                    <form action="{{ route('delete-accounts', ['id' => $account->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-rYkO8Va8e/c2C4zF3Pp8Cd1gsVvlvMhzRHCdCZy8XTWGRXP+x3i9Sti8M2I4ikBM" crossorigin="anonymous"></script>
</body>
</html>


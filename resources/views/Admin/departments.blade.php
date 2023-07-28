

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Department List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('departments.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Department Name:</label>
                    <input type="text" id="name" name="name" required class="border rounded w-full p-2">
                </div>
                <div class="mb-4">
                    <label for="faculty_id" class="block text-gray-700 text-sm font-bold mb-2">Faculty:</label>
                    <select id="faculty_id" name="faculty_id" required class="border rounded w-full p-2">
                        <option value="" selected disabled>Select Faculty</option>
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Department</button>
            </form>
            <h1 class="text-2xl font-semibold mt-8">Department List</h1>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Department Name</th>
                        <th class="px-4 py-2">Faculty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td class="px-4 py-2">{{ $department->name }}</td>
                            <td class="px-4 py-2">{{ $department->faculty->name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faculties List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('faculties.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Faculty Name:</label>
                    <input type="text" id="name" name="name" required class="border rounded w-full p-2">
                    <button type="submit" class="btn btn-primary">Add Faculty</button>
                </div>

            </form>
            <h1 class="text-2xl font-semibold mt-8">Faculty List</h1>
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ccc; padding: 8px; text-align: left; background-color: #f2f2f2;">Faculty Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faculties as $faculty)
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 8px; text-align: left;">{{ $faculty->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

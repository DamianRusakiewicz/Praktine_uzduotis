<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Review Conference Registrations</title>
</head>
<body>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="d-flex align-items-center justify-content-between">
                <h1>Registrations for Conference: {{ $conference->title }}</h1>
            </div>
            <hr>
            <!-- Error message section -->
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <!-- Table section -->
            <table class="table table-hover">
                <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($registrations as $key => $registration)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $registration->user->name }}</td>
                        <td>{{ $registration->user->email }}</td>
                        <td>
                            @if(auth()->id() === $registration->user_id)
                                <form action="{{ route('conferences.unregister', $registration->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            </div>
        </div>
    </div>
</x-app-layout>

</body>
</html>

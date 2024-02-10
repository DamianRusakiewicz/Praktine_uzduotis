<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Projektas</title>
</head>
<body>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('conferences.create') }}" class="btn btn-primary">Add Conference</a>
            </div>
            <hr>
            <table class="table table-hover">
                <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Time</th>
                    <th>Description</th>
                    <th class="action-column">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($conferences))
                    @foreach($conferences as $key => $conference)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $conference->title }}</td>
                            <td>{{ $conference->author }}</td>
                            <td>{{ $conference->time }}</td>
                            <td>{{ $conference->description }}</td>
                            <td class="action-column">
                                <form action="{{ route('conferences.register', $conference->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </form>
                                <a href="{{ route('conferences.review', $conference->id) }}" class="btn btn-primary">Review</a>
                                <a href="{{ route('conferences.edit', $conference->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
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

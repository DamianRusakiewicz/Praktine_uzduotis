<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projektas</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ isset($conference) ? route('conferences.update', $conference->id) : route('conferences.store') }}" method="POST">
                        @csrf
                        @if(isset($conference))
                            @method('PUT')
                        @endif
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ isset($conference) ? $conference->title : '' }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                            <input type="text" name="author" id="author" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ isset($conference) ? $conference->author : '' }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Time:</label>
                            <input type="text" name="time" id="time" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ isset($conference) ? $conference->time : '' }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea name="description" id="description" class="form-textarea rounded-md shadow-sm mt-1 block w-full" required>{{ isset($conference) ? $conference->description : '' }}</textarea>
                        </div>
                        <div class="flex items-center justify-end">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>

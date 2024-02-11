<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6">
                    @if (auth()->user()->role === 'admin')
                        <div class="mb-4">
                            <a href="{{ route('conferences.create') }}" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Conference</a>
                        </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="whitespace-nowrap bg-gray-200 dark:bg-gray-600 w-full">
                            <thead>
                            <tr class="bg-gray-300 dark:bg-gray-700">
                                <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Title</th>
                                <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Author</th>
                                <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Time</th>
                                <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Description</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-400 dark:divide-gray-800">
                            @foreach($conferences as $conference)
                                <tr class="bg-gray-100 dark:bg-gray-800">
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200 title-toggle">
                                        <div class="truncate">
                                            {{ $conference->title }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200">{{ $conference->author }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200">{{ $conference->time }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200 description-toggle">
                                        <div class="truncate">
                                            {{ $conference->description }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm font-medium">
                                        <form action="{{ route('conferences.register', $conference->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="bg-green-900 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Register</button>
                                        </form>
                                        <button onclick="location.href='{{ route('conferences.review', $conference->id) }}'" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Review</button>
                                        @if (auth()->user()->role === 'admin')
                                            <button onclick="location.href='{{ route('conferences.edit', $conference->id) }}'" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                            <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-900 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                            </form>
                                        @endif
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

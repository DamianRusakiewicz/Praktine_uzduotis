<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8"> <!-- Changed max-width to max-w-full -->
            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Expired Conferences</h2>
                    @if($expiredConferences->isNotEmpty())
                        <div class="overflow-x-auto">
                            <table class="whitespace-nowrap bg-gray-200 dark:bg-gray-600 w-full">
                                <thead>
                                <tr class="bg-gray-300 dark:bg-gray-700">
                                    <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Title</th>
                                    <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Author</th>
                                    <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Time</th>
                                    <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Description</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-400 dark:divide-gray-800">
                                @foreach($expiredConferences as $conference)
                                    <tr class="bg-gray-100 dark:bg-gray-800">
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200">{{ $conference->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200">{{ $conference->author }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200">{{ $conference->time }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200 description-toggle">
                                            <div class="truncate">
                                                <span class="text">{{ $conference->description }}</span>
                                                <span class="more">...</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No expired conferences found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

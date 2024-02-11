<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    @vite('resources/css/app.css')
</head>

<body>

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Registered Users</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap bg-gray-200 dark:bg-gray-600">
                            <thead>
                            <tr class="bg-gray-300 dark:bg-gray-700">
                                <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">ID</th>
                                <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Name</th>
                                <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Email</th>
                                <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Created At</th>
                                <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-700 dark:text-gray-200 uppercase">Role</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-400 dark:divide-gray-800">
                            @foreach ($users as $user)
                                <tr class="bg-gray-100 dark:bg-gray-800">
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200">{{ $user->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200">{{ $user->created_at }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-700 dark:text-gray-200">{{ $user->role }}</td>
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

</body>

</html>

<!DOCTYPE html>
<html lang="en">

@include('includes.head')

<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 p-5">
            <h2 class="text-2xl font-semibold mb-6">Dashboard</h2>
            <ul>
                <li class="mb-4">
                    <a href="{{ route('account.dashboard') }}" class="text-gray-300 hover:text-white">Dashboard</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('account.register') }}" class="text-gray-300 hover:text-white">Register</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="text-gray-300 hover:text-white">Profile</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="text-gray-300 hover:text-white">Settings</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 bg-gray-50">
            <!-- Header -->
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <div class="flex items-center">
                    <span class="text-xl font-semibold">Welcome, Admin</span>
                </div>
                <div class="flex items-center space-x-4">

                    <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500"
                        data-dropdown-trigger="hover"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                        @else
                            Guest
                        @endif
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDelay"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>

                            <li>
                                <form action="{{ route('account.logout') }}" method="POST" class="inline">
                                    @csrf <!-- CSRF token for security -->
                                    <button type="submit"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Log out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>
            </header>

            <!-- Main Content Area -->
            <main class="p-6">
                <h1 class="text-3xl font-semibold mb-4">Dashboard Overview</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-2xl font-semibold">Total Users</h2>
                        <p class="text-gray-500 mt-2">1,024</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-2xl font-semibold">Revenue</h2>
                        <p class="text-gray-500 mt-2">$12,000</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-2xl font-semibold">New Messages</h2>
                        <p class="text-gray-500 mt-2">345</p>
                    </div>
                </div>

                <!-- More Content -->
                <div class="mt-8">
                    <h2 class="text-2xl font-semibold mb-4">Recent Activities</h2>
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <!-- Example Activity Table -->
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left">Activity</th>
                                    <th class="px-4 py-2 text-left">Date</th>
                                    <th class="px-4 py-2 text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2">User Registration</td>
                                    <td class="px-4 py-2">Jan 18, 2025</td>
                                    <td class="px-4 py-2 text-green-500">Completed</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2">Payment Received</td>
                                    <td class="px-4 py-2">Jan 17, 2025</td>
                                    <td class="px-4 py-2 text-blue-500">Pending</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

</html>

@extends('layouts.default')
@section('title', 'login page')
@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="bg-gray-50 flex items-center justify-center py-12">
            <div class="w-full max-w-6xl bg-white shadow-lg rounded-lg overflow-hidden grid md:grid-cols-2 grid-cols-1">
                <!-- Left Section -->
                <div class="bg-blue-600 text-white flex-col justify-center p-8 hidden md:flex ">
                    <h2 class="text-3xl font-bold mb-4">Welcome to <span class="text-[#FFEB00] font-medium">JMK</span>
                    </h2>
                    <p class="text-lg mb-6 text-start">Explore the world’s leading design portfolios.</p>
                    <p class="text-sm text-start">Millions of designers and agencies around the world showcase their
                        portfolio work on <span class="text-[#FFEB00] font-medium">JMK</span> - the home to the world's
                        best design and creative professionals.</p>
                </div>
                <!-- right Section -->
                <div class="p-8 ">
                    <h2 class="md:text-2xl text-lg font-bold mb-6">Welcome back to <span
                            class="text-blue-600 font-medium">JMK</span></h2>
                    <div class="sm:flex block justify-between mb-6">
                        <button
                            class="sm:w-1/2 w-full mb-2 bg-gray-100 border border-gray-300 rounded-md px-4 py-2 flex items-center justify-center gap-2 hover:bg-gray-200 mr-2">
                            <img src="https://img.icons8.com/color/24/google-logo.png" alt="Google"> Sign up with Google
                        </button>
                        <button
                            class="sm:w-1/2 w-full mb-2 bg-gray-100 border border-gray-300 rounded-md px-4 py-2 flex items-center justify-center gap-2 hover:bg-gray-200">
                            <img src="https://img.icons8.com/color/24/mac-os.png" alt="Apple"> Sign up with Apple
                        </button>
                    </div>
                    <div class="text-center text-gray-400 mb-6">or</div>
                    <form action="{{ route('account.authenticate') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Your email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="mt-1 block w-full form-control rounded-md @error('email') border-red-500 @enderror shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="name@company.com"
                                oninput="this.classList.remove('border-red-500'); clearErrorMessage('email')">
                            @error('email')
                                <p id="email-error" class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Your password</label>
                            <input type="password" name="password" id="password" value="{{ old('password') }}"
                                class="mt-1 block w-full rounded-md @error('password') border-red-500 @enderror shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                oninput="this.classList.remove('border-red-500'); clearErrorMessage('password')">
                            @error('password')
                                <p id="password-error" class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                                password?</a>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Login
                            </button>
                        </div>

                        <p class="text-center text-sm text-gray-600 mt-4">Don't have an account? <a href="{{ route('account.register') }}"
                                class="text-indigo-600 hover:underline">Register here</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script>
        // Function to clear the error message when the user starts typing
        function clearErrorMessage(inputName) {
            let errorElement = document.getElementById(inputName + '-error');
            if (errorElement) {
                errorElement.style.display = 'none';
            }
        }
    </script>
@endsection

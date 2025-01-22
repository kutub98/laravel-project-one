@extends('layouts.default')

@section('title', 'Register')

@section('content')
    <div class="container w-full max-w-screen-xl mx-auto">
        <div class="bg-gray-50 flex items-center justify-center py-12">
            <div class="w-full max-w-6xl bg-white shadow-lg rounded-lg overflow-hidden grid md:grid-cols-2 grid-cols-1">
               
                <div class="bg-blue-600 text-white flex-col justify-center p-8 hidden md:flex ">
                    <h2 class="text-3xl font-bold mb-4">Welcome to <span class="text-[#FFEB00] font-medium">JMK</span>
                    </h2>
                    <p class="text-lg mb-6 text-start">Explore the world’s leading design portfolios.</p>
                    <p class="text-sm text-start">Millions of designers and agencies around the world showcase their
                        portfolio work on <span class="text-[#FFEB00] font-medium">JMK</span> - the home to the world's
                        best design and creative professionals.</p>
                </div>

                <!-- Left Section -->
                <div class="p-8 order-1 md:order-2 lg:order-1">
                    <h2 class="md:text-2xl text-lg font-bold mb-6">Your Best Work Starts With <span class="text-blue-600 font-medium">JMK</span></h2>
                    <form action="{{ route('account.registerProcess') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="mt-1 @error('name') border-red-500 @enderror block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="e.g. Bonnie Green" oninput="this.classList.remove('border-red-500'); clearErrorMessage('name')">
                            @error('name')
                                <p id="name-error" class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Your email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="mt-1 @error('email') border-red-500 @enderror block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="name@company.com" oninput="this.classList.remove('border-red-500'); clearErrorMessage('email')">
                            @error('email')
                                <p id="email-error" class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Your password</label>
                            <input type="password" name="password" id="password" required
                                class="mt-1 block w-full @error('password') border-red-500 @enderror border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                oninput="this.classList.remove('border-red-500'); clearErrorMessage('password')">
                            @error('password')
                                <p id="password-error" class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                class="mt-1 block w-full @error('password_confirmation') border-red-500 @enderror border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                oninput="this.classList.remove('border-red-500'); clearErrorMessage('password_confirmation')">
                            @error('password_confirmation')
                                <p id="password_confirmation-error" class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-start gap-2">
                            <input type="checkbox" name="terms" id="terms" required
                                class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="terms" class="text-sm text-gray-700">By signing up, you agree to our <a href="#" class="text-indigo-600 hover:underline">Terms of Use</a> and <a href="#" class="text-indigo-600 hover:underline">Privacy Policy</a>.</label>
                            @error('terms')
                                <p id="terms-error" class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Create an account</button>
                        </div>

                        <p class="text-center text-sm text-gray-600 mt-4">Already have an account? <a href="{{ route('account.login') }}" class="text-indigo-600 hover:underline">Login here</a></p>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

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

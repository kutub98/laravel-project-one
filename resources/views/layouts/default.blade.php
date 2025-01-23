<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<style>
    body {
        font-family: "Hind Siliguri", serif;
    }
</style>

<body>
    <!-- Preloader -->


    <div id="preloader" class="w-full h-screen flex justify-center items-center bg-white">
        <div class="flex items-center justify-center flex-col w-full h-full ">
            <!-- Logo Section -->
            <div class="flex flex-col items-center mb-8">
                <div class=" aspect-video object-cover mx-auto">
                    <img src="https://gmit.academy/app2/Image/GMIT%20LOGO1.png"
                        class=" flex w-32 h-20  aspect-video object-contain animate-pulse" />
                </div>
            </div>

            <!-- Loading Text & Spinner -->
            <div class="flex flex-row gap-2 items-center space-y-4">
                <h1 class="text-xl md:text-3xl lg:text-4xl text-blue-800 font-bold flex items-center">
                    L
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                        class="animate-spin ml-2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM13.6695 15.9999H10.3295L8.95053 17.8969L9.5044 19.6031C10.2897 19.8607 11.1286 20 12 20C12.8714 20 13.7103 19.8607 14.4956 19.6031L15.0485 17.8969L13.6695 15.9999ZM5.29354 10.8719L4.00222 11.8095L4 12C4 13.7297 4.54894 15.3312 5.4821 16.6397L7.39254 16.6399L8.71453 14.8199L7.68654 11.6499L5.29354 10.8719ZM18.7055 10.8719L16.3125 11.6499L15.2845 14.8199L16.6065 16.6399L18.5179 16.6397C19.4511 15.3312 20 13.7297 20 12L19.997 11.81L18.7055 10.8719ZM12 9.536L9.656 11.238L10.552 14H13.447L14.343 11.238L12 9.536ZM14.2914 4.33299L12.9995 5.27293V7.78993L15.6935 9.74693L17.9325 9.01993L18.4867 7.3168C17.467 5.90685 15.9988 4.84254 14.2914 4.33299ZM9.70757 4.33329C8.00021 4.84307 6.53216 5.90762 5.51261 7.31778L6.06653 9.01993L8.30554 9.74693L10.9995 7.78993V5.27293L9.70757 4.33329Z">
                        </path>
                    </svg>
                    ading
                </h1>

                <!-- Loader animation -->
                <div class="flex space-x-2 justify-center items-center bg-white dark:invert"> 

                    <div class="h-5 w-5 bg-blue-100 rounded-full animate-bounce [animation-delay:-0.3s]"></div>
                    <div class="h-5 w-5 bg-blue-300 rounded-full animate-bounce [animation-delay:-0.15s]"></div>
                    <div class="h-5 w-5 bg-blue-800 rounded-full animate-bounce"></div>
                </div>
            </div>
        </div>
    </div>


    @include('includes.navbar')
    @yield('content')
    @include('includes.footer')

    <!-- Scripts -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script> --}}
    <script src="{{ mix('resources/js/flowbite.min.js') }}"></script>
    <script src="{{ mix('resources/js/lordicon.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script> <!-- Your custom JS -->

    <!-- Preloader Script -->

    <script>
        // Preloader timeout duration (in milliseconds)
        const preloaderTimeout = 10000;

        window.addEventListener('load', function() {
            // Hide the preloader once the page has fully loaded
            document.getElementById('preloader').style.display = 'none';
        });

        window.addEventListener('beforeunload', function() {
            // Show the preloader when navigating away from the page
            document.getElementById('preloader').style.display = 'flex';
        });

        // Show preloader during AJAX requests
        axios.interceptors.request.use(function(config) {
            document.getElementById('preloader').style.display = 'flex';
            return config;
        }, function(error) {
            document.getElementById('preloader').style.display = 'none';
            return Promise.reject(error);
        });

        axios.interceptors.response.use(function(response) {
            document.getElementById('preloader').style.display = 'none';
            return response;
        }, function(error) {
            document.getElementById('preloader').style.display = 'none';
            return Promise.reject(error);
        });

        // Timeout function to hide the preloader after a certain amount of time
        setTimeout(function() {
            // Check if the preloader is still visible (in case it didn't hide on load)
            if (document.getElementById('preloader').style.display !== 'none') {
                document.getElementById('preloader').style.display = 'none'; // Hide preloader after timeout
            }
        }, preloaderTimeout); // Set timeout (in ms)
    </script>
</body>

</html>

<x-app-layout>

    <body class="bg-gray-100">

        <div class="flex h-screen">

            <!-- Left Menu Bar -->
            <div class="bg-gray-800 text-white w-64 p-4">
                <h1 class="text-2xl font-bold mb-4">Panacea-Soft</h1>
                <ul>
                    <li class="mb-2"><a href="{{ route('createcategory') }}" class="hover:text-gray-300">Create
                            Category</a></li>
                    <li class="mb-2"><a href="{{ route('createitem') }}" class="hover:text-gray-300">Create Item</a>
                    </li>

                    <!-- Add more menu items as needed -->
                </ul>
            </div>

            <!-- Right Content Area -->

            <div class="flex-1 p-8">
                <h2 class="text-2xl font-bold mb-4">User Information</h2>

                <!-- Replace the following with your form or table content -->
                <div class="bg-white p-4 shadow-md rounded-md">
                    <!-- Your form or table goes here -->
                    {{ Auth::user() }}
                </div>
            </div>
        </div>

    </body>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <code>
                    {{ Auth::user() }}
                </code>

            </div>
        </div>
    </div> --}}
</x-app-layout>

<x-app-layout>


    <body class="bg-gray-100">

        <div class="flex h-screen">

            <!-- Left Menu Bar -->
            <div class="bg-gray-800 text-white w-64 p-4">
                <h1 class="text-2xl font-bold mb-4">Finance System</h1>
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
                <h2 class="text-2xl font-bold mb-4">Financial Data</h2>

                <!-- Replace the following with your form or table content -->
                <div class="bg-white p-4 shadow-md rounded-md">
                    <!-- Your form or table goes here -->
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th> <!-- Fixed typo here -->
                                <th>Price</th>
                                <th>Owner</th>
                                <th>Publish</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($items as $item)
                                <tr>

                                </tr>
                            //@endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </body>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />

            </div>
        </div>
    </div> --}}
</x-app-layout>

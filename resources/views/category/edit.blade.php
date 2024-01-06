<x-app-layout>



    <body class="bg-gray-100">

        <div class="flex h-screen">

            <!-- Left Menu Bar -->
            <div class="bg-gray-800 text-white w-64 p-4">
                <h1 class="text-2xl font-bold mb-4">SGB Assignment Test</h1>
                <ul>
                    <li class="mb-2"><a href="{{ route('category.index') }}" class="hover:text-gray-300">Category</a>
                    </li>
                    <li class="mb-2"><a href="{{ route('item.index') }}" class="hover:text-gray-300">Items</a></li>
                    <!-- Add more menu items as needed -->
                </ul>
            </div>

            <!-- Right Content Area -->
            <div class="flex-1 p-8">

                <h2 class="text-2xl font-bold mb-4">Edit Category</h2>
                @if (Session::has('errorMessage'))
                    <div class="bg-red-200 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md flex items-center justify-between"
                        role="alert">
                        <div class="flex items-center">

                            <p class="font-bold"> {{ Session::get('errorMessage') }}
                            </p>
                            <svg class="w-6 h-6 mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>

                    </div>
                @endif


                <!-- Replace the following with your form or table content -->
                <div class="bg-white p-4 shadow-md rounded-md">
                    <!-- Your form or table goes here -->

                    <form class="max-w-sm mx-auto" method="post"
                        action="{{ route('updateCategory', $categoryData->id) }}">
                        @csrf
                        <!-- CSRF Token for Laravel form protection -->

                        <div class="form-group row">
                            <label for="inputName"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                                Name</label>
                            <input type="text" name="categoryName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $categoryData->title }}" required>

                        </div>

                        <div class="form-group row">
                            <label for="inputName"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                                Description</label>
                            <textarea name="categoryDescription"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                cols="30" rows="10">{{ $categoryData->description }}</textarea>
                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    </form>

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

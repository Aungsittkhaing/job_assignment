<x-app-layout>

    <body class="bg-gray-100">

        <div class="flex h-screen">

            <!-- Left Menu Bar -->
            <div class="bg-gray-800 text-white w-64 p-4">

                <h1 class="text-2xl font-bold mb-4">Panacea-Soft Assignment Test</h1>
                <ul>
                    <li class="mb-2"><a href="{{ route('category.index') }}" class="hover:text-gray-300">Category</a>
                    </li>
                    <li class="mb-2"><a href="{{ route('item.index') }}" class="hover:text-gray-300">Items</a></li>
                    <!-- Add more menu items as needed -->
                </ul>
            </div>

            <!-- Right Content Area -->
            <div class="flex-1 p-8">
                <a href="{{ route('createcategory') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 float-end">
                    Create Category</a>
                @if (Session::has('successMessage'))
                    <div class="bg-green-200 border-t-4 border-green-500 rounded-b text-blue-900 px-4 py-3 shadow-md flex items-center justify-between"
                        role="alert">

                        <p class="font-bold"> {{ Session::get('successMessage') }}
                        </p>
                        <div class="flex items-center">

                        </div>

                    </div>
                @endif
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



                <h2 class="text-2xl font-bold mb-4">Category Lists</h2>
                <!-- Display Success Message -->


                <!-- Replace the following with your form or table content -->
                <div class="bg-white p-4 shadow-md rounded-md">
                    <!-- Your form or table goes here -->


                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 border">
                            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Action
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-cente">
                                        Category ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-cente">
                                        Category Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-cente">
                                        Category Description
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-200">
                                        <td class="px-6 py-4 text-center flex justify-center">

                                            <div class="me-2"> <a href="{{ route('editCategory', $item->id) }}"
                                                    class="">
                                                    <svg class="w-4 h-5 text-green-800" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z" />
                                                    </svg>
                                                </a></div>
                                            <div class="">
                                                <a href="{{ route('deleteCategory', $item->id) }}" class=""><svg
                                                        class="w-4 h-5 text-red-800" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 18 20">
                                                        <path
                                                            d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                                    </svg></a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">{{ $item->id }}</td>
                                        <td class="px-6 py-4">{{ $item->title }}</td>
                                        <td class="px-6 py-4">{{ $item->description }}</td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        {{ $categories->onEachSide(1)->links() }}
                    </div>

                    {{-- <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Action</th> <!-- Fixed typo here -->
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <a href="{{ route('editCategory', $item->id) }}"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><button
                                                class=""><i class=""></i>Edit</button></a>
                                        <a href="{{ route('deleteCategory', $item->id) }}"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><button
                                                class=""><i class="fas fa-trash-alt"></i>Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}

                </div>
            </div>
        </div>
    </body>
</x-app-layout>

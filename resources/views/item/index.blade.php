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
                <a href="{{ route('createitem') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 float-end">
                    Create Item</a>
                @if (Session::has('successMessage'))
                    <div class="bg-green-200 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md flex items-center justify-between"
                        role="alert">

                        <p class="font-bold"> {{ Session::get('successMessage') }}
                        </p>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
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



                <h2 class="text-2xl font-bold mb-4">Item Lists</h2>
                <!-- Display Success Message -->


                <!-- Replace the following with your form or table content -->
                <div class="bg-white p-4 shadow-md rounded-md">
                    <!-- Your form or table goes here -->


                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 border">
                            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-300  text-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-center">Action</th>
                                    <th class="px-6 py-3 text-center">No</th>
                                    <th class="px-6 py-3 text-center">Name</th>
                                    <th class="px-6 py-3 text-center">Category</th>
                                    <th class="px-6 py-3 text-center">Description</th> <!-- Fixed typo here -->
                                    <th class="px-6 py-3 text-center">Price</th>
                                    <th class="px-6 py-3 text-center">Owner</th>
                                    <th class="px-6 py-3 text-center">Publish</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-200">

                                        <td class="px-6 py-4 text-center flex justify-center">

                                            <div class="me-2"> <a href="{{ route('editItem', $item->item_id) }}"
                                                    class="">
                                                    <svg class="w-4 h-5 text-green-800" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z" />
                                                    </svg>
                                                </a></div>
                                            <div class="">
                                                <a href="{{ route('deleteItem', $item->item_id) }}" class=""><svg
                                                        class="w-4 h-5 text-red-800" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 18 20">
                                                        <path
                                                            d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                                    </svg></a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">{{ $item->item_id }}</td>
                                        <td class="px-6 py-4 text-center">{{ $item->name }}</td>
                                        <td class="px-6 py-4 text-center">
                                            @foreach ($categories as $category)
                                                @if ($item->category_id == $category->id)
                                                    {{ $category->title }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4">{{ $item->description }}</td>
                                        <td class="px-6 py-4 text-center">{{ $item->price }}</td>
                                        <td class="px-6 py-4 text-center">{{ $item->owner }}</td>
                                        <td class="px-6 py-4 text-center">
                                            @if ($item->publish == 1)
                                                <label class="relative inline-flex items-center mb-5 cursor-pointer">
                                                    <input type="checkbox" value="" class="sr-only peer" disabled>
                                                    <div
                                                        class="w-11 h-6 bg-blue-600 rounded-full peer dark:bg-blue-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                    </div>

                                                </label>
                                            @else
                                                <label class="relative inline-flex items-center mb-5 cursor-pointer">
                                                    <input type="checkbox" value="" class="sr-only peer" disabled>
                                                    <div
                                                        class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                    </div>

                                                </label>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $items->onEachSide(1)->links() }}
                    </div>


                </div>
            </div>
        </div>
    </body>
</x-app-layout>

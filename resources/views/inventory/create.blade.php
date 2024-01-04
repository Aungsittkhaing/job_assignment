<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Create') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="w-full mb-5">
                    <label for="information" class="text-black font-bold">Item Information</label>
                </div>
                <form action="{{ route('item.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="itemName"
                            class="form-check-label block text-sm font-medium leading-6 text-gray-900">Item Name</label>
                        <input name="text" type="text"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                    </div>
                    <div class="w-full mt-3">
                        <label for="Select Category"
                            class="form-check-label block text-sm font-medium leading-6 text-gray-900">Select
                            Category
                        </label>
                        <select value="{{ old('category') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="category">
                            @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="itemPrice"
                            class="form-check-label block text-sm font-medium leading-6 text-gray-900">Item
                            Price
                        </label>
                        <input name="number" type="number"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div class="mt-3">
                        <label for="description"
                            class="form-check-label block text-sm font-medium leading-6 text-gray-900">
                            Description
                        </label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="description"
                            class="form-check-label block text-sm font-medium leading-6 text-gray-900">
                            Status
                        </label>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium">Publish</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="description"
                            class="form-check-label block text-sm font-medium leading-6 text-gray-900">
                            Item Photo
                        </label>
                        <input type="file" class="form-input">
                    </div>
                    <div class="w-full mt-3">
                        <label for="ownerInformation" class="text-black font-bold">Owner Information</label>
                    </div>
                    <div class="mt-3">
                        <label for="ownerName"
                            class="form-check-label block text-sm font-medium leading-6 text-gray-900">
                            Owner Name
                        </label>
                        <input name="text" type="text"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div class="mt-3">
                        <label for="ownerName"
                            class="form-check-label block text-sm font-medium leading-6 text-gray-900">
                            Contact Number
                        </label>
                        <div class="flex">
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="category">
                                <option selected>+95</option>
                                <option value="US">+90</option>
                                <option value="CA">+86</option>
                                <option value="FR">+45</option>
                                <option value="DE">+40</option>
                            </select>
                            <input name="phNum" type="number"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="Address"
                            class="form-check-label block text-sm font-medium leading-6 text-gray-900">
                            Address
                        </label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>
                    </div>
                    <button
                        class="mt-2 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Cancel</button>
                    <button
                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Save</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

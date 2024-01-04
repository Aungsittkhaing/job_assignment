<html>

<head>
    <title>Edit Form</title>
</head>

<body>
    <h3 class="text-center text-primary">Category Update</h3>
    <form class="form-horizontal" method="put" action="{{ route('updateItem', $itemData->item_id) }}">

        @csrf
        <!-- Item Name -->
        <label for="name">Item Name:</label>
        <input type="text" id="name" name="name" value="{{ $itemData->name }}" required><br />

        <!-- Category ID -->
        <label for="category">Category</label>
        <select name="category_id" id="id" class="form-control" required>
            <option value="">Choose Category....</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $itemData->id ? 'selected' : '' }}>
                    {{ $category->title }}
                </option>
            @endforeach
        </select><br />

        <!-- Description -->
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required>{{ $itemData->description }}</textarea><br />

        <!-- Price -->
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="{{ $itemData->price }}" required><br />
        <br />

        <!-- Owner -->
        <label for="owner">Owner:</label>
        <input type="text" id="owner" name="owner" value="{{ $itemData->owner }}" required><br />

        <!-- Publish -->
        <label for="publish">Publish:</label>
        <select name="publish" id="publish" class="form-control" required>
            <option value="" disabled selected>Choose Status....</option>
            <option value="1" {{ $itemData->publish == 1 ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ $itemData->publish == 0 ? 'selected' : '' }}>No</option>
        </select><br />



        <button type="submit" class="btn btn-primary">Update</button>
</body

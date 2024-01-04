<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Form</title>
    <!-- You can link to your CSS stylesheets here -->
</head>

<body>

    <h1>Add New Item</h1>
    <form class="form-horizontal" method="post" action="{{ route('createItem') }}">
        @csrf
        <!-- Item Name -->
        <label for="name">Item Name:</label>
        <input type="text" id="name" name="name" required><br />

        <!-- Category ID -->
        <label for="category">Category</label>
        <select name="category_id" id="" class="form-control" required>
            <option value="">Choose Category....</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select><br />

        <!-- Description -->
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea><br />

        <!-- Price -->
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required><br />
        <br />

        <!-- Owner -->
        <label for="owner">Owner:</label>
        <input type="text" id="owner" name="owner" required><br />

        <!-- Publish -->
        <label for="publish">Publish:</label>
        <select name="publish" id="" class="form-control" required>
            <option>Choose Status....</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select><br />



        <!-- Submit Button -->
        <input type="submit" value="Add Item">
    </form>

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
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->item_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->owner }}</td>
                    <td>{{ $item->publish }}</td>
                    <td>
                        <a href="{{ route('editItem', $item->item_id) }}"><button
                                class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i>Edit</button></a>
                        <a href="{{ route('deleteItem', $item->item_id) }}"><button
                                class="btn btn-sm bg-danger text-white"><i
                                    class="fas fa-trash-alt"></i>Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>

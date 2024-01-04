<html>

<head>
    <title>Category</title>
</head>

<body>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form class="form-horizontal" method="post" action="{{ route('createCategory') }}">
        @csrf
        <!-- CSRF Token for Laravel form protection -->

        <div class="form-group row">
            <label for="inputName" class="col-form-label">Category Name</label>
            <input type="text" name="categoryName" class="form-control" placeholder="Enter Category Name" required>

        </div>

        <div class="form-group row">
            <label for="inputName" class="col-form-label">Category Description</label>
            <textarea name="categoryDescription" class="form-control" placeholder = "Enter Category Description" cols="30"
                rows="10"></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
    <table class="table table-hover text-nowrap text-center">
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
                        <a href="{{ route('editCategory', $item->id) }}"><button
                                class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i>Edit</button></a>
                        <a href="{{ route('deleteCategory', $item->id) }}"><button
                                class="btn btn-sm bg-danger text-white"><i
                                    class="fas fa-trash-alt"></i>Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

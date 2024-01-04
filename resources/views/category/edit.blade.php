<html>

<head>
    <title>Edit Form</title>
</head>

<body>
    <h3 class="text-center text-primary">Category Update</h3>
    <form class="form-horizontal" method="put" action="{{ route('updateCategory', $categoryData->id) }}">
        @csrf

        <div class="form-group">
            <label>Category Name</label>
            <input name="categoryName" class="form-control" placeholder="Enter Category Name"
                value="{{ $categoryData->title }}">
        </div>

        <div class="form-group">
            <label>Category Description</label>
            <textarea name="categoryDescription" class ="form-control" placeholder="Enter Category Description" cols="30"
                rows="10">
                {{ $categoryData->description }}
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
</body>

</html>

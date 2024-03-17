<!-- edit_category.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>
    <form action="{{ route('update_category', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="category_name">Category Name:</label><br>
        <input type="text" id="category_name" name="category_name" value="{{ $category->catagory_name }}"><br><br>
        <input type="submit" value="Update Category">
    </form>
</body>
</html>

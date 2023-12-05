<!DOCTYPE html>
<form  method="post" action="{{ url('/categories/store') }}">
    @csrf
    @method('PATCH')
    <label for="category_name">Category Name:</label>
    <input type="text" name="category_name" required>
    <br>
    <input type="submit" value="Create Category">
</form>
@error ("category_name")
{{"category already exists"}} 
@enderror
<!DOCTYPE html>
<form  method="post" action="{{ url('/categories/update', ['id' => $category->id]) }}">
    @csrf
    @method('PATCH')
    <label for="category_name">Category Name:</label>
    <input type="text" name="category_name" value="{{ $category->name }}" required>
    <br>
    <input type="submit" value="change Category">
</form>
@error ("category_name")
{{"category already exists"}} 
@enderror
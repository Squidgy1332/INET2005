<!DOCTYPE html>
<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<a href="{{ route('create') }}"><button>add category</button></a>
<a href="{{ route('item') }}"><button>view items</button></a>
<table>
    <tr>
        <th>Name</th>
        <th>view items</th>
    </tr>

    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->name }}</td>
        <td><a href="{{ route('edit', ['id' => $category->id]) }}"><button>edit</button></a></td>
    </tr>
    @endforeach
</table>
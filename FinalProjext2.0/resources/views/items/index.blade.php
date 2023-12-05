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
<a href="{{ route('ItemCreate') }}"><button>add item</button></a>
<a href="{{ route('index') }}"><button>view category's</button></a>
<table>
    <tr>
        <th>name</th>
        <th>edit</th>
        <th>delete</th>
    </tr>

    @foreach ($items as $item)
    <tr>
        <td>{{ $item->title }}</td>
        <td><a href="{{ route('itemEdit', ['id' => $item->id]) }}"><button>edit</button></a></td>
        <td><a href="{{ route('delete', ['id' => $item->id]) }}"><button>delete</button></a></td>
    </tr>
    @endforeach

</table>
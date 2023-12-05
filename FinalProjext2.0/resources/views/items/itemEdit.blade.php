<form  method="post" action="{{ url('/items/update', ['id' => $item->id]) }}">
    @csrf
    @method('PATCH')
    <label for="item_name">Item Name:</label>
    <input type="text" name="item_name" value="{{ $item->title }}" required>
    <br>
    <label for="item_Price">Item Price:</label>
    <input type="text" name="item_Price" value="{{ $item->price }}" required>
    <br>
    <label for="item_quantity">Item Quantity:</label>
    <input type="text" name="item_quantity" value="{{ $item->quantity }}" required>
    <br>
    <label for="item_SKU">Item SKU:</label>
    <input type="text" name="item_SKU" value="{{ $item->SKU }}" required>
    <br>
    <label for="item_description">Item Description:</label>
    <input type="text" name="item_description" value="{{ $item->description }}" required>
    <br>
    <label for="item_CID">Category ID:</label>
    <input type="text" name="item_CID" value="{{ $item->category_id }}" require>
    <br>
    <img src="{{ asset('storage/' . $item->Image) }}" alt="Image of {{ $item->title }}" style="width: 400px">
    <br>
    <label for="item_img">Item Image:</label>
    <input type="file" name="item_img" value="{{ $item->Image }}">
    <br>
    <input type="submit" value="Edit Item">
</form>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
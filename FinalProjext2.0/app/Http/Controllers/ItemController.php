<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

    public function itemCreate()
    {
        return view('items/itemCreate');
    }

    public function itemStore(Request $request, item $items)
    {
        $request->validate([
            'item_name' => 'required|unique:item,title|max:255',
            'item_CID' => 'required|max:255',
            'item_description' => 'required|max:255',
            'item_Price' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:255',
            'item_quantity' => 'required|numeric|max:255',
            'item_SKU' => 'required|unique:item,SKU|max:255',
            'item_img' => 'required|file'
        ]);

        // Find the existing item in the database
        $existingItem = $items->find($request->input('item_id'));

        // If the item exists, get the old image filename
        $oldFilename = $existingItem ? $existingItem->Image : null;

        $filename = $oldFilename; // Default to old filename

        // Check if a new image is being uploaded
        if ($request->hasFile('item_img')) {
            $image = $request->file('item_img');
            $filename = uniqid() . '_' . $image->getClientOriginalName();
            $disk = 'public';
            Storage::disk($disk)->put($filename, file_get_contents($image));

            // If a new image is uploaded, delete the old one
            if ($oldFilename && Storage::disk($disk)->exists($oldFilename)) {
                Storage::disk($disk)->delete($oldFilename);
            }
        }

        $items->create([
            'title' => $request->input('item_name'),
            'category_id' => $request->input('item_CID'),
            'description' => $request->input('item_description'),
            'price' => $request->input('item_Price'),
            'quantity' => $request->input('item_quantity'),
            'SKU' => $request->input('item_SKU'),
            'Image' => $filename,
        ]);

        return redirect('items/index')->with('success', 'Category updated successfully');
    }

    public function update(Request $request, $id)
    {
        $item = item::find($id);
        $newName = $request->input('item_name');
        $newSKU = $request->input('item_SKU');

        if (!$item) {
            return redirect()->back()->with('error', 'Category not found');
        }

        if($newName != $item->title && $newSKU != $item->SKU){
            $request->validate([
                'item_name' => 'required|max:255',
                'item_CID' => 'required|max:255',
                'item_description' => 'required|max:255',
                'item_Price' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:255',
                'item_quantity' => 'required|numeric|max:255',
                'item_SKU' => 'required|max:255',
                'item_img' => 'required'
            ]);
            
            $item->update([
                'title' => $request->input('item_name'),
                'category_id' => $request->input('item_CID'),
                'description' => $request->input('item_description'),
                'price' => $request->input('item_Price'),
                'quantity' => $request->input('item_quantity'),
                'SKU' => $request->input('item_SKU'),
                'Image' => $request->input('item_img')
            ]);
        }

        return redirect('items/index')->with('success', 'Category updated successfully');
    }

    public function delete($id)
    {
        $item = item::where('id', $id)->first();
        $item->delete();
        $filename = $item->image;

        // Check if the file exists in storage before attempting to delete it
        if ($filename && Storage::disk('public')->exists($filename)) {
            // Delete the file from storage
            Storage::disk('public')->delete($filename);

            // Update the database record to remove the filename
            $item->update(['image' => null]);

            // Redirect with a success message
        } else {
            // Handle the case where the file does not exist
            return redirect()->back()->with('error', 'Image not found.');
        }
        return redirect('items/index')->with('success', 'Category updated successfully');
    }

    public function item()
    {
        $items = item::all();

        return view('items/index', ['items' => $items]);
    }

    public function itemEdit($id)
    {
        $item = item::where('id', $id)->first();

        return view('items/itemEdit', ['item' => $item]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\InventoryModel;

class InventoryController extends Controller
{
    function getInventories(){
        $inventories = InventoryModel::all();
        return view('admin.inventory.getInventorys', ['inventories' => $inventories]);
    }

    function getInventorySearch(Request $request)
    {
        $productName = $request->input('product_name');

        $query = InventoryModel::query();

        if (!empty($productName)) {
            $query->where('product_name', 'like', '%' . $productName . '%');
        }

        $inventories = $query->get();

        return view('admin.inventory.getInventorySearch', ['inventories' => $inventories]);
    }

    function editInventory($id){
        $inventory = InventoryModel::findOrFail($id);
        $products = ProductModel::all();
        return view('admin.inventory.updateInventory', ['inventory' => $inventory], ['products' => $products]);
    }

    function updateInventory(Request $request, $id){
        $inventory = InventoryModel::findOrFail($id);

        $request->validate([
            'proname' => 'required|string|max:50',
            'quantity' => 'required|integer',
            'minimum_quantity' => 'nullable|integer',
        ]);

        $inventory->proname = $request->proname;
        $inventory->quantity = $request->quantity;
        $inventory->minimum_quantity = $request->minimum_quantity;

        $inventory->save();
        return redirect('updateInventory/' . $id)->with("Note", "Sửa thành công!");
    }

    function deleteInventory($id){
        $inventory = InventoryModel::findOrFail($id);
        $inventory->delete();
        return redirect('getInventories')->with("Note", "Xóa $id thành công!");
    }

    public function showInsertInventory()
    {
        $products = ProductModel::all();
        return view('admin.inventory.insertInventory', ['products' => $products]);
    }

    public function insertInventory(Request $request)
    {
        // Validate and get form data
        $productid = $request->input('productid');
        $productName = $request->input('product_name');
        $quantity = $request->input('quantity');
        $minimumQuantity = $request->input('minimum_quantity');

        $inventory = new InventoryModel();
        $inventory->productid = $productid;
        $inventory->quantity = $quantity;
        $inventory->minimumquantity = $minimumQuantity;
        $inventory->proname = $productName;

        $inventory->save();
        return redirect('insertInventory/')->with("Note", "Thêm mới thành công!");
    }
}

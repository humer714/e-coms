<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); // Get all categories
        return view('admin.products.add', ['product' => new Product(), 'categories' => $categories]);
    }

    public function storeold(Request $request)
    {

        if ($request->hasFile('thumbnail')) {
            $imagePath = $request->file('thumbnail')->store('products', 'public'); // Store in 'storage/app/public/products'
            $request['thumbnail'] = $imagePath;
        }
        $data = $request->all();
        // Handle the image upload (if provided)
        dd($data);
        $product = Product::updateOrCreate(['id' => $request->input('id')], $data);
        return redirect()->route('products.index');
    }
    public function store(Request $request)
    {
        if ($request->id) {
            $product = Product::find($request->id);
        } else {
            $product = new Product();
        }
        if ($request->hasFile('thumbnail')) {
            $imagePath = $request->file('thumbnail')->store('products-thumbnail', 'public'); // Store in 'storage/app/public/products'
            $thumbnail = 'storage/' . $imagePath;
        } else {
            $thumbnail = $product->thumbnail;
        }
        $product->name          = $request->name;
        $product->type          = $request->type;
        $product->status        = $request->status;
        $product->price         = $request->price;
        $product->image         = $request->image;
        $product->stock         = $request->stock;
        $product->category_id   = $request->category_id;
        $product->description   = $request->description;
        $product->compare_price = $request->compare_price;
        $product->thumbnail     = $thumbnail;
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Get all categories
        return view('admin.products.add', compact('product', 'categories'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
    public function upload_product_images(Request $request)
    {
        $input = $request->all();
    

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $completeFileName = $file->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $randomized = rand();
            $documents = str_replace(' ', '', $fileNameOnly) . '-' . $randomized . '' . time() . '.' . $extension;
            $path = $file->storeAs('public/product_images', $documents);
            $test2 = $request->hasFile('file');
            $documents = URL::to('/') . '/storage/product_images/' . $documents;
            $insert_doc = DB::table('inventory_images')->insert([
                'picture' => $documents,
                'doc_key' => $request->hidden_key_id
            ]);
        }

        echo $documents;
        die;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function men()
    {
        $products = Product::where('category', 'men')->get();
        return view('men', compact('products'));
    }

    public function women()
    {
        $products = Product::where('category', 'women')->get();
        return view('women', compact('products'));
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function dashboard()
    {
        $firstProducts = Product::whereBetween('id', [1, 3])->get();
        $secondProducts = Product::whereBetween('id', [4, 6])->get();
        return view('dashboard',  compact('firstProducts', 'secondProducts'));
    }

    public function create()
    {
        return view('products.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|min:3|max:255',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category'    => 'required|string|max:255',
            'price'       => 'required|string|max:255',
            'description' => 'required|string|min:10|max:1000',
            'color'       => 'nullable|array', 
            'sizes'       => 'nullable|array',  // ✅ Accept multiple sizes
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name'        => $request->name,
            'image'       => $imagePath,
            'category'    => $request->category,
            'price'       => $request->price,
            'description' => $request->description,
            // 'color'       => implode(',', $request->color ?? []), // ✅ Convert color array to string
            // 'sizes'       => implode(',', $request->sizes ?? []), // ✅ Convert size array to string
        ]);

        return redirect("/products")->with('success', 'Product created successfully.');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.details', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category'    => 'required|string|max:255',
            'price'       => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'color'       => 'nullable|array',  
            'sizes'       => 'nullable|array',  
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->name        = $request->name;
        $product->category    = $request->category;
        $product->price       = $request->price;
        $product->description = $request->description;
        // $product->color       = implode(',', $request->color ?? []); // ✅ Convert color array to string
        // $product->sizes       = implode(',', $request->sizes ?? []); // ✅ Convert size array to string
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function ajaxSearch(Request $request)
    {
        $query = $request->get('query');

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->take(3)
            ->get();

        $output = '';

        if (count($products) > 0) {
            foreach ($products as $product) {
                $output .= '
                    <a href="/products/' . $product->id . '" class="d-block p-2 text-decoration-none text-dark border-bottom">
                        <img src="' . asset('storage/' . $product->image) . '" 
                             style="width:40px; height:40px; object-fit:cover; margin-right:10px; border-radius:5px;">
                        ' . e($product->name) . '
                    </a>
                ';
            }
        } else {
            $output = '<p class="p-2 mb-0 text-muted">No results found</p>';
        }

        return $output;
    }
}

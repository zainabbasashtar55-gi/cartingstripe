<?php

namespace App\Http\Controllers;
use App\Models\Product; 
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function men()
{
    $products = Product::where('category', 'men')->get();
    return view('men', compact('products'));
}

public function women()
{
    $products = Product::where('category', 'women')->get();
    return view('.women', compact('products'));
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

    return view('dashboard', compact('firstProducts', 'secondProducts'));
}

    

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:50|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'required|string|min:100|max:1000',
        ]);
 $imagePath = $request->file('image')->store('products', 'public');
        Product::create([
            'name' => $request->name,
            'image' => $imagePath,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
        ]);

         return redirect("/products")->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
    return view('products.details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'required|string|max:1000', 
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->name = $request->name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
      return view('admin.products.index')->with(compact('products')); //lectura 
    }
    public function create()
    {
      $categories = Category::orderBy('name')->get();
      return view('admin.products.create')->with(compact('categories')); //formulario de registro 
    }
    public function store(Request $request)
    {

    $messages=[
    'name.required'=>'Es necesario ingresar un nombre para el producto.',
    'name.min'=>'El nombre del producto debe tener al menos 3 caracteres.',
    'price.required'=>'Es obligatorio ingresar un precio para el producto.',
    'price.numeric'=>'Ingrese un precio válido.',
    'price.min'=>'No se admiten valores negativos.',
    'price_plus.required'=>'Es obligatorio ingresar un precio de mayoreo para el producto.',
    'price_plus.numeric'=>'Ingrese un precio válido.',
    'price_plus.min'=>'Ingrese un valor mayor a cero.',
    'description.required'=>'La descripción corta es un campo obligatorio.',
    'description.max'=>'La descripción breve admite hasta 200 caracteres.',
    'long_description.required'=>'La descripción extensa es un campo obligatorio.',
    'talla.required'=>'Es necesario ingresar talla para el producto.',
    'long_description.max'=>'La descripción extensa admite solo 500 caracteres.'
    
    ];
        //validar
    $rules=[
     'name'=> 'required|min:3',
     'description'=> 'required|max:200',
     'long_description'=> 'required|max:500',
     'price'=>'required|numeric|min:0',
     'price_plus'=>'required|numeric|min:0',
     'talla'=>'required'
    ];

    $this->validate($request, $rules, $messages);
      //dd($request->all()) 
      //registrar el nuevo producto en la base de datos 
    $product = new Product();
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price =$request->input('price');
    $product->price_plus =$request->input('price_plus');
    $product->category_id = $request->category_id; 
    $product->long_description = $request->input('long_description');
    $product->talla =$request->input('talla');
    $product->save();//guardar
    return redirect('/admin/products');
    }

     public function edit($id)
    {
      $categories = Category::orderBy('name')->get();
       // return "Mostrar aqyu el formulaario de edicion para el producto con id $id";
        $product = Product::find($id);
         return view('admin.products.edit')->with(compact('product','categories')); //formulario de registro 
    }
    public function update(Request $request, $id)
    {
        $messages=[
    'name.required'=>'Es necesario ingresar un nombre para el producto.',
    'name.min'=>'El nombre del producto debe tener al menos 3 caracteres.',
    'price.required'=>'Es obligatorio ingresar un precio para el producto.',
    'price.numeric'=>'Ingrese un precio válido.',
    'price.min'=>'No se admiten valores negativos.',
    'price_plus.required'=>'Es obligatorio ingresar un precio de mayoreo para el producto.',
    'price_plus.numeric'=>'Ingrese un precio válido.',
    'price_plus.min'=>'Ingrese un valor mayor a cero.',
    'description.required'=>'La descripción corta es un campo obligatorio.',
    'description.max'=>'La descripción breve admite hasta 200 caracteres.',
    'long_description.required'=>'La descripción extensa es un campo obligatorio.',
    'talla.required'=>'Es necesario ingresar talla para el producto.',
    'long_description.max'=>'La descripción extensa admite solo 500 caracteres.'
    
    ];
        //validar
    $rules=[
     'name'=> 'required|min:3',
     'description'=> 'required|max:200',
     'long_description'=> 'required|max:500',
     'price'=>'required|numeric|min:0',
     'price_plus'=>'required|numeric|min:0',
     'talla'=> 'required'
    ];

    $this->validate($request, $rules, $messages);


      //dd($request->all()) 
      //registrar el nuevo producto en la base de datos 
    $product = Product::find($id);
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price =$request->input('price');
    $product->price_plus =$request->input('price_plus');
    $product->category_id = $request->category_id; 
    $product->long_description = $request->input('long_description');
    $product->talla = $request->input('talla');
    $product->save();//actualizar
    
    return redirect('/admin/products');
    }
    
     public function destroy($id)
    {
        ProductImage::where('product_id', $id)->delete();

    $product = Product::find($id);
    
    $product->delete();//eliminar
    
    return back();
    }
}

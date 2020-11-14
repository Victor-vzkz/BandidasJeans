<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::OrderBy('name')->paginate(10);
      return view('admin.categories.index')->with(compact('categories')); //lectura 
    }
    public function create()
    {
      return view('admin.categories.create'); //formulario de registro 
    }
    public function store(Request $request)
    {

    $messages=[
    'name.required'=>'Es necesario ingresar un nombre para la categoria.',
    'name.min'=>'El nombre del producto debe tener al menos 3 caracteres.',
    'description.required'=>'La descripción es un campo obligatorio.',
    'description.max'=>'La descripción admite hasta 250 caracteres.',
    
    ];
        //validar
    $rules=[
     'name'=> 'required|min:3',
     'description'=> 'required|max:250',
    ];

    $this->validate($request, $rules, $messages);
      //dd($request->all()) 
      //registrar el nuevo producto en la base de datos 
    Category::create($request->all()); //asignación masiva
   
    return redirect('/admin/categories');
    }

     public function edit(Category $category)
    {
         return view('admin.categories.edit')->with(compact('category')); //formulario de registro 
    }
    public function update(Request $request, Category $category)
    {
       $messages=[
    'name.required'=>'Es necesario ingresar un nombre para la categoria.',
    'name.min'=>'El nombre del producto debe tener al menos 3 caracteres.',
    'description.required'=>'La descripción es un campo obligatorio.',
    'description.max'=>'La descripción admite hasta 250 caracteres.',
    
    ];
        //validar
    $rules=[
     'name'=> 'required|min:3',
     'description'=> 'required|max:250',
    ];

    $this->validate($request, $rules, $messages);
    
    $category->update($request->all());  
    
    return redirect('/admin/categories');
    }
    
     public function delete($id)
    {
    $category = Category::find($id);
    $category->delete();//eliminar
    return back()->with('notification','La categoría se ha eliminado correctamente');
    }
}

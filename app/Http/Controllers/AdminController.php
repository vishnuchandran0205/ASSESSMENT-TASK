<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\productsModel;
use App\Models\categoriesModel;

class AdminController extends Controller
{
    
    public function admin_home(Request $request){
        return view('admin.dashboard');
    }

   
    public function add_categoryform(Request $request){
        return view('admin.categoryForm');
    }

    public function store_category_data(Request $request){
        $categoryName=request('catName');
        $insertDATA= new categoriesModel();
        $insertDATA->name = $categoryName;
        if($insertDATA->save()){
            return redirect()->back()->with('success', 'Category added successfully.');
        }else{
            return redirect()->back()->with('error', 'Insertion failed.');
        }
    }

    public function view_category(Request $request){
        $getCat=categoriesModel::get();
        return view('admin.viewCategoryForm',compact('getCat'));
    }

    public function update_form(Request $request, $id){
        $SingleCat=categoriesModel::where('id',$id)->get();
        return view('admin.update_category',compact('SingleCat'));
    }

    public function update_category_data(Request $request){
        $id=request('id');
        $name=request('catName');
        $updateData=categoriesModel::where('id',$id)
        ->update([
           'name' => $name
        ]);
        if($updateData){
            return redirect('/view_category')->with('success', 'Category updated successfully.');
        }else{
            return redirect('/view_category')->with('error', 'Updation failed.');
        }
    }
    public function delete_cat(Request $request,$id){
        $delete=categoriesModel::where('id',$id)->delete();
        if($delete){
            return redirect('/view_category')->with('success', 'Category deleted successfully.');
        }else{
            return redirect('/view_category')->with('error', 'Not Deleted.');
        }
    }

    public function add_product(Request $request){
        $getCategoryNames=categoriesModel::get();
        return view('admin.add_product',compact('getCategoryNames'));
    }
    public function store_product_data(Request $request){
        $categoryName=request('cat_id');
        $productName=request('productName');
        
        if ($request->hasFile('image')) {
            $productImage = $request->file('image');
            $image_product = 'productImage_'.time().'.'.$productImage->extension();
            $productImage->move(public_path('productImage'), $image_product);
        }
        $description=request('Description');

        $insertDATA = new productsModel();
        $insertDATA->name =$productName;
        $insertDATA->category_id=$categoryName;
        $insertDATA->description=$description;
        $insertDATA->image=$image_product;
        if($insertDATA->save()){
            return redirect()->back()->with('success', 'Product added successfully.');
        }else{
            return redirect()->back()->with('error', 'Insertion failed.');
        }
        
    }

    public function view_product(Request $request){
        $getProductData=productsModel::select('products.*','categories.name as catName')
        ->join('categories','categories.id','=','products.category_id')
        ->get();
        return view('admin.view_product',compact('getProductData'));
    }

    public function product_update(Request $request, $id){
       // dd($id);
        $ProductData=productsModel::select('products.*','categories.name as catName')
        ->join('categories','categories.id','=','products.category_id')
        ->where('products.id',$id)
        ->get();
        $getCategoryNames=categoriesModel::get();
        return view('admin.update_product',compact('ProductData','getCategoryNames'));
    }

    public function product_update_new(Request $request){

        $productId=request('id');
        $categoryName=request('cat_id');
        $productName=request('productName');
        if ($request->hasFile('image')) {
            $productImage = $request->file('image');
            $image_product = 'productImage_'.time().'.'.$productImage->extension();
            $productImage->move(public_path('productImage'), $image_product);
        }else{
            $image_product =request('imageold');
        }
        $description=request('Description');

        $updateNewdata=productsModel::where('id',$productId)
        ->update([
            'name' => $productName,
            'category_id' => $categoryName,
            'description' => $description,
            'image' => $image_product
        ]);
        if($updateNewdata){
            return redirect('/view_product')->with('success', 'Product updated successfully.');
        }else{
            return redirect('/view_product')->with('error', 'Updation failed.');
        }
        
    }

    public function delete_products(Request $request,$id){
        $delete=productsModel::where('id',$id)->delete();
        if($delete){
            return redirect('/view_product')->with('success', 'Product deleted successfully.');
        }else{
            return redirect('/view_product')->with('error', 'Not Deleted.');
        }
    }

}

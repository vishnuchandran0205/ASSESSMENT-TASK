<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\productsModel;
use App\Models\categoriesModel;

class CategoryController extends Controller
{
    
    public function get_category(Request $request){
        $getallCat=categoriesModel::get();
        if($getallCat->isEmpty()){

                return response()->json([
                    'responseStatus' => false,
                    'responseCode' => 404,
                    'responseMsg' => 'no data found.'
                 ]);
        }else{
                return response()->json([
                    'responseStatus' => true,
                    'responseCode' => 200,
                    'responseMsg' => 'success.',
                    'data' => $getallCat
                 ]);
        }

       
    }

    public function by_category_id(Request $request, $category_id){
        $ProductData=productsModel::select('products.*','categories.name as catName')
        ->join('categories','categories.id','=','products.category_id')
        ->where('products.category_id',$category_id)
        ->get();
        if($ProductData->isEmpty()){

                return response()->json([
                    'responseStatus' => false,
                    'responseCode' => 404,
                    'responseMsg' => 'no data found.'
                 ]);
        }else{
                return response()->json([
                    'responseStatus' => true,
                    'responseCode' => 200,
                    'responseMsg' => 'success.',
                    'data' => $ProductData
                 ]);
        }
    }
}

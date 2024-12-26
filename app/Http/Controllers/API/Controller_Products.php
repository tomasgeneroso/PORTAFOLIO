<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Table_Products;
use Illuminate\Http\Request;

class Controller_Products extends Controller
{
    public function getProducts( )
    {
        try {
            $getProducts = Table_Products::all();
            
            echo "<script>Products:, $getProducts</script>";
            return response()->json(data: $getProducts, status: 200);
        } catch (\Throwable $th) {
            return response()->json(data: ['error' => $th->getMessage()], status: 500);
        }
    }
    public function createProduct(Request $req)
    {
        try {
            $newProduct['name'] = $req['name'];
            $newProduct['price'] = $req['price'];
            $newProduct['stock'] = $req['stock'];
            $res = Table_Products::create($newProduct);
            
            return response()->json(data: $newProduct, status: 200);
        } catch (\Throwable $th) {
            return response()->json(data: ['error' => $th->getMessage()], status: 500);
        }
    }
    public function getIdProduct(Request $req)
    {
        try {
            $idProduct=Table_Products::find($req['id']);
            $res=$idProduct ? $idProduct->id :null;
            return response()->json($res, 200);
        }catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    public function updateProduct(Request $req)
    {
        try {
            $idProduct=$req->input('id');
            Table_Products::find($idProduct)->update($idProduct);
            $res=Table_Products::find($idProduct);

            return response()->json(data: $res, status: 200);
        } catch (\Throwable $th) {
            return response()->json(data: ['error' => $th->getMessage()], status: 500);
        }
    }
    public function deleteProduct($idProduct){
        try{
            
            $res=Table_Products::destroy($idProduct);
            if(!$res){
                
                return response()->json(['error'=> 'Not product to destroy'], status:500);
            }
            return response()->json(data: "Product deleted successfully, $res", status: 200);
        }catch(\Throwable $th){
            return response()->json(data:['error'=>$th->getMessage()],status:500);
        }
    }

}

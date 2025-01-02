<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Table_Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class Controller_Products extends Controller
{
    public function getProducts( )
    {
        try {
            $getProducts = Table_Products::all();
            return response()->json(data: $getProducts, status: 200);
        } catch (\Throwable $th) {
            return response()->json(data: ['error' => $th->getMessage()], status: 500);
        }
    }
    public function createProduct(Request $req)
    {
        try {
            $newProduct=new Table_Products();
            $newProduct->name = $req->input('name');
            $newProduct->price= $req->input('price');            
            $newProduct->stock=$req->input('stock');
            $newProduct->save();
            return response()->json(data: $newProduct, status: 200);
        } catch (\Throwable $th) {
            return response()->json(data: ['error' => $th->getMessage()], status: 500);
        }
    }
    public function getIdProduct(Request $req)
    {
        try {
            $idProduct=Table_Products::find($req['id']);
            $res= $idProduct?->id;
            return response()->json($res, 200);
        }catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    public function incrementStock(Request $req,$id)
    {
        try {            
            $idProduct=$req->input('id');
            $res=Table_Products::find($idProduct)->increment('stock');
            return response()->json(data: $res, status: 200);
        } catch (\Throwable $th) {
            return response()->json(data: ['error' => $th->getMessage()], status: 500);
        }
    }
    public function decrementStock(Request $req,$id)
    {
        try {            
            $idProduct=$req->input('id');
            $res=Table_Products::find($idProduct)->decrement('stock');
            return response()->json(data: $res, status: 200);
        } catch (\Throwable $th) {
            return response()->json(data: ['error' => $th->getMessage()], status: 500);
        }
    }
    public function deleteProduct(  $id){
        try{
            $res=Table_Products::find($id);
            //$res=Table_Products::destroy($id);
            Log::info("Resultado de Table_Products::destroy: {res}", ['res'=>$res]);
            
            if($res){
                $res->delete();
                return response()->json(data: "Product deleted successfully, $res", status: 200);
            }
            Log::error('Error en eliminar el producto {id}', ['id'=>$id]);
            return response()->json(['error'=> 'Not product to destroy'], status:500);
        }catch(\Throwable $th){
            return response()->json(data:['error'=>$th->getMessage()],status:500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bebidas;
use App\Models\Categoria;

class BebidasController extends Controller
{

    public function getAllProducts(){
        $bebidas = Bebidas::with('getCategory')->orderBy('price', 'ASC')->get();
        return $bebidas;
        //Esta función nos devolvera todas las bebidas con su categoria ligadas que tenemos en nuestra BD
    }

    public function getByCategory(){

        $all = Bebidas::with('getCategory')->orderBy('price', 'ASC')->get();

        $bebidaEnergetica = Categoria::
        join('product', 'product.category', '=', 'category.id')
        ->where('category.id', '=', 1)
        ->orderBy('product.price', 'ASC')
        ->get();

        $pisco = Categoria::
        join('product', 'product.category', '=', 'category.id')
        ->where('category.id', '=', 2)
        ->orderBy('product.price', 'ASC')
        ->get();

        $ron = Categoria::
        join('product', 'product.category', '=', 'category.id')
        ->where('category.id', '=', 3)
        ->orderBy('product.price', 'ASC')
        ->get();

        $bebida = Categoria::
        join('product', 'product.category', '=', 'category.id')
        ->where('category.id', '=', 4)
        ->orderBy('product.price', 'ASC')
        ->get();

        $snack = Categoria::
        join('product', 'product.category', '=', 'category.id')
        ->where('category.id', '=', 5)
        ->orderBy('product.price', 'ASC')
        ->get();

        $cerveza = Categoria::
        join('product', 'product.category', '=', 'category.id')
        ->where('category.id', '=', 6)
        ->orderBy('product.price', 'ASC')
        ->get();

        $vodka =Categoria::
        join('product', 'product.category', '=', 'category.id')
       ->where('category.id', '=', 7)
       ->orderBy('product.price', 'ASC')
       ->get();

         return response()->json([
            'Todos' => $all,
            'bebidaEnergetica' => $bebidaEnergetica,
            'pisco' => $pisco,
            'ron' => $ron,
            'bebida' => $bebida,
            'snack' => $snack,
            'cerveza' => $cerveza,
            'Vodka' => $vodka],200);
            //Esta función nos devolvera todos los productos con su categoria ligadas que tenemos en nuestra BD.
    }

    public function order(Request $request){
        $ordenados=$request->input('order');
        $orden='';
        $prductoAtri='';
        $prductoTods='';
        switch ($request->input('order')) {
            case 'NAZ':
                $orden='ASC';
                $prductoAtri='product.name';
                $prductoTods='name';
                break;
            case 'NZA':
                $orden='DESC';
                $prductoAtri='product.name';
                $prductoTods='name';
                break;
            case 'PMY':
                $orden='DESC';
                $prductoAtri='product.price';
                $prductoTods='price';
                break;
            case 'PM':
                $orden='ASC';
                $prductoAtri='product.price';
                $prductoTods='price';
                break;
            case 'DM':
                $orden='DESC';
                $prductoAtri='product.discount';
                $prductoTods='discount';
                break;
            default:
                break;
        }    
        $tipoProducto=$request->input('producto');
        if ($tipoProducto=='Todos') {
            $productos = Bebidas::with('getCategory')->orderBy($prductoTods, $orden)->get();
        }else{
            $productos = Categoria::
            join('product', 'product.category', '=', 'category.id')
            ->where('category.name', '=', $tipoProducto)
            ->orderBy($prductoAtri,$orden)
            ->get();
        }
        return $productos;
        //Esta función devolverá los datos de los productos ordenados.
    }

    public function search(Request $request){
        $buscar=$request->input('wordSearch');
        $bebida = Bebidas::
        where('name','LIKE', '%' . $buscar . '%')->get();
        return $bebida;
        //Esta función devolverá los datos de los productos buscados.
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function index(){
        return view('noticia/noticias');
    }
    public function indexNovaNoticia(){
        return view('noticia/criarNoticia');
    }
    public function criarNoticia(Request $req){
        $image = $req->file('arquivo');
        if (empty($image)) {
            abort(400, 'Nenhum arquivo foi enviado.');
        }else{
            foreach($image as $img){
                $withAccent = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ',' ','-',);
                $withoutAccent = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','O','U','U','U','Y','_','-',);
                $decodedName = str_replace($withAccent, $withoutAccent, $img->getClientOriginalName());
                $destinationPath = 'uploads';
                $filename = rand().'-'.$decodedName;
                $img->move($destinationPath, $filename);
            }
            return ('sucesso');
        }               
    }
}

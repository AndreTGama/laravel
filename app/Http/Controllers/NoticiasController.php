<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $fileCount = count($image);
        $uploadcount = 0;

        if (empty($image)) {
            abort(400, 'Nenhum arquivo foi enviado.');
        }else{
            foreach($image as $img){
                if($img){
                    $destinationPath = 'uploads';
                    $filename = $img->getClientOriginalName();
                    $upload_success = $img->move($destinationPath, $filename);
                    $uploadcount ++;
                }
            }
            return ('sucesso');
        }
    }
}

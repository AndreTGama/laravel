<?php

namespace App\Http\Controllers;

use App\arquivo;
use App\noticia;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(){
        return view('noticia/noticias');
    }
    /**
     * indexNovaNoticia
     *
     * @return void
     */
    public function indexNovaNoticia(){
        return view('noticia/criarNoticia');
    }
    public function criarNoticia(Request $req){
        $titulo = $req->titulo;
        $noticia = $req->noticia;
        if($titulo && $noticia){
            $Novanoticia = noticia::where('titulo_noticia', $titulo)->first();
            if(!isset($Novanoticia->id)){
                $dados = ['titulo_noticia' => $titulo, 'noticia'=> $noticia];
                noticia::create($dados);
                $idNovaNoticia = noticia::where('titulo_noticia', $titulo)->first();
                $arquivo = $req->file('arquivo');
                if (empty($arquivo)) {
                    return view('noticia/criarNoticia');
                }else{
                    $descricao = $req->descricaoArquivo;
                    $arquivos = ['arquivo' => $arquivo, 'descricao' => $descricao];
                    foreach($arquivos as $arquivo){
                        dd($arquivo['arquivo']);
                        $withAccent = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ',' ','-',);
                        $withoutAccent = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','O','U','U','U','Y','_','-',);
                        $decodedName = str_replace($withAccent, $withoutAccent, $arquivo->getClientOriginalName());
                        $destinationPath = 'uploads';
                        $filename = rand().'-'.$decodedName;
                        $arquivo->move($destinationPath, $filename);
                        $dadosArquivo = ['descricao_arquivo' => $arquivo, 'arquivo' => $filename, 'noticia_id' => $idNovaNoticia];
                        arquivo::create($dadosArquivo);
                    }
                    return view('noticia/criarNoticia');
                }               
            }else{
                return view('noticia/criarNoticia')->withErrors(['message' => 'Titulo de Notícia já existe']);
            }
        }else{
            return view('noticia/criarNoticia')->withErrors(['message' => 'Campos Vazios']);
        }
    }
}

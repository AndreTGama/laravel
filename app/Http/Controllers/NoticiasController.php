<?php

namespace App\Http\Controllers;

use App\arquivo;
use App\noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Getopt;

class NoticiasController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(){
        $noticia = noticia::all();
        return view('noticia/noticias')->with('noticia', json_decode($noticia, true));
    }
    public function paginaNoticia($id){
        $noticia = noticia::find($id);
        $arquivo = DB::table('arquivos')->where('noticia_id', $id)->get();
    }
    /**
     * indexNovaNoticia
     *
     * @return void
     */
    public function indexNovaNoticia(){
        return view('noticia/criarNoticia');
    }
    /**
     * criarNoticia
     *
     * @param  mixed $req
     *
     * @return void
     */
    public function criarNoticia(Request $req){
        $titulo = $req->titulo;
        $noticia = $req->noticia;
        if($titulo && $noticia){
            $Novanoticia = noticia::where('titulo_noticia', $titulo)->first();
            if(!isset($Novanoticia->id)){
                $dados = ['titulo_noticia' => $titulo, 'noticia'=> $noticia];
                noticia::create($dados);
                $idNovaNoticia = noticia::where('titulo_noticia', $titulo)->first();
                $arquivos = $req->file('arquivo');
                $descricoes = $req->descricaoArquivo;

                if (empty($arquivos) && empty($descricoes)) {
                    return view('noticia/criarNoticia');
                }else{
                    for($i = 0; $i < count($arquivos); $i++){
                        $withAccent = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ',' ','-',);
                        $withoutAccent = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','O','U','U','U','Y','_','-',);
                        $decodedName = str_replace($withAccent, $withoutAccent, $arquivos[$i]->getClientOriginalName());
                        $destinationPath = 'uploads';
                        $filename = rand().'-'.$decodedName;
                        $arquivos[$i]->move($destinationPath, $filename);
                        $descricao = $descricoes[$i];
                        $dadosArquivo = ['descricao_arquivo' => $descricao, 'arquivo' => $filename, 'noticia_id' => $idNovaNoticia->id];
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

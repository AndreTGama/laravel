<?php

namespace App\Http\Controllers;

use App\arquivo;
use App\noticia;
use App\tipo_noticia;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APINoticiasController extends Controller
{
    /**
     * index
     *
     * @param  mixed $res
     *
     * @return void
     */
    public function index(Response $res){
        $noticia = noticia::all();
        if(count($noticia) > 0){
            return response()->json(['noticia' => $noticia]);
        }else{
            return response()->json(['message' => 'Não há Notícias no momento']);
        }
    }
    /**
     * paginaNoticia
     *
     * @param  mixed $res
     * @param  mixed $id
     *
     * @return void
     */
    public function paginaNoticia(Response $res, $id){
        $noticia = noticia::find($id);
        $arquivo = DB::table('arquivos')->where('noticia_id', $id)->get();
        return response()->json(['noticia' => $noticia, 'arquivo' => $arquivo]);
    }
    /**
     * indexNovaNoticia
     *
     * @param  mixed $res
     *
     * @return void
     */
    public function tipoNoticia(Response $res){
        $tipoNoticia = tipo_noticia::all();
        dd($tipoNoticia);
        return response()->json(['tipoNoticia' => $tipoNoticia]);
    }
    /**
     * criarNoticia
     *
     * @param  mixed $res
     * @param  mixed $req
     *
     * @return void
     */
    public function criarNoticia(Response $res, Request $req){
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
                    return response()->json(['message' => 'Campos Vazios Para mandar os Arquivos']);
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
                    return response()->json(['message' => 'Salvo Com Sucesso !!!']);
                }               
            }else{
                return response()->json(['message' => 'Titulo de Notícia já existe']);
            }
        }else{
            return response()->json(['message' => 'Campos Vazios']);
        }
    }
}
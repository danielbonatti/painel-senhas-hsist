<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use DB;

class SenhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function emissao(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        // Retorna a sequência
        $consul = DB::table('senhas')->whereRaw('date(datemi) = "'.date('Y-m-d').'" and tipate="'.$request->get('pri').'"')->count();
        // Monta a senha
        $consul = $request->get('pri').str_pad($consul+1,4,0,STR_PAD_LEFT);
        // Busca a descrição do setor
        $setor = DB::table('setores')->where('codigo',$request->get('set'))->first();
        $setor =  $setor->espsim;
        // Registra a emissão da senha
        $insert = DB::table('senhas')->insertGetId([
            'codigo' => $consul,
            'datemi' => date('Y-m-d H:i:s'),
            'codset' => $request->get('set'),
            'atiset' => '01',
            'tipate' => $request->get('pri')
        ]);
        // Tipo de atendimento
        $prior = ($request->get('pri') == 'N') ? 'Normal' : 'Prioridade';
        // Imprime a senha
        return view('senha.index')->with(['senha' => $consul,'tipate' => $prior,'setor' => $setor,'data' => date('d/m/Y'),'hora' => date('H:i:s')]);

        //URL::to("js/script.js");
        //return asset('js/script.js');
    }

    public function proxima(Request $request)
    {
        $json = json_decode($request->getContent());
        date_default_timezone_set('America/Sao_Paulo');

        if($json == null){
            return response()->json(["id" => 0, "senha" => '']); 
        } else {
            // Procura a próxima senha
            $senha = DB::table('senhas')
                ->whereDate('datemi','=',date('Y-m-d'))
                ->where('datcha',null)
                ->orderBy('tipate','desc')
                ->orderBy('datemi')
                ->first();
            if(!is_null($senha)){
                // Atualiza para chamada
                $alter = DB::table('senhas')
                    ->where('id', $senha->id)
                    ->update(['datcha' => date('Y-m-d H:i:s'), 'guiche' => $json->guiche]);
                // Retorna a senha chamada 
                return response()->json(["id" => 1, "senha" => $senha->codigo]);
            } else {
                return response()->json(["id" => 0, "senha" => '']);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

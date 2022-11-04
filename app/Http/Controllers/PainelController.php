<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PainelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('painel.index');
    }

    public function chamada()
    {
        date_default_timezone_set('America/Sao_Paulo');
        // Próxima senha
        $select = DB::select('select tipate,codigo,"Guichê 01" guiche,id from senhas where date(datemi)=curdate() and datcha is not null and datexi is null order by tipate desc,datemi limit 1');
        // Atualiza para exibido
        if(!is_null($select)){
            $alter = DB::table('senhas')
                ->where('id', $select[0]->id)
                ->update(['datexi' => date('Y-m-d H:i:s')]);
        }
        // Trata o retorno
        $senha = collect($select)->map(function($dado_linha) {	
            $dado_linha->tipate = ($dado_linha->tipate == 'N') ? 'Normal' : 'Prioridade'; // Tipo do atendimento
			return $dado_linha;
		});
        return response()->json($senha);
    }

    public function historico($codigo)
    {
        $select = DB::select("select codigo,'Guichê 01' guiche from senhas where date(datemi)=curdate() and datexi is not null and codigo<>'$codigo' order by datexi desc limit 4");
		return response()->json($select);
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

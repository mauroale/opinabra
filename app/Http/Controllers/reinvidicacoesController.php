<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\reinvindicacoes;

class reinvidicacoesController extends Controller
{
    public function index(){
    	$reinvidicacoes = reinvindicacoes::orderBy('votos' , 'desc')->get();
    	

    	return view('index' , compact( 'reinvidicacoes' ));
    }

    
    public function novaReinvidicacao(){
	
		$reinvidicacoes = Request::all('reinvidicacoes');

		reinvindicacoes::create( array(
									'nome' 	=> 	$reinvidicacoes['reinvidicacoes'],
									'votos'	=>	0,
								));
    	return redirect('/');
    }



    public function votar( $id ){

    	$reinvidicacao = reinvindicacoes::find( $id );
    	$reinvidicacao->votos = $reinvidicacao->votos + 1;
    	$reinvidicacao->save();
    	
    	return redirect('/');


    }

}
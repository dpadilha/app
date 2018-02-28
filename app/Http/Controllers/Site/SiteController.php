<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    public function __construct()
    {
        /*$this->middleware('auth')
            ->only([
                'contato',
                'categoria'
            ]);
        */
        $this->middleware('auth')
                ->except([
                    'index',
                    'contato'
                ]);
    }

    public function index()
    {
        $title = "Curso de PHP com Laravel";
        $var = [];
    	return view('site.home.index' ,compact('title','var'));
    }
    public function contato()
    {
    	return view('site.contato.indexContato');
    }
    public function categoria($id)
    {
    	return "A categoria é {$id}";
    }
    public function categoriaOp($id = null)
    {
    	return "A categoria é {$id}";
    }
}

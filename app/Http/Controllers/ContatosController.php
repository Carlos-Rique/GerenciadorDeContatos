<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatosRequest;
use App\Models\Contatos;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contatos::latest()->paginate(10);
        return view('contatos.index', [
            'contatos' => $contatos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ContatosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContatosRequest $request)
    {
        $data = $request->all();
        
       
        $date = date('Y-m-d', strtotime($request->datanascimento));
        $data['datanascimento'] = $date;

        if (isset($data['foto'])) {
        $namefile = $request->email.'.'.$request->file('foto')->extension();
        $request->file('foto')->storeAs('contatos',$namefile);
        $data['foto'] = $namefile;
        }

        Contatos::create($data);
        return redirect(route('contatos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('contatos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Contatos::find($id);
        
        return view('contatos.edit', [
        'contato' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ContatosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContatosRequest $request, $id)
    {
   
        $data = $request->all();

        $datanascimento = date('Y-m-d', strtotime($request->datanascimento));
        $data['datanascimento'] = $datanascimento;
       
        $contato = Contatos::find($id);
       
        if (isset($data['foto'])) {
            $namefile = $contato->email.'.'.$request->file('foto')->extension();
            $request->file('foto')->storeAs('contatos',$namefile);
            $data['foto'] = $namefile;
        }
    


        
        $contato->update($data);
        
        return redirect(route('contatos.index'));
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $contato = Contatos::find($id);
        $contato->delete();
        return redirect(route('contatos.index'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelContatos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

class contatosController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contatos.add_contato');
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
        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:contatos,email',
            'contact' => 'required|size:9|unique:contatos,contact'
        ];
        
        $feedback = [
            'required' => 'Este campo deve ser preenchido',
            'name.min' => 'Nomes devem conter no mínimo 5 caracteres',
            'email.unique' => 'Email já cadastrado',
            'email.email'   => 'Formato de email inválido',
            'contact.size' => 'Contato deve conter 9 caracteres',
            'contact.unique' => 'Contato já cadastrado'
        ];
        
        $validator = Validator::Make($request->all(), $rules, $feedback);

        if($validator->fails()){
            parent::flashSuccess("Erro", "Erro ao adicionar contato", "error", false, 1500);
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }        
        
        modelContatos::create([
                                'name'      => $request->input('name'),
                                'email'     => $request->input('email'),
                                'contact'   => $request->input('contact')
                            ]);

        parent::flashSuccess("Sucesso", "Contato adicionado com sucesso", "success", false, 1500);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('contatos.contato_selecionado',['contato' => modelContatos::find($id)]);
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
        return view('contatos.update_contato',['contato' => modelContatos::find($id)]);
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
        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:contatos,email,'.$id,
            'contact' => 'required|size:9|unique:contatos,contact,'.$id
        ];
        
        $feedback = [
            'required' => 'Este campo deve ser preenchido',
            'name.min' => 'Nomes devem conter no mínimo 5 caracteres',
            'email.unique' => 'Email já cadastrado',
            'email.email'   => 'Formato de email inválido',
            'contact.size' => 'Contato deve conter 9 caracteres',
            'contact.unique' => 'Contato já cadastrado'
        ];
        
        $validator = Validator::Make($request->all(), $rules, $feedback);

        if($validator->fails()){
            parent::flashSuccess("Erro", "Erro ao atualizar email", "error", false, 1500);
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        
        modelContatos::find($id)->update([
                                            'name' => $request->input('name'),
                                            'email' => $request->input('email'),
                                            'contact' => $request->input('contact')
                                        ]);

        parent::flashSuccess("Sucesso", "Contato atualizado com sucesso", "success", false, 1500);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        modelContatos::find($id)->delete();

        parent::flashSuccess("Sucesso", "Contato deletado", "success", false, 1500);
        return redirect()->route('home');
    }
}

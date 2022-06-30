<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionario = new Funcionario();
        $funcionarios = Funcionario::All();
        return view("funcionario.index", [
            "funcionario" => $funcionario,
            "funcionarios" => $funcionarios
        ]);
    }

    public function store(Request $request)
    {
        if($request->get("id") != ""){
            $funcionario = Funcionario::Find($request->get("id"));
        } else {
            $funcionario = new Funcionario();
        }
        $funcionario->nome = $request->get("nome");
        $funcionario->cpf = $request->get("cpf");
        $funcionario->save();
        $request->session()->flash("status", "salvo");
        return redirect("/funcionario");
    }

    public function edit($id)
    {
        $funcionario = Funcionario::Find($id);
        $funcionarios = Funcionario::All();
        return view("funcionario.index", [
            "funcionario" => $funcionario,
            "funcionarios" => $funcionarios
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id, Request $request)
    {
        Funcionario::Destroy($id);
        $request->session()->flash("status", "excluido");
        return redirect("/funcionario");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;

class EspecieController extends Controller
{
    public function index()
    {
        $especie = new Especie();
        $especies = Especie::All();
        return view("especie.index", [
            "especie" => $especie,
            "especies" => $especies
        ]);
    }

    public function store(Request $request)
    {
        if($request->get("id") != ""){
            $especie = Especie::Find($request->get("id"));
        } else {
            $especie = new Especie();
        }
        $especie->especie = $request->get("especie");
        $especie->raca = $request->get("raca");
        $especie->definicao = $request->get("definicao");
        $especie->save();
        $request->session()->flash("status", "salvo");
        return redirect("/especie");
    }

    public function edit($id)
    {
        $especie = Especie::Find($id);
        $especies = Especie::All();
        return view("especie.index", [
            "especie" => $especie,
            "especies" => $especies
        ]);
    }

    public function destroy($id, Request $request)
    {
        Especie::Destroy($id);
        $request->session()->flash("status", "excluido");
        return redirect("/especie");
    }
}

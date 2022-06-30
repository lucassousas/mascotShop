<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use App\Models\Especie;

class PetController extends Controller
{
    public function index()
    {
        $pets = DB::table("pet AS p")
                    ->join("especie AS e", "p.especie_id", "=", "e.id")
                    ->select("p.nome", "e.raca", "p.sexo", "p.dono")
                    ->orderByDesc("p.created_at")
                    ->get();
                    
        return view("pet.lista", [
            "pets" => $pets
        ]);
    }

    public function create()
    {
        $pet = new Pet();
        $especies = Especie::All();
        $itens = [];
        
        return view("pet.index", [
            "pet" => $pet,
            "especies" => $especies,
            "itens" => $itens
        ]);
    }

    public function store(Request $request)
    {
        if ($request->get("id") != "") {
            $pet = Pet::Find($request->get("id"));
        } else {
            $pet = new Pet();
        }
        
        $pet->nome = $request->get("nome");
        $pet->dataNasc = $request->get("dataNasc");
        $pet->sexo = $request->get("sexo");
        $pet->dono = $request->get("dono");
        $pet->especie_id = $request->get("especie_id");

        $hoje = \Carbon\Carbon::now();
        $dataNasc = \Carbon\Carbon::Parse($pet->dataNasc);

        $pet->idade = $hoje->diffInYears($dataNasc);

        $pet->save();
        $request->session()->flash("status", "salvo");
        
        return redirect("/pet/" . $pet->id . "/edit");
    }

    public function edit($id)
    {
        $pet = Pet::Find($id);
        $especies = Especie::All();
        $itens = [];
        
        return view("pet.index", [
            "pet" => $pet,
            "especies" => $especies,
            "itens" => $itens
        ]);
    }

    public function destroy($id, Request $request)
    {
        Pet::Destroy($id);
        $request->session()->flash("status", "excluido");
        return redirect("/pet");
    }
}

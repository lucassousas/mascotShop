<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $pet = new Pet();
        $pets = Pet::All();
        return view("pet.index", [
            "pet" => $pet,
            "pets" => $pets
        ]);
    }

    public function store(Request $request)
    {
        if($request->get("id") != ""){
            $pet = Pet::Find($request->get("id"));
        } else {
            $pet = new Pet();
        }
        $pet->nome = $request->get("nome");
        $pet->idade = $request->get("idade");
        $pet->dono = $request->get("dono");
        $pet->save();
        $request->session()->flash("status", "salvo");
        return redirect("/pet");
    }

    public function edit($id)
    {
        $pet = Pet::Find($id);
        $pets = Pet::All();
        return view("pet.index", [
            "pet" => $pet,
            "pets" => $pets
        ]);
    }

    public function destroy($id, Request $request)
    {
        Pet::Destroy($id);
        $request->session()->flash("status", "excluido");
        return redirect("/pet");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class  CompteController extends Controller{

    //create new Compte
    public function createCompte(Request $request){
        $compte = Compte::create($request->all());
        return response()->json($compte);
    }

    //update compte details

    public function updateCompte(Request $request, $id){
        $compte = Compte::find($id);
        $compte->codeC = $request->input('codeC');
        $compte->nomC =  $request->input('nomC');
        $compte->prenomC = $request->input('prenomC');
        $compte->telC = $request->input('telC');
        $compte->adresseC = $request->input('adresseC');
        $compte->createdAt = $request->input('createdAt');
        $compte->updateAt = $request->input('updateAt');
        $compte->passwordC = $request->input('passwordC');
        $compte->statutC = $request->input('statutC');
        $compte->save();
        return response()->json($compte);
    }


    //view compte
    public function viewCompte($id){
     $compte =  Compte::find($id);
            return response()->json($compte);
    }


    //delete compte(
    public function deleteCompte($id){
        $compte =  Compte::find($id);
        $compte->delete();

        return response()->json('Removed successfully');
    }

    //list users
    public function index(){
        $compte =Compte::all();
        return response()->json($compte);
    }

}
?>

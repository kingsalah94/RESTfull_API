<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InstituteurController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    function createInstituteur(Request $request){
        
        $nom=$request['nom'];
        $prenom=$request['prenom'];
        $dateNais=$request['date_naissance'];
        $tel=$request['tel'];
        $email=$request['email'];
        $adresse=$request['adresse'];
        $niveau=$request['niveau'];
        $password=$request['password'];
        DB::insert("INSERT INTO instituteur(nomI, prenonI, telI, emailI,adresseI, niveauI,passwordI, statut, ageI) VALUES('$nom', '$prenom', '$tel','$email', '$adresse', '$niveau', '$password', '1', '$dateNais')");
        
        return response()->json('succes');
        
    }
    function editInstituteur(Request $request, $id){
        
        $nom=$request['nom'];
        $prenom=$request['prenom'];
        $dateNais=$request['date_naissance'];
        $tel=$request['tel'];
        $email=$request['email'];
        $adresse=$request['adresse'];
        $niveau=$request['niveau'];
        $password=$request['password'];
        DB::update("UPDATE  instituteur set nomI='$nom', prenonI='$prenom', telI='$tel', emailI='$email',adresseI='$adresse', niveauI='$niveau',passwordI='$password' ,ageI='$dateNais' where idI='$id'");
        
        return response()->json('modified');
   
    }
    function deleteInstituteur(Request $request, $id){
        DB::update("UPDATE instituteur set statut='0' where idI='$id'");
        return response()->json("deleted");
    }
    function createHoraire(Request $request){
        
    }
    //
}

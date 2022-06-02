<?php

$api="instituteur";

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get("/${api}/getInstituteur/{id}", function($id):JsonResponse{
$resultat=DB::select("SELECT * from instituteur where idI=$id");

});
$router->post("/$api/createInstituteur", function(){

        $nom=$tab['nom'];
        $prenom=$tab['prenom'];
        $dateNais=$tab['date_naissance'];
        $tel=$tab['tel'];
        $email=$tab['email'];
        $adresse=$tab['adresse'];
        $niveau=$tab['niveau'];
        $password=$tab['password'];
        DB::insert("INSERT INTO instituteur(nomI, prenomI, telI, emailI,adresseI, niveauI,passwordI, statut, ageI) VALUES($nom, $prenom, $tel,$email, $adresse, $niveau, $password, 1, $dateNais)");
        return "Succes";

   
});
 $router->get("/$api/getAllInstituteur/", function(){
     $resultat= DB::select("SELECT * from instituteur");
     header('Content-Type: application/json');
     return json_encode($resultat, JSON_PRETTY_PRINT);
 });

 $router->put("/$api/updateInstituteur/{id}", function($id){
    
 });
 $router->put("/$api/deleteInstituteur/{id}", function($id){

 });


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
$router->post("/$api/createInstituteur", ['uses'=>'InstituteurController@createInstituteur']);
 $router->get("/$api/getAllInstituteur", function(){
     $resultat= DB::select("SELECT * from instituteur where statut='1'");
     header('Content-Type: application/json');
     return json_encode($resultat, JSON_PRETTY_PRINT);
 });

 $router->put("/$api/updateInstituteur/{id}", ['uses'=>'InstituteurController@editInstituteur'] );
 $router->put("/$api/deleteInstituteur/{id}", ['uses'=>'InstituteurController@deleteInstituteur']);

 $router->get("/$api/getAllInstituteurByModule/{module}", function($module){
    $resultat=DB::select("SELECT * from instituteur inner join matiere on instituteur.idI=matiere.idI where matiere.designationM='$module'");
    return response()->json($resultat);

 });
 $router->get("/$api/getAllInstituteurByAdresse/{adresse}", function($adresse){
    $resultat=DB::select("SELECT * from instituteur where adresseI='$adresse'");
    return response()->json($resultat);
 });
 $router->get("/$api/getAllInstituteurByHoraire/{horaire}", function($horaire){

 });
 $router->post("/$api/createHoraire", ['uses'=>'InstituteurController@createHoraire']);
 $router->get("/$api/getAllInstituteurByNiveau/{niveau}", function($niveau){
    $resultat=DB::select("SELECT * from instituteur 
    inner join matiere 
    inner join niveau 
    on instituteur.idI=matiere.idI and matiere.idN=niveau.idN 
    where niveau.designationN='$niveau'");
    return response()->json($resultat);
 });


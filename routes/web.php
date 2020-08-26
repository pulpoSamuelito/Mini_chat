<?php

use App\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* Route sans raccourcis
 Route::get('/', function () {
    return view('welcome');
});
 */

// Route avec raccourcis
//Route::view('/', 'welcome');

Route::get('/bonjour/{nom}', function ()
{
    /*return 'Bonjour ' . request('prenom'); */
    return view('bonjour', [
        'prenom' => request('nom')
    ]);

});

/*  route directe sans utilisation de controlleur du modèle mvc
Route::get('/inscription', function () {
    return view('inscription');
});
*/

// Route utilisant le controlleur du modèle mvc

Route::get('/inscription', 'InscriptionController@formulaire' );

Route::post('/inscription', 'InscriptionController@traitement' );

Route::get('/', 'UtilisateursController@liste' );

Route::get('/connexion', 'ConnexionController@formulaire' );

Route::post('/connexion', 'ConnexionController@traitement' );


/* // Protection de nos pages avec les middleware de façon localisée
Route::get('/mon-compte', 'CompteController@acceuil')->middleware('App\Http\Middleware\Auth');

Route::get('/deconnexion', 'CompteController@deconnexion')->middleware('App\Http\Middleware\Auth');

Route::post('/modification-mot-de-passe', 'CompteController@modificationMotDePasse')->middleware('App\Http\Middleware\Auth');

Route::post('/messages', 'MessagesController@nouveau')->middleware('App\Http\Middleware\Auth');
 */


//Protection de nos pages avec les middleware de façon groupée
Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function () {
    Route::get('/mon-compte', 'CompteController@acceuil');

Route::get('/actualites', 'ActualitesController@liste');

    Route::get('/deconnexion', 'CompteController@deconnexion');

    Route::post('/modification-mot-de-passe', 'CompteController@modificationMotDePasse');

    Route::post('/modification-avatar', 'CompteController@modificationAvatar');

    Route::post('/messages', 'MessagesController@nouveau');

    Route::post('/{email}/suivis', 'SuivisController@nouveau');

    Route::delete('/{email}/suivis', 'SuivisController@enlever');

});

//Cette route est mise à la fin pour ne soit pas prioritaire sur les autres routes car elles est générique
Route::get('/{email}', 'UtilisateursController@voir');

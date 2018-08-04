<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entity;

use App\Utilisateur;

class UtilisateurController extends Controller
{
    public function getUtilisateurview()
    {
        $entities = Entity::all();
        return view('admin.addUtilisateur',compact('entities'));
    }

    public function storeUser(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'recrutment_date' => 'date_format:Y-m-d|required',
            'matricule' => 'required',
            'entite' => 'required|numeric|exists:entities,id'
            ]);

        $entity = Entity::where('id',$request['entite'])->first();

        $utilisateur = new Utilisateur([
            'firstname' => $request['firstname'],
            'lastname'=> $request['lastname'],
            'recrutment_date'=> $request['recrutment_date'],
            'matricule'=> $request['matricule']
        ]); 
        
        $entity->utilisateurs()->save($utilisateur);

        return redirect()->route('getUse');
    }

    public function getUtilisateur()
    {
        $entities = Entity::all();
        $utilisateurs=Utilisateur::all();
        return view('admin.getUtilisateur',compact('utilisateurs', 'entities'));
    }

    // Ajaw work
    public function editUtilisateur($id)
        {
        $utilisateur = Utilisateur::find($id);
        
        return json_encode($utilisateur);
    }
    

    public function updateUtilisateur(Request $request)
    {

        $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'recrutment_date' => 'date_format:Y-m-d|required',
            'matricule' => 'required',
            'entite' => 'required|numeric|exists:entities,id'
            ]);

        $utilisateur = Utilisateur::find($request['id']);

        $utilisateur->firstname = $request['firstname'];
        $utilisateur->lastname = $request['lastname'];
        $utilisateur->recrutment_date = $request['recrutment_date'];
        $utilisateur->matricule = $request['matricule'];
        $utilisateur->entity_id = $request['entite'];
        $utilisateur->save();

        return back()->with('info','Modification avec succes');
    }

    public function getUserDelete($id)
    {
        $utilisateur=Utilisateur::find($id);
        $utilisateur->delete();
        return back()->with('info','Utilisateur supprimé avec succès');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Entity;
use App\Utilisateur;
use App\User;
use Carbon;
use App\Mail\TESTEMAIL;
use App\Events\ProjectCreated;
use App\Events\Indexshowed;
use App\Notifications\IndexOpened;

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
         
        //  Using Events
        // // event(new Indexshowed($entities, $utilisateurs));

        //Using Notification 
        auth()->user()->notify(new IndexOpened);

        return view('admin.getUtilisateur',compact('utilisateurs', 'entities'));
    }

    // Ajaw work
    public function editUtilisateur($id)
    {
        $utilisateur = Utilisateur::find($id);
        return json_encode($utilisateur);
    }

    //Ajax work affectation
    public function getInfoUser($id)
    {
        $utilisateur = Utilisateur::find($id);
        return json_encode($utilisateur);
    }
    
    //Ajax historique
    public function historiqueUtilisateur($id)
    {
        $utilisateur = Utilisateur::find($id);
        $materiels = $utilisateur->materiels;
        return json_encode($materiels);
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

    public function roleUtilisateur(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_super_admin' => 1,
        ]);

        $utilisateur = Utilisateur::find($request['id']);
        $user->utilisateurs()->save($utilisateur);

        return back()->with('info','Role Changer');
    }

    public function getUserDelete($id)
    {
        $mytime = Carbon\Carbon::now();
        
        $utilisateur=Utilisateur::find($id);
        $user_id = $utilisateur->user_id;

        //bach end_affectation li ba9in NULL dialo (zaama affecter) mayb9awch (fhem tseta :P)
        if(filled($utilisateur->materiels()->get())) {
            $mts = $utilisateur->materiels()->get();
            foreach($mts as $m)
            {
                if(is_null($m->utilisateurs->last()->pivot->end_affectation)) {
                    $utilisateur_id = $m->utilisateurs->last()->pivot->utilisateur_id;
                    $m->utilisateurs()->updateExistingPivot($utilisateur_id,['end_affectation' => $mytime->toDateString()]);
                }
            }
        }

        if( $user_id != 0) {    
            $utilisateur->delete();
            $user = User::find($user_id);
            $user->delete();
        } else {
            $utilisateur->delete();
        }

        return back()->with('info','Utilisateur supprimé avec succès');
    }
}

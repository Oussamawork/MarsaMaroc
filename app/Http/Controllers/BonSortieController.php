<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon;
use PDF;
use App\Bonsortie;
use App\Panne;
use App\Materiel;


class BonSortieController extends Controller
{
    public function getPDFPanne($id){  
        $mytime = Carbon\Carbon::now();

        $p=Panne::find($id);
        $b=new Bonsortie;
        $b->motif=$p->description;
        $b->date_sortie=$mytime->toDateString();
        $b->save();
        $b->pannes()->save($p);
        $pdf=PDF::loadView('pdf.bonsortiePanne',compact('p','b'));
        return $pdf->download('bonsortiePanne.pdf');
    }

    public function getPDFReforme($id)
    {
        $mytime = Carbon\Carbon::now();
        $sortie = $mytime->toDateString();
        $mat = Materiel::find($id);

        $pdf=PDF::loadView('pdf.bonsortieReforme',compact('mat','sortie'));

        return  $pdf->download('bonsortieReforme.pdf') ;

    }

    public function getPDFAffectation($id)
    {
        $mytime = Carbon\Carbon::now();
        $sortie = $mytime->toDateString();
        $mat = Materiel::find($id);

        $pdf=PDF::loadView('pdf.bonsortieAffectation',compact('mat','sortie'));

        return  $pdf->download('bonsortieAffectation.pdf') ;

    }
}

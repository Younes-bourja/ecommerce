<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $testcoin=Session::get('coin');
        if($testcoin==''){	
          $coins= DB::select("SELECT valeur FROM categories WHERE categorie='العملة'");
          foreach($coins as $row):
           Session::put('coin',$row->valeur);
         endforeach;  };
        $s=DB::select("SELECT * FROM commande WHERE status LIKE '%في طور الانتضار...%'");
        $tc=DB::select("SELECT * FROM commande WHERE status = 'في طور المعالجة'");
        $tcc=DB::select("SELECT * FROM commande WHERE status = 'في طور الاستلام'");
        $p=DB::select("SELECT COUNT(*) AS produit FROM produits");
        $row=DB::select("SELECT famille,COUNT(*) AS produit FROM produits GROUP BY famille;");
        $r=DB::select("SELECT MONTHNAME(date) AS d,status,COUNT(status) AS p FROM commande WHERE  status='مرسلة بنجاح' AND YEAR(date)=2023   GROUP BY status , MONTHNAME(date)  ORDER BY date ASC;");
        $r1=DB::select("SELECT MONTHNAME(date) AS d,status,COUNT(status) AS p FROM commande WHERE   status='تم الغاء الطلب' AND YEAR(date)=2023  GROUP BY status , MONTHNAME(date)  ORDER BY date ASC;");
        $r2=DB::select("SELECT MONTHNAME(date) AS d,COUNT(*) AS p FROM commande WHERE   status='تم الغاء الطلب' OR  status='مرسلة بنجاح' AND YEAR(date)=2023  GROUP BY   MONTHNAME(date)   ORDER BY date ASC;");
        $month = date('m');$year= date('Y');
        $lmonth=$month-1;
        $r3=DB::select("SELECT MONTHNAME(date) AS d,SUM(qtte) AS q,produit FROM statistique WHERE   etat='مرسلة بنجاح'  AND YEAR(date)='$year' AND MONTH(date)='$lmonth'  GROUP BY   produit,MONTHNAME(date)  ORDER BY SUM(qtte) DESC  LIMIT 10;");
        $r4=DB::select("SELECT MONTHNAME(date) AS d,SUM(qtte) AS q,produit FROM statistique WHERE   etat='مرسلة بنجاح'  AND YEAR(date)='$year' AND MONTH(date)='$month'  GROUP BY   produit,MONTHNAME(date)  ORDER BY SUM(qtte) DESC  LIMIT 10;");


        return view('administration.home',compact('p','s','tcc','tc','row','r','r1','r2','r3','r4'));
    }
}

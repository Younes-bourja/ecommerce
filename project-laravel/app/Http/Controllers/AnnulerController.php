<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Commandes;
use Illuminate\Http\Request;

class AnnulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      
        $s=DB::select("SELECT * FROM commande WHERE status LIKE '%في طور الانتضار...%'");
        $tc=DB::select("SELECT * FROM commande WHERE status = 'في طور المعالجة'");
        $tcc=DB::select("SELECT * FROM commande WHERE status = 'في طور الاستلام'");
        $l=DB::select("SELECT * FROM commande WHERE status = 'تم الغاء الطلب'");
        return view('administration.archives',compact('l','s','tcc','tc'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Commandes $commandes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commandes $commandes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commandes $commandes)
    {
        //
    }
}

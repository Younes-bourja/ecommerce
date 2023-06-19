<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\produits;
use App\Models\paniers;
use Illuminate\Http\Request;

class GestionproductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
     
        $s=DB::select("SELECT * FROM commande WHERE status LIKE '%في طور الانتضار...%'");
        $tc=DB::select("SELECT * FROM commande WHERE status = 'في طور المعالجة'");
        $tcc=DB::select("SELECT * FROM commande WHERE status = 'في طور الاستلام'");

        $p=produits::all();
   
        return view('administration.gestion-produits',compact('p','s','tcc','tc'));    }
       
      

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
        

        $validated = $request->validate([
            'reference' => 'required|unique:produits',
            
        ]);
        
        if (!file_exists('assets/img/images/'.$request['genre'])) {
            mkdir('assets/img/images/'.$request['genre'], 0777, true);
        }
          $image1=$image2=$image3=$image4="";
          if ($request->hasFile('image-principal')) {
            $randomize1 = $request["produit"]."-".rand(000, 999);
            $extension = $request->file('image-principal')->getClientOriginalExtension();
            $filename = $randomize1 . '.' . $extension;
           $image1=$filename; 
           $request->file('image-principal')->move('assets/img/images/', $filename);
        }
        if ($request->hasFile('image2')) {
            $randomize1 = $request["produit"]."-".rand(000, 999);
            $extension = $request->file('image2')->getClientOriginalExtension();
            $filename = $randomize1 . '.' . $extension;
            $image2=$filename;
            $request->file('image2')->move('assets/img/images/', $filename);
        }if ($request->hasFile('image3')) {
            $randomize1 = $request["produit"]."-".rand(000, 999);
            $extension = $request->file('image3')->getClientOriginalExtension();
            $filename=$filename = $randomize1 . '.' . $extension;
            $image3=$filename;
            $request->file('image3')->move('assets/img/images/', $filename);
        }if ($request->hasFile('image4')) {
            $randomize1 = $request["produit"]."-".rand(000, 999);
            $extension = $request->file('image4')->getClientOriginalExtension();
            $filename = $randomize1 . '.' . $extension;
            $image4=$filename;
            $request->file('image4')->move('assets/img/images/', $filename);
        }
        $desciption= $request['description'];
   
        if($desciption==""){$desciption='...';};
        produits::create([
            'fournisseur'=>$request['fournisseur'],
            'produit'=>$request['produit'],
            'famille'=>$request['genre'],
            'photo'=>$image1,
            'image1'=>$image2,
            'image2'=>$image3,
            'image3'=>$image4,
            'pv'=>$request['prix'],
            'pa'=>0,
            'description'=>$desciption,
            'reference'=>$request['reference'],
            
            
           
    ]);
        
$ref=$request['reference'];
    $s=DB::select("SELECT * FROM commande WHERE status LIKE '%في طور الانتضار...%'");
    $tc=DB::select("SELECT * FROM commande WHERE status = 'في طور المعالجة'");
    $tcc=DB::select("SELECT * FROM commande WHERE status = 'في طور الاستلام'");

    $p=DB::select("SELECT * FROM produits WHERE reference = '$ref'");
    session()->flash('add','success');
    return view('administration.gestion-produits',compact('p','s','tcc','tc'));  
    }



    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    { 
        
   
        $s=DB::select("SELECT * FROM commande WHERE status LIKE '%في طور الانتضار...%'");
        $tc=DB::select("SELECT * FROM commande WHERE status = 'في طور المعالجة'");
        $tcc=DB::select("SELECT * FROM commande WHERE status = 'في طور الاستلام'");
        $categories=DB::select("SELECT * FROM categories WHERE categorie='المنتوج' ORDER BY valeur ");

        $p=produits::all();
   
        return view('administration.nouveau-produit',compact('p','s','tcc','tc','categories'));   

       }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id=$request['m-id'];
        $prix=$request['nv-prix'];
        $p = DB::update("UPDATE  produits SET pv='$prix' WHERE id='$id' ");
        session()->flash('add','success');
        return back(); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=$request['panier-id'];
    
  if($request['panier-qtt']<100 & $request['panier-qtt']>0){
        $panier=paniers::find($id);
        $panier->update([
           'quantite'=>$request['panier-qtt'],]);
           return back()->with('successqtt','successfaly'); 
        }
        return back()->with('error','successfaly'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {   $pname=$request['pname'];  
        $ref=$request['ref'];
        $id=$request['id-delite'];
        $m1=$request['img1'];  
        $m2=$request['img2']; 
        $m3=$request['img3'];
        $m4=$request['img4'];
        $image1= public_path('assets/img/images/'.$m1); 
        $image2= public_path('assets/img/images/'.$m2);
        $image3= public_path('assets/img/images/'.$m3);
        $image4= public_path('assets/img/images/'.$m4);
        if(file_exists($image1) & $m1!=""){unlink($image1);}
        if(file_exists($image2) & $m2!=""){unlink($image2);}
        if(file_exists($image3) & $m3!=""){unlink($image3);}
        if(file_exists($image4) & $m4!=""){unlink($image4);}
        produits::find($id)->delete();
        DB::delete("DELETE FROM paniers WHERE reference = '$ref' AND produit= '$pname'");
        return back()->with('delite','data delite successfaly');
                                
   
    }
}
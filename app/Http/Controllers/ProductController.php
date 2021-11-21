<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {






         $Products=Product::all();

        return view("index")->with('Products',$Products);







    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::all();

        return view("getview",compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,['product_name'=>'required',
            'price'=>'required|numeric',
            'Production_Date'=>'date',
            'image'=>'required|image']);
       # $path = $request->file('image')->storeAs('public');

        $y=new Product();
        $y->fill($request->all());
        if($request->hasFile('image')){

            $name=$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/storage',$name);

        }
        $y['user_id']=Auth::user()->id;


        $y->save();

      $y->update(['image' => $name]);
        return view('view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  //   return view("search");





    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $Product=Product::find($id);
        $cat=Category::all();
        //
        return view('edit',compact('Product','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $y=Product::find($id);

        $y->fill($request->all());
        if($request->hasFile('image')){

            $name=$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/storage',$name);

        }

        $y->save();

        $y->update(['image' => $name]);

        return view("update");
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $y=Product::find($id)->delete();
        return redirect('/product');

    }
    public function home(){
        return view ('index');

    }
    public function search(){
        return view ('search');

    }
    public function getsearch(Request $request){
//        dd($request['query']);
//        $p=DB::table('Product')->where('category','food')->get();
//      Print_r($p);

$name=$request->get('query');
if($name) {
    $Categorys = Category::where('name', 'lIKE', '%' . $name . '%')->first();

    $Products = Product::where('category_id', '=', $Categorys->id)->get();
}
else
    $Products = Product::whereNull('category_id')->get();
    //    Print_r($Products);
    return view("index")->with('Products', $Products);


//        $search_text=$_GET('query');
//        $products=Product::where('category','LIKE','%'.$search_text.'%')->get();
//        Print_r($products);


    }
    public function gg(){
        print Auth::user()->id;
    }

    public function qq(){
       $cat=Category::all('name');

       return view('qq',compact('cat'));
    }


    public function node(){
        return view('node');
    }


    public function nodestore(Request $request){
        $nodes=new Node();
        $nodes->fill($request->all());
        $nodes->save();

    }

}

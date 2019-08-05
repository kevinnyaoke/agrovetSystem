<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Purchase;
use App\Stock;
use App\Update;
use Auth;

class CustomController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]));

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user=User::where('email',$request->email)->first();
            if($user->admin){
                return redirect()->route('dashboard');
            }
            return redirect()->route('userhome');
        }else{
                   return redirect()->back()->with('error','Your email or password is incorrect');
        }
    }

    public function dashboard(){
        $client=User::orderBy('id','asc')->where('admin','0')->paginate(100);
        return view('admin.dashboard',compact('client'));
    }

    public function delete($id){
        $client=User::find($id);
        $client->delete();
        return redirect()->back()->with('success','client deleted successfully');
    }

    public function tobuy(){
         return view('user.purchase');
    }

    public function purchase(Request $request){
          $request->validate([
           'client'=>'required',
           'contact'=>'required|max:15',
           'item'=>'required',
           'quantity'=>'required',
        
        ]);


        $purchase=Purchase::create($request->all());

            return redirect()->back()->with('success','Thank you for buying our item');

    }

    public function stock(){
        return view('admin.addstock');
    }

    public function orders(){
          $orders=Purchase::orderBy('id','desc')->paginate('15');
          return view('admin.orders',compact('orders',$orders));
    }

    public function delorder($id){
        $order=Purchase::find($id);
        $order->delete();
        return redirect()->back()->with('success','You have removed order');
    }

    public function addstock(Request $request){
        $request->validate([
            'item'=>'required',
            'quantity'=>'required',
            'bprice'=>'required|max:10',
            'sprice'=>'required|max:10|gt:"bprice"',
            'description'=>'required|max:200',

        ]);

        $stoc=Stock::create($request->all());
        return redirect()->back()->with('success','Stock is successfuly added');

    }

    public function update(){
        return view('admin.update');
    }

    public function postupdate(Request $request){
        $request->validate([
            'date'=>'required',
            'updates'=>'required',
        ]);

        $update=Update::create($request->all());
        return redirect()->back()->with('success','update status was successful');
    }

    public function items(){
        $stock=Stock::orderBy('id','desc')->paginate(10);
        $client=User::all();
        return view('user.items',['stock'=>$stock,'client'=>$client]);
    }

    public function history(){
        $user=Auth::user()->name;
        $orders=Purchase::all()->where('client',$user);
        return view('user.history',compact('orders'));
    }
   
    public function viewupdate(){
        $update=Update::orderBy('id','desc')->paginate('10');
        return view('user.update',compact('update',$update));
    }

    public function adminstock(){
        $stock=Stock::orderBy('id','desc')->paginate('15');
        return view('admin.stock',['stock'=>$stock]);
    }

    public function delstock($id){
        $stock=Stock::find($id);
        $stock->delete();
        return redirect()->back()->with('success','stock deleted successfully');
    }

    public function editstock($id){
        $stock=Stock::find($id);
        return view('admin.editstock',compact('stock',$stock));
    }

    public function updatestock(Request $request){
        $request->validate([
            'item'=>'required',
            'quantity'=>'required',
            'bprice'=>'required|max:10',
            'sprice'=>'required|max:10|gt:"bprice"',
            'description'=>'required|max:200',
        ]);

        $id=$request->input('id');
        $item=$request->input('item');
        $quantity=$request->input('quantity');
        $bprice=$request->input('bprice');
        $sprice=$request->input('sprice');
        $description=$request->input('description');

        $stock=Stock::find($id);
        if(!$stock){
            return redirect()->back()->with('error','The stock cannot be updated');
        }
         $stock->id=$id;
         $stock->item=$item;
         $stock->bprice=$bprice;
         $stock->sprice=$sprice;
         $stock->description=$description;
         $stock->update();

        $stock=Stock::orderBy('id','desc')->paginate('15');
        return redirect()->route('adminstock')->with('success','Update was successfull');
    }
    public function adminupdate(){
        $update=Update::orderBy('id','desc')->paginate('15');
        return view('admin.viewupdate',(['update'=>$update]));
    }
    public function delupdate($id){
        $update=Update::find($id);
        $update->delete();
        return redirect()->back()->with('success','update has been deleted');
    }

    public function editupdate($id){
        $update=Update::find($id);
        return view('admin.editupdate',(['update'=>$update]));
    }
    public function updateup(Request $request){
        $request->validate([
            'date'=>'required',
            'updates'=>'required',
        ]);
        $id=$request->input('id');
        $date=$request->input('date');
        $update=$request->input('updates');

        $myupdate=Update::find($id);
        if(!$update){
            return redirect()->back()->with('error','cannot update');
        }
        $myupdate->id=$id;
        $myupdate->date=$date;
        $myupdate->updates=$update;
        $myupdate->update();
        
        $update=Update::orderBy('id','desc')->paginate('15');
        return redirect()->route('viewupdate')->with('success','Update was successful');
    }
  
    public function editorder($id){
        $order=Purchase::find($id);
        return view('user.editpurchase',['order'=>$order]);
    }

    public function pupdate(Request $request){
        $request->validate([
            'client'=>'required',
            'contact'=>'required|max:15',
            'item'=>'required',
            'quantity'=>'required',
         
        ]);
        $id=$request->input('id');
        $client=$request->input('client');
        $contact=$request->input('contact');
        $item=$request->input('item');
        $quantity=$request->input('quantity');
        $description=$request->input('description');

        $pupdate=Purchase::find($id);
        if(!$pupdate){
            return redirect()->back()->with('error','cannot update!');
        }
        
        $pupdate->id=$id;
        $pupdate->client=$client;
        $pupdate->contact=$contact;
        $pupdate->item=$item;
        $pupdate->quantity=$quantity;
        $pupdate->description=$description;
        $pupdate->update();
        
        $user=Auth::user()->name;
        $orders=Purchase::all()->where('client',$user);
        return view('user.history',(['orders'=>$orders]))->with('success','update was successsful');

    }
}
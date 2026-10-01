<?php
namespace App\Http\Controllers;
use App\Models\{User,Event,Order,Ticket};
use Illuminate\Http\Request;
class AdminController extends Controller {
 public function dashboard(){ $stats=['users'=>User::count(),'events'=>Event::count(),'orders'=>Order::where('status','paid')->count(),'revenue'=>Order::where('status','paid')->sum('total'),'tickets'=>Ticket::count()];$recent=Order::with('user')->latest()->take(8)->get();return view('admin.dashboard',compact('stats','recent'));}
 public function users(){return view('admin.users',['users'=>User::latest()->paginate(15)]);}
 public function updateRole(Request $request,User $user){$data=$request->validate(['role'=>'required|in:admin,organizer,customer,staff']);$user->update($data);return back()->with('success','Rol actualizado.');}
 public function events(){return view('admin.events',['events'=>Event::with('organizer')->latest()->paginate(15)]);}
 public function updateEventStatus(Request $request,Event $event){$data=$request->validate(['status'=>'required|in:draft,published,cancelled,finished']);$event->update($data);return back()->with('success','Estado actualizado.');}
}

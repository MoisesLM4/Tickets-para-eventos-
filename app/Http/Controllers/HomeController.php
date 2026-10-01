<?php
namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
class HomeController extends Controller {
 public function index(){ $events=Event::published()->with('ticketTypes')->orderBy('start_at')->take(6)->get(); return view('home.index',compact('events')); }
 public function dashboard(Request $request){ return match($request->user()->role){ 'admin'=>redirect()->route('admin.dashboard'), 'organizer'=>redirect()->route('organizer.dashboard'), default=>redirect()->route('orders.index')}; }
}

<?php
namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
class EventController extends Controller {
 public function index(Request $request){$q=Event::published()->with('ticketTypes');if($request->filled('q')){$term=$request->q;$q->where(fn($x)=>$x->where('title','like',"%$term%")->orWhere('city','like',"%$term%")->orWhere('category','like',"%$term%"));}if($request->filled('city'))$q->where('city',$request->city);$events=$q->orderBy('start_at')->paginate(9)->withQueryString();$cities=Event::published()->distinct()->orderBy('city')->pluck('city');return view('events.index',compact('events','cities'));}
 public function show(Event $event){abort_unless($event->status==='published',404);$event->load('ticketTypes','organizer');return view('events.show',compact('event'));}
}

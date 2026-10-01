<?php
namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TicketController extends Controller {
 public function index(Request $request){$tickets=$request->user()->orders()->with('tickets.ticketType.event')->get()->pluck('tickets')->flatten()->sortByDesc('created_at');return view('tickets.index',compact('tickets'));}
 public function validateTicket(Request $request,Ticket $ticket){abort_unless(in_array($request->user()->role,['admin','organizer','staff'],true),403);if($ticket->status!=='valid')return back()->withErrors(['ticket'=>'La entrada ya fue utilizada o está cancelada.']);$ticket->update(['status'=>'used','used_at'=>now()]);return back()->with('success','Entrada validada correctamente: '.$ticket->code);}
}

<?php
namespace App\Http\Controllers;
use App\Models\{Event,Order,TicketType};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class OrderController extends Controller {
 public function index(Request $request){$orders=$request->user()->orders()->with('items.ticketType.event')->latest()->paginate(10);return view('tickets.orders',compact('orders'));}
 public function show(Request $request,Order $order){abort_unless($order->user_id===$request->user()->id,403);$order->load('items.ticketType.event','tickets.ticketType.event');return view('tickets.order',compact('order'));}
 public function store(Request $request,Event $event){$data=$request->validate(['ticket_type_id'=>'required|integer|exists:ticket_types,id','quantity'=>'required|integer|min:1|max:10','holder_name'=>'required|string|max:120']);$type=$event->ticketTypes()->whereKey($data['ticket_type_id'])->firstOrFail();if($type->available()<$data['quantity'])return back()->withErrors(['quantity'=>'No hay suficientes entradas disponibles.']);$order=null;DB::transaction(function()use($request,$data,$type,&$order){$total=$type->price*$data['quantity'];$order=$request->user()->orders()->create(['code'=>'ORD-'.strtoupper(Str::random(10)),'total'=>$total,'status'=>'paid','payment_method'=>'demo']);$item=$order->items()->create(['ticket_type_id'=>$type->id,'quantity'=>$data['quantity'],'unit_price'=>$type->price,'subtotal'=>$total]);$type->increment('sold',$data['quantity']);for($i=0;$i<$data['quantity'];$i++)$order->tickets()->create(['ticket_type_id'=>$type->id,'holder_name'=>$data['holder_name'],'status'=>'valid']);});return redirect()->route('orders.show',$order)->with('success','Compra realizada. Tus entradas digitales están listas.');}
}

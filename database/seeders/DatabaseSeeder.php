<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{User,Event,TicketType};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder {
 public function run(): void {
  $admin=User::create(['name'=>'Administrador','email'=>'admin@entradasperu.test','password'=>Hash::make('Admin12345'),'role'=>'admin','phone'=>'999999999']);
  $org=User::create(['name'=>'Eventos Perú','email'=>'organizador@entradasperu.test','password'=>Hash::make('Organizador123'),'role'=>'organizer','phone'=>'988888888']);
  $client=User::create(['name'=>'Cliente Demo','email'=>'cliente@entradasperu.test','password'=>Hash::make('Cliente12345'),'role'=>'customer','phone'=>'977777777']);
  $events=[
   ['title'=>'Concierto Folclórico - Lima','category'=>'Concierto','venue'=>'Estadio Nacional','city'=>'Lima','address'=>'Av. José Díaz s/n','description'=>'Noche de música peruana con artistas invitados y experiencia familiar.','start_at'=>now()->addDays(12)->setTime(20,0),'featured'=>true],
   ['title'=>'Festival Gastronómico Andino','category'=>'Festival','venue'=>'Centro de Convenciones','city'=>'Cusco','address'=>'Cusco','description'=>'Sabores tradicionales, productores locales y demostraciones culinarias.','start_at'=>now()->addDays(20)->setTime(11,0),'featured'=>true],
   ['title'=>'Innovación Digital Perú 2026','category'=>'Conferencia','venue'=>'Centro de Exposiciones','city'=>'Arequipa','address'=>'Arequipa','description'=>'Charla y networking sobre tecnología, software e innovación.','start_at'=>now()->addDays(30)->setTime(9,0),'featured'=>false],
  ];
  foreach($events as $data){$event=$org->events()->create($data+['slug'=>Str::slug($data['title']).'-'.Str::random(5),'status'=>'published']);$event->ticketTypes()->create(['name'=>'General','description'=>'Acceso general','price'=>35,'capacity'=>300]);$event->ticketTypes()->create(['name'=>'VIP','description'=>'Acceso preferencial','price'=>80,'capacity'=>80]);}
 }
}

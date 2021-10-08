<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Event;
use App\Models\event_users;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
class Calendar extends Component
{
    public $events = [];
    public function render()
    {
        $event_id = DB::table('event_users')->where('user_id' , auth()->user()->id)->pluck('event_id')->toArray();
        $this->events = json_encode(Event::whereIn('id' , $event_id)->get()); 
        return view('livewire.calendar');
        
    }

    public function eventChange($event)
    {
        $e = Event::find($event['id']);
        $e->start = $event['start'];
        if(Arr::exists($event, 'end')) {
            $e->end = $event['end'];
        }
        $e->save();
    }

    public function eventAdd($event)
    {
    $event = Event::create($event);
    $event->id;
    $rel = new event_users() ; 
    $rel->user_id = auth()->user()->id ; 
    $rel->event_id =  $event->id;
    $rel->save();
    }

    public function eventRemove($id)
    {
        Event::destroy($id);
    }

   

}
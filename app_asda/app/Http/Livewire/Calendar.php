<?php

namespace App\Http\Livewire;
use App\Models\Event_live;
use Livewire\Component;

class Calendar extends Component
{
    public $events = '';

    public function getevent()
    {
        $events = Event_live::select('id','title','start')->get();

        return  json_encode($events);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        Event_live::create($input);
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function eventDrop($event, $oldEvent)
    {
        if (isset($event['id'])) {
            $eventdata = Event_live::find($event['id']);}
       
        $eventdata->start = $event['start'];
        $eventdata->save();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $events = Event_live::select('id','title','start')->get();

        $this->events = json_encode($events);

        return view('livewire.calendar');
    }
}

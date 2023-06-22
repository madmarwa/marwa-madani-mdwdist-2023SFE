<?php

namespace App\Http\Controllers\event;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventsRequest;
use App\Repository\EventRepositoryInterface;

class EventController extends Controller
{
    protected $event;

    public function __construct(EventRepositoryInterface $events)
    {
        $this->event = $events;
    }
    
    public function index()
    {
        return $this->event->getAllEvents();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->event->createEvent();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventsRequest $request)
    {
      
        return $this->event->store( $request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $events = $this->event->editEvent($id);
        if ($events->eventSansVente){
             return view('pages.Event.Edit_sansvent', compact('events'));
        }
        else
        $products = product::pluck('produit', 'id');
        $totalProducts = product::count();
        return view('pages.Event.Edit_avecvent', compact('events', 'products', 'totalProducts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->has('fraisEvent')) {
             return $this->event->updateEventSansVente($request);
        } else {
           return $this->event->updateEventAvecVente($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->event->deleteEvent($request->id);
    }
}

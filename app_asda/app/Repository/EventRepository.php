<?php

namespace App\Repository;

use Exception;
use App\Models\Event;
use App\Models\product;
use Livewire\WithFileUploads;
use App\Models\EventAvecVente;
use App\Models\EventSansVente;
use App\Http\Livewire\VenteProduits;
use Illuminate\Support\Facades\Validator;

class EventRepository implements EventRepositoryInterface
{
    public function getAllEvents()
    {
        $events = Event::all();

        return view('pages.Event.Events', compact('events'));
    }
    public function store($request)
    {
        if ($request->input('type-vente') === 'avec-vente') {
            return $this->storeEventAvecVente($request);
        } elseif ($request->input('type-vente') === 'sans-vente') {
            return $this->storeEventSansVente($request);
        }
    }
    public function storeEventAvecVente($request)
    {
        try {
            $event = new Event();
            $event->nameEvent = [
                'fr' => $request->nameEvent_en,
                'ar' => $request->nameEvent_ar
            ];
            $event->lieuEvent = [
                'fr' => $request->lieuEvent_en,
                'ar' => $request->lieuEvent_ar
            ];
            $event->date = $request->date;
            $event->description = $request->description;
            $event->save();
    
            // Supprimer les produits sélectionnés
            $nbrProducts = count($request->selectedProducts ?? []);
            $selectedProducts = $request->selectedProducts;
            if (!empty($selectedProducts)) {
                Product::whereIn('id', $selectedProducts)->delete();
            }
    
            // Créer une instance de EventAvecVente et l'associer à l'événement
            $eventAvecVente = new EventAvecVente();
            $eventAvecVente->nbreProdVend = $nbrProducts;
            $eventAvecVente->Totale_vent = $request->Totale_vent;
            // Autres actions à effectuer en cas de succès
            // ...
    
            $event->eventAvecVente()->save($eventAvecVente);
    
            toastr()->success(trans('messages.success'));
            return redirect()->route('events.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    

    public function storeEventSansVente($request)
    {
        try {
            $event = new Event();
            $event->nameEvent = [
                'fr' => $request->nameEvent_en,
                'ar' => $request->nameEvent_ar
            ];
            $event->lieuEvent = [
                'fr' => $request->lieuEvent_en,
                'ar' => $request->lieuEvent_ar
            ];
            $event->date = $request->date;
            $event->description = $request->description;
            $event->save();

            // Créez une instance de EventSansVente et associez-la à l'événement
            $eventSansVente = new EventSansVente();
            $eventSansVente->fraisEvent = $request->fraisEvent;

            $event->eventSansVente()->save($eventSansVente);

            toastr()->success(trans('messages.success'));
            return redirect()->route('events.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function createEvent()
    {
        $event = new Event();
        $products = product::pluck('produit', 'id');
        $totalProducts = product::count();

        return view('pages.Event.create', compact('event', 'totalProducts', 'products'));
    }

    public function editEvent($id)
    {
       
        return $event= Event::findOrFail($id);
        
    }

    public function updateEventAvecVente($request)
    {
        try {
            $event = Event::findOrFail($request->id);
            $eventAvecVente = $event->eventAvecVente;
            $event->nameEvent = [
                'fr' => $request->nameEvent_en,
                'ar' => $request->nameEvent_ar
            ];
            $event->lieuEvent = [
                'fr' => $request->lieuEvent_en,
                'ar' => $request->lieuEvent_ar
            ];
            $event->date = $request->date;
            $event->description = $request->description;
          
          
            $nbrProducts = count($request->selectedProducts ?? []);
            $selectedProducts = $request->selectedProducts;
            if (!empty($selectedProducts)) {
                Product::whereIn('id', $selectedProducts)->delete();
            }
    
            $eventAvecVente->nbreProdVend = $nbrProducts ;
          
            $eventAvecVente->Totale_vent = $request->Totale_vent;
           
            $eventAvecVente->save();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('events.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function updateEventSansVente($request)
    {
        try {
            $event = Event::findOrFail($request->id);
            $event->nameEvent = [
                'fr' => $request->nameEvent_fr,
                'ar' => $request->nameEvent_ar
            ];
            $event->lieuEvent = [
                'fr' => $request->lieuEvent_fr,
                'ar' => $request->lieuEvent_ar
            ];
            $event->date = $request->date;
            $event->description = $request->description;
            $event->save();

            //$event->eventSansVente->fraisEvent = $request->fraisEvent;
           // $event->eventSansVente->update();
            $event->eventSansVente->update($request->all());

            toastr()->success(trans('messages.Update'));
            return redirect()->route('events.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function deleteEvent($id)
    {
        Event::findOrFail($id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('events.index');
    }
}

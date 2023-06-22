<?php

namespace App\Repository;

interface EventRepositoryInterface
{
    public function getAllEvents();
    public function storeEventSansVente($request);
    public function createEvent();
    public function storeEventAvecVente($request);
    public function updateEventAvecVente($request);
    public function updateEventSansVente($request);
   // public function deleteEvent_sans($eventSansVente);
    //public function deleteEventavec($eventAvecVente);
    public function deleteEvent($id);
    public function editEvent($id);
    public function store($request);
}

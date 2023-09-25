<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientEventRequest;
use App\Http\Requests\StoreClientEventRequest;
use App\Http\Requests\UpdateClientEventRequest;
use App\Models\Client;
use App\Models\ClientEvent;
use App\Models\EventTitle;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientEventsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientEvents = ClientEvent::with(['event', 'client', 'created_by'])->get();

        $event_titles = EventTitle::get();

        $clients = Client::get();

        $users = User::get();

        return view('admin.clientEvents.index', compact('clientEvents', 'clients', 'event_titles', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = EventTitle::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clientEvents.create', compact('clients', 'events'));
    }

    public function CreatewithMod($event,$id)
    {
        abort_if(Gate::denies('client_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = EventTitle::where('id',$event)->pluck('title', 'id');

        $clients = Client::where('id',$id)->pluck('name', 'id');

        return view('admin.clientEvents.CreatewithMod', compact('clients', 'events'));
    }

    public function store(StoreClientEventRequest $request)
    {
        $clientEvent = ClientEvent::create($request->all());

//        return redirect()->back('admin.client-events.index');
        return redirect()->back()->with('message',trans('global.update_success'));

    }

    public function edit(ClientEvent $clientEvent)
    {
        abort_if(Gate::denies('client_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = EventTitle::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientEvent->load('event', 'client', 'created_by');

        return view('admin.clientEvents.edit', compact('clientEvent', 'clients', 'events'));
    }

    public function EditWithModel(ClientEvent $clientEvent)
    {
        abort_if(Gate::denies('client_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = EventTitle::where('id',$clientEvent->event_id)->pluck('title', 'id');

        $clients = Client::where('id',$clientEvent->client_id)->pluck('name', 'id');

        $clientEvent->load('event', 'client', 'created_by');

        return view('admin.clientEvents.EditWithModel', compact('clientEvent', 'clients', 'events'));
    }

    public function update(UpdateClientEventRequest $request, ClientEvent $clientEvent)
    {
        $clientEvent->update($request->all());

//        return redirect()->route('admin.client-events.index');
        return redirect()->back()->with('message',trans('global.update_success'));

    }

    public function show(ClientEvent $clientEvent)
    {
        abort_if(Gate::denies('client_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientEvent->load('event', 'client', 'created_by');

        return view('admin.clientEvents.show', compact('clientEvent'));
    }

    public function withMod($id)
    {
        abort_if(Gate::denies('client_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $clientEvent=ClientEvent::where('id',$id)->with('event', 'client', 'created_by')->first();

        return view('admin.clientEvents.Modelshow', compact('clientEvent'));
    }

    public function destroy(ClientEvent $clientEvent)
    {
        abort_if(Gate::denies('client_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientEvent->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientEventRequest $request)
    {
        ClientEvent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

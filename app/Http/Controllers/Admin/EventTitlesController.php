<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventTitleRequest;
use App\Http\Requests\StoreEventTitleRequest;
use App\Http\Requests\UpdateEventTitleRequest;
use App\Models\EventTitle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventTitlesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_title_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventTitles = EventTitle::all();

        return view('admin.eventTitles.index', compact('eventTitles'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_title_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventTitles.create');
    }

    public function store(StoreEventTitleRequest $request)
    {
        $eventTitle = EventTitle::create($request->all());

        return redirect()->route('admin.event-titles.index');
    }

    public function edit(EventTitle $eventTitle)
    {
        abort_if(Gate::denies('event_title_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventTitles.edit', compact('eventTitle'));
    }

    public function update(UpdateEventTitleRequest $request, EventTitle $eventTitle)
    {
        $eventTitle->update($request->all());

        return redirect()->route('admin.event-titles.index');
    }

    public function show(EventTitle $eventTitle)
    {
        abort_if(Gate::denies('event_title_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventTitle->load('eventClientEvents');

        return view('admin.eventTitles.show', compact('eventTitle'));
    }

    public function destroy(EventTitle $eventTitle)
    {
        abort_if(Gate::denies('event_title_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventTitle->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventTitleRequest $request)
    {
        EventTitle::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

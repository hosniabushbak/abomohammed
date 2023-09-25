<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceProviderRequest;
use App\Http\Requests\StoreServiceProviderRequest;
use App\Http\Requests\UpdateServiceProviderRequest;
use App\Models\ServiceProvider;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceProviderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceProviders = ServiceProvider::all();

        return view('admin.serviceProviders.index', compact('serviceProviders'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_provider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.serviceProviders.create');
    }

    public function store(StoreServiceProviderRequest $request)
    {
        $serviceProvider = ServiceProvider::create($request->all());

        return redirect()->route('admin.service-providers.index');
    }

    public function edit(ServiceProvider $serviceProvider)
    {
        abort_if(Gate::denies('service_provider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.serviceProviders.edit', compact('serviceProvider'));
    }

    public function update(UpdateServiceProviderRequest $request, ServiceProvider $serviceProvider)
    {
        $serviceProvider->update($request->all());

        return redirect()->route('admin.service-providers.index');
    }

    public function show(ServiceProvider $serviceProvider)
    {
        abort_if(Gate::denies('service_provider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceProvider->load('providerClients');

        return view('admin.serviceProviders.show', compact('serviceProvider'));
    }

    public function destroy(ServiceProvider $serviceProvider)
    {
        abort_if(Gate::denies('service_provider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceProvider->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceProviderRequest $request)
    {
        ServiceProvider::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

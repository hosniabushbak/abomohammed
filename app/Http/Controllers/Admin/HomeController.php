<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\EventTitle;
use App\Models\HeadSection;
use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HomeController
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        if ($request->ajax()) {
            $query = Client::with(['user','provider','created_by'])->orderBy('id','desc')->select(sprintf('%s.*', (new Client())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'client_show';
                $editGate = 'client_edit';
                $deleteGate = 'client_delete';
                $crudRoutePart = 'clients';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', 'admin.clients.partials.id');
            $table->editColumn('name', 'admin.clients.partials.name');
//            $table->editColumn('arrived','admin.clients.partials.arrived');
            $table->editColumn('email', 'admin.clients.partials.email');
            $table->editColumn('phone','admin.clients.partials.phone');
            $table->editColumn('note','admin.clients.partials.note');
            $table->addColumn('provider_name', function ($row) {
                return view('admin.clients.partials.provider_name',compact('row'));
            });
            $table->addColumn('user_name', function ($row) {
                return view('admin.clients.partials.user_name',compact('row'));
            });
            $table->editColumn('seriousness', function ($row) {
                return view('admin.clients.partials.seriousness',compact('row'));
            });
            $table->editColumn('ClientEvents', function ($row) {
                return view('admin.clients.partials.ClientEvents',compact('row'));
            });

            $table->rawColumns(['actions', 'placeholder', 'user','provider']);

            return $table->make(true);
        }
        $headsection = HeadSection::latest()->first();
        $hid = $headsection->id;
        $count = Client::get()->count();
        $newcount = Client::whereHas('eventheads', function ($query) use ($hid) {
            return $query->where('head_section_id', $hid);
        })->get()->count();
        $titles = EventTitle::get();
        $users = User::get();
        $blocks1 = EventTitle::get();
        $head_sections = HeadSection::get();
        $providers = ServiceProvider::get();

        return view('home', compact('providers','count','newcount','titles','users','blocks1','head_sections'));
    }
}

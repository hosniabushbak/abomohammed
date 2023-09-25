<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\SendUserCRM;
use App\Http\Requests\MassDestroyClientRequest;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Mail\EmptyPhoneUserMailer;
use App\Mail\Mailer;
use App\Mail\UserMailer;
use App\Models\Client;
use App\Models\EventTitle;
use App\Models\HeadSection;
use App\Models\ServiceProvider;
use App\Models\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;


class ClientsController extends Controller
{
    use SendUserCRM;

    public function index(Request $request)
    {

        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->ajax()) {
            $query = Client::with(['eventheads','provider','user', 'created_by'])->orderBy('id','desc')->select(sprintf('%s.*', (new Client())->table));
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
            $table->addColumn('event_head', function ($row) {
                return view('admin.clients.partials.event_head',compact('row'));
            });
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

            $table->rawColumns(['actions', 'placeholder', 'event_head', 'user','provider']);

            return $table->make(true);
        }

        $users = User::get();
        $titles = EventTitle::get();
        $head_sections = HeadSection::get();
        $providers = ServiceProvider::get();



        return view('admin.clients.index', compact('users','providers','head_sections','titles'));
    }


    public function emails(Request $request)
    {
        abort_if(Gate::denies('Email_client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
//            $query = Client::with(['user', 'created_by'])->orderBy('seriousness','desc')->select(sprintf('%s.*', (new Client())->table));
            $query = DB::table('clients')->get();
            $table = Datatables::of($query);
            $table->addColumn('placeholder', '&nbsp;');
            $table->editColumn('id', 'admin.clients.partials.id');
            $table->editColumn('name', 'admin.clients.partials.name');
//            $table->addColumn('event_head', function ($row) {
//                return view('admin.clients.partials.event_head',compact('row'));
//            });
            $table->editColumn('email', 'admin.clients.partials.email');

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        return view('admin.clients.emails');
    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $eventheads = HeadSection::pluck('title_ar', 'id');

        return view('admin.clients.create', compact('eventheads', 'users'));
    }


    public function sendToCrm () {
        $users = Client::where('is_send', 0)->get();
        foreach ($users as $user) {
            if ($user->is_send == 0) {
                $x = $this->sendUserToCRM2($user, 7);

                $user->update(['is_send' => 1]);
            }
        }
        echo "ok";
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->all());
        $client->eventheads()->sync($request->input('eventheads', []));

        $this->sendUserToCRM($client, 7);

        return redirect()->route('admin.clients.index');
    }

    public function edit(Client $client)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $eventheads = HeadSection::pluck('title_ar', 'id');

        $client->load('eventheads','user');
        return view('admin.clients.edit', compact('client','eventheads', 'users'));
    }

    public function EditSeirsWithModel($id)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $client = Client::where('id',$id)->first();
        return view('admin.clients.EditSeirsWithModel', compact('client', ));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());

        if ($request->input('eventheads', []) != null)
        $client->eventheads()->sync($request->input('eventheads', []));

//        return redirect()->route('admin.clients.index');
        return redirect()->back()->with('message',trans('global.update_success'));

    }

    public function transfare($id,$luid,$tuid,$t){
        $clients=Client::where('id','>',$id)
            ->where('user_id',$luid)
            ->take($t)
            ->get();
        foreach ($clients as $client){
            $client->user_id = $tuid;
            $client->created_by_id = $tuid;
            if($client->save()){
                $client = Client::where('id',$client->id)->first();
                        $data=[
            'title'=>'عميل جديد في قائمتك',
            'name'=>$client->user->name,
            'advisorsphone'=>$client->user->phone,
            'clientname' => $client->name,
            'phone'=>$client->phone,
            'email'=>$client->email
        ];
//            Mail::to($client->user->email)->send(new Mailer($data));
//            Mail::to($client->email)->send(new UserMailer($data));
            echo 'The Client :'.$client->id.'-'.$client->name.' Has been transferred From Advisor Number : '.$luid.' To Advisor  : '. $client->user_id.'-'.$client->user->name.'<br />';

            }


            foreach ($client->clientClientEvents as $dd){
                $dd->created_by_id = $tuid;
                $dd->save();

            }
        }


    }

    public function PhoneEmpty(){
        $clients = Client::where('phone', '=', '')
            ->orWhereNull('phone')->get();
        foreach ($clients as $client){
                $data=[
                    'title'=>'يرجى إكمال بياناتك',
                    'name'=>$client->user->name,
                    'advisorsphone'=>$client->user->phone,
                    'clientname' => $client->name,
                    'phone'=>$client->phone,
                    'email'=>$client->email
                ];
                Mail::to($client->email)->send(new EmptyPhoneUserMailer($data));
                echo 'تم الإرسال إلى : '.$client->name .'<br />';
        }


    }
    public function show(Client $client)
    {
        abort_if(Gate::denies('client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->load('user', 'clientClientEvents', 'clientAnswers');

        return view('admin.clients.show', compact('client'));
    }

    public function destroy(Client $client)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $client->clientClientEvents()->delete();
        $client->clientAnswers()->delete();
        $client->delete();
        return back();
    }

    public function massDestroy(MassDestroyClientRequest $request)
    {
        $clients =Client::whereIn('id', request('ids'))->get();
        foreach ($clients as $client){
            $client->clientClientEvents()->delete();
            $client->clientAnswers()->delete();
            $client->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

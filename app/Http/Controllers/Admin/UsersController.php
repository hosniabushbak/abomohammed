<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\EventTitle;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles'])->get();

        $roles = Role::get();

        return view('admin.users.index', compact('roles', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function updateactive($user)
    {
        $user=User::where('id',$user)->first();
        if ($user->orders == 0)
            $user->orders = 1;
        else
            $user->orders = 0;

        $user->save();
        return redirect()->route('admin.users.index')->with('message', __('global.update_success'));
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'userClients', 'userUserAlerts');
        $blocks=EventTitle::get();

        return view('admin.users.show', compact('user','blocks'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        foreach($user->userClients as $client ){
            $client->user_id = null;
            $client->created_by_id = null;
            $client->save();
//            echo 'new advisor is : '.$client->user_id;
        }

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        $users = User::whereIn('id', request('ids'))->get();
        foreach ($users as $user){
            foreach($user->userClients as $client ){
                $client->user_id = null;
                $client->created_by_id = null;
                $client->save();
//            echo 'new advisor is : '.$client->user_id;
            }

            $user->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

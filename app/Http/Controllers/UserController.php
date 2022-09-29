<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Site;
use App\Models\User;
use App\Services\HashService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        foreach ($users as  $user) {
            $user->uid = HashService::encode($user->id);
            unset($user->id);
        }
        $data = ['title' => 'Usuários', 'usuarios' => $users];
        return Inertia::render('Admin/Users', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = Site::select('id', 'name')->get();

        foreach ($sites as $site) {
            $site->uid = HashService::encode($site->id);
            unset($site->id);
        }

        $data = [
            'title' => 'Adicionar usuário',
            'form' => [
                'name' => '',
                'email' => '',
                'password' => '',
                'is_admin' => '',
                'site_id' => '',
            ],
            'sites' => $sites
        ];
        return Inertia::render('Admin/User', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $input = $request->all();
        $input['site_id'] = $request->site_id ? HashService::decode($request->site_id) : null;
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        return redirect()->route('usuarios')->toast('Usuário cadastrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $sites = Site::select('id', 'name')->get();

        foreach ($sites as $site) {
            $site->uid = HashService::encode($site->id);
            unset($site->id);
        }

        $user = $user->findOrFail(HashService::decode($id));
        unset($user->id);
        $user->uid = $id;
        $user->site_id = HashService::encode($user->site_id);
        $data = [
            'title' => 'Editar usuário ' . $user->name,
            'form' => $user,
            'sites' => $sites
        ];
        return Inertia::render('Admin/User', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user, $id)
    {
        $input = $request->all();
        $input['site_id'] = $request->site_id ? HashService::decode($request->site_id) : null;
        $user = $user->findOrFail(HashService::decode($id));
        $user->fill($input)->save();
        return redirect()->route('usuarios')->toast('Usuário atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $user = $user->findOrFail(HashService::decode($id));
        $user->delete();
        return redirect()->route('usuarios')->toast('Usuário removido');
    }
}

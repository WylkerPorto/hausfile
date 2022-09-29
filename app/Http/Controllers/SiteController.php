<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Site;
use App\Services\HashService;
use Inertia\Inertia;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::paginate();

        foreach ($sites as $site) {
            $site->uid = HashService::encode($site->id);
            unset($site->id);
        }
        $data = ['title' => 'Sites', 'sites' => $sites];
        return Inertia::render('Admin/Sites', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['title' => 'Criar site', 'form' => [
            'name' => '',
            'url' => '',
            'tags' => '',
            'description' => '',
            'active' => false
        ]];
        return Inertia::render('Admin/Site', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiteRequest $request)
    {
        Site::create($request->all());
        return redirect()->route('sites')->toast('Site criado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site, $id)
    {
        $site = $site->findOrFail(HashService::decode($id));
        unset($site->id);
        $site->uid = $id;
        $data = ['title' => 'Editar site ' . $site->name, 'form' => $site];
        return Inertia::render('Admin/Site', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiteRequest  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiteRequest $request, Site $site, $id)
    {
        $site = $site->findOrFail(HashService::decode($id));
        $site->fill($request->all())->save();
        return redirect()->route('sites')->toast('Site atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site, $id)
    {
        $site = $site->findOrFail(HashService::decode($id));
        $site->delete();
        return back()->toast('Site removido');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Services\HashService;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $properties = Property::where('user_id', $user->id)->paginate();
        foreach ($properties as $property) {
            $property->uid = HashService::encode($property->id);
            $property->user_id = HashService::encode($property->user_id);
            unset($property->id);
        }
        $data = ['properties' => $properties];
        return Inertia::render('Properts/Index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $data = [
            'form' => [
                'name' => '',
                'city' => '',
                'country' => '',
                'zipcode' => '',
                'tenant' => '',
                'user_id' => HashService::encode($user->id),
            ]
        ];
        return Inertia::render('Properts/Create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = HashService::decode($request->user_id);
        Property::create($input);
        return redirect()->route('dashboard')->toast('Property has been registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find(HashService::decode($id));
        $property->uid = HashService::encode($property->id);
        $property->user_id = HashService::encode($property->user_id);
        unset($property->id);

        $data = ['property' => $property];
        return Inertia::render('Properts/Show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find(HashService::decode($id));
        $property->uid = HashService::encode($property->id);
        $property->user_id = HashService::encode($property->user_id);
        unset($property->id);

        $data = ['property' => $property];
        return Inertia::render('Properts/Edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, $id)
    {
        $property = Property::find(HashService::decode($id));
        $req = $request->all();
        $req['user_id'] = HashService::decode($req['user_id']);
        $property->fill($req);
        $property->update();

        return back()->toast('Property updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find(HashService::decode($id));
        $property->delete();

        return redirect()->route('dashboard')->toast('Property has been removed');
    }
}

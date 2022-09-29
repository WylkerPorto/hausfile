<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use App\Services\HashService;
use Inertia\Inertia;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($site)
    {
        $imgs = [];
        try {
            $imgs = Image::where('site_id', HashService::decode($site))->get();
            foreach ($imgs as  $img) {
                $img->uid = HashService::encode($img->id);
                unset($img->id);
            }
        } finally {
            return Inertia::share('data', $imgs);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        $input = $request->all();
        $input['site_id'] = HashService::decode($request->site_id);
        $img = Image::create($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image, $site)
    {
        $imgs = Image::where('site_id', HashService::decode($site))->get();
        foreach ($imgs as  $img) {
            $img->uid = HashService::encode($img->id);
            $img->site_id = $site;
            unset($img->id);
        }

        return $imgs;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageRequest  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageRequest $request, Image $image, $id)
    {
        $input = $request->all();
        $input['site_id'] = HashService::decode($request->site_id);
        $image = $image->findOrFail(HashService::decode($id));
        $image->fill($input)->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image, $id)
    {
        $image = $image->findOrFail(HashService::decode($id));
        $image->delete();
    }
}

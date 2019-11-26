<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\Http\Requests\AdRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ads = Ad::all();
        return view('ads.index', ['ads' => $ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $categories = Category::all();
        return view('ads.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdRequest $request
     * @return Response
     */
    public function store(AdRequest $request)
    {
        Ad::create($this->preparedData($request));
        return redirect()->route('ad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Ad $ad
     * @return Response
     */
    public function show(Ad $ad)
    {
        return view('ads.show', ['ad' => $ad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ad $ad
     * @return Response
     */
    public function edit(Ad $ad)
    {
        $categories = Category::all();
        return view('ads.edit', [
            'ad' => $ad,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdRequest $request
     * @param Ad $ad
     * @return Response
     */
    public function update(AdRequest $request, Ad $ad)
    {
        $ad->update($this->preparedData($request));
        return redirect()->route('ad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ad $ad
     * @return Response
     * @throws Exception
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->route('ad.index');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function preparedData(Request $request): array
    {
        $prepared = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'phone' => $request->input('phone'),
            'category_id' => $request->input('category'),
            'user_id' => auth()->user()->id,
        ];

        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $request->file('image')->storeAs('public/images',$name);
            $prepared['image'] = $name;
        }
        return $prepared;
    }
}

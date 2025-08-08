<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class ItemController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index()
    {
        $items = Auth::user()->items()->latest()->get();
        return view('items.index', compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("items.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required | string | min:4 | max:20',
            'description'=> 'nullable | string',
        ]);

        Auth::user()->items()->create($request->all());
        return redirect()->route('items.index')->with('success','Succefully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $this->authorize('view', $item);
        return view('', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $this->authorize('update', $item);
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $this->authorize('update', $item);
        $request->validate([
            'name'=>'required | string | min:4 | max:20',
            'description'=> 'nullable | string',
        ]);

        $item->update($request->all());
        return redirect()->route('items.index')->with('success','Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $this->authorize('delete', $item);
        $item->delete();
        return redirect()->route('items.index')->with('success','Item Deleted');
    }
}

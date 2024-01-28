<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = DB::table('borrows')
        ->leftJoin('users', 'users.id', '=', 'borrows.user_id')
        ->leftJoin('items', 'items.id', '=', 'borrows.item_id')
        ->select('borrows.*', 'users.name as user_name', 'items.name as item_name', 'users.nrp as user_nrp', 'items.category as item_category')
        ->where('borrows.return_date', null)
        ->get();

        //dd($borrows);
        return view('borrow.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $items = Item::all();
        return view('borrow.create', compact('users', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Borrow::create($request->all());
        $item = Item::where('id', $request->item_id)->first();
        $item->update(['value' => $item->value + 1]);

        return redirect()->route('borrow.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $borrow = Borrow::find($id);
        $name = User::where('id', $borrow->user_id)->first();
        $userName = $name->name;
        $users = User::all();
        $items = Item::all();
        //dd($userName);
        return view('borrow.edit', compact('borrow', 'users', 'items', 'userName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $borrow = Borrow::find($id);
        $borrow->update($request->all());
        return redirect()->route('borrow.index');
    }

    public function updateStatus($id){
        $borrow = Borrow::find($id);
        $borrow->update(['return_date' => Carbon::now()]);
        return redirect()->back()->with(['success' => "Sukses mengupate data"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Borrow::find($id)->delete();
        return redirect()->back()->with(['success' => "Sukses menghapus data"]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $countAll = Borrow::count();
        $countReturn = Borrow::where('return_date', '!=', null)->count();
        $countBorrow = Borrow::where('return_date', '=', null)->count();

        $borrows = DB::table('borrows')
        ->leftJoin('users', 'users.id', '=', 'borrows.user_id')
        ->leftJoin('items', 'items.id', '=', 'borrows.item_id')
        ->select('borrows.*', 'users.name as user_name', 'items.name as item_name', 'users.nrp as user_nrp', 'items.category as item_category')
        ->where('borrows.return_date', '!=', null)
        ->get();

        return view('dashboard', compact('countAll', 'countBorrow', 'countReturn', 'borrows'));
    }
    public function employees(){
        $users = User::all();
        return view('employee', compact('users'));
    }

        public function items(){
        $items = Item::all();
        return view('item', compact('items'));
    }

    public function getUserName($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json(['userName' => $user->name]);
        } else {
            return response()->json(['userName' => 'User not found']);
        }
    }

}

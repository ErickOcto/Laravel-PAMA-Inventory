<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
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

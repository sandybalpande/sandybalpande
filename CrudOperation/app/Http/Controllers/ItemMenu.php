<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemMenu as Item_menu;
use Illuminate\Support\Facades\Redirect;

class ItemMenu extends Controller
{
    public function getItemMenu()
    {
    	return view('Item.Item');
    }
    public function addItemMenu(Request $request)
    {
    	Item_menu::create($request->all());

    	return Redirect::To('employees');
    }
}

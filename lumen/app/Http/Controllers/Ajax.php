<?php
namespace App\Http\Controllers;

use App\RouterProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class Ajax extends Controller
{
	
	public function index()
	{
		try {
			$list = RouterProperty::where('status',1)->get()->toArray();

			return view('ajax/index', $list);
		} catch (Exception $e) {
			
		}
	}
	public function store(Request $request)
	{
		try {
			$insert_data = Input::all();
			Category::create($insert_data);
		} catch (Exception $e) {
			
		}
	}
}
<?php
namespace App\Http\Controllers;

use App\RouterProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;


class CurdController extends Controller
{
	
	public function index()
	{
		try {
			$list = RouterProperty::where('status',1)->get()->toArray();

			return view('ajax/index', ['data'=>$list]);
		} catch (Exception $e) {
			
		}
	}
	public function list()
	{
		try {
			$input = Input::all();
			$obj = RouterProperty::where('status',1);
			
			if (isset($input['where'])) {
				foreach ($input['where'] as $key => $value) {
					$obj->where($key,$value);
				}
			}

			$list = $obj->get()->toArray();
			
			return $list;
		} catch (Exception $e) {
			
		}
	}
	public function store(Request $request)
	{
		try {
			$input = Input::all();

			RouterProperty::create($input);
		} catch (Exception $e) {

		}
	}
	public function update(Request $request, $id)
	{
		try {
			$input = Input::all();

		
			RouterProperty::where('id', $id)->update($input);
		} catch (Exception $e) {

		}
	}
	public function delete(Request $request, $id)
	{
		try {
			RouterProperty::where('id', $id)->update(['status'=>0]);
		} catch (Exception $e) {

		}
	}

	

}
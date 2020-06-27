<?php
namespace App\Http\Controllers;

use App\RouterProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;


class RouterController extends Controller
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

			$x = $this->validate($request, [
				'spid' => 'required|digits:18|ip',
				'hostname' => 'required|unique:RouterProperty|digits:14',
				'loopback' => 'required|unique:RouterProperty|ipv4',
				'macaddress' => 'required|unique:RouterProperty|digits:17'
			]);

			RouterProperty::create($input);
		} catch (Exception $e) {

		}
	}
	public function update(Request $request, $id)
	{
		try {
			$input = Input::all();

			$x = $this->validate($request, [
				'spid' => 'required|digits:18|ip',
				'hostname' => 'required|unique:RouterProperty|digits:14',
				'loopback' => 'required|unique:RouterProperty|ipv4',
				'macaddress' => 'required|unique:RouterProperty|digits:17'
			]);

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

	public function img(Request $request)
	{
		try {
			$image = imagecreatetruecolor(400, 300);

			$col_poly = imagecolorallocate($image, 255, 255, 255);

			imagepolygon($image, array(
				30,   30,
				90, 30,
				100, 60,
				90, 90,
				30, 90,
				20, 60,
			),
			6,
			$col_poly);

			imagepolygon($image, array(
				50,   30,
				70, 50,
				50, 70,
				30, 50,
			),
			4,
			$col_poly);

			imageellipse($image, 50, 50, 10, 10, $col_poly);

			header('Content-type: image/png');

			imagepng($image);
			imagedestroy($image);
		} catch (Exception $e) {

		}
	}

}
<?php
namespace App\Http\Controllers;

use App\TrainingClass as TC;
use App\HistoryLog as HL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


class TrainingClass extends Controller
{
	
	public function index()
	{
		try {

			$list = TC::where('status',1)->get()->toArray();
			return $list;
		} catch (Exception $e) {
			
		}
	}
	public function list()
	{
		try {
			$input = Input::all();
			$obj = TC::where('status',1);
			if (isset($input['limit'])) {
				$obj->limit($input['limit']);
			}
			if (isset($input['offset'])) {
				$obj->offset($input['offset']);
			}
			if (isset($input['where'])) {
				foreach ($input['where'] as $key => $value) {
					if ($key == 'category_id') {
						if (is_array($value)) {
							$obj->whereIn($key,$value);
						}else{
							$obj->where($key,$value);
						}
					}elseif ($key == 'duration') {
						$obj->whereBetween($key,$value);
					}else{
						$obj->where($key,$value);
					}
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
			$insert_data = Input::all();
			$music_file = Input::file('audio');
			$filename = uniqid().'.'.$music_file->getClientOriginalExtension(); 
			$path = Storage::putFileAs('audio', $request->file('audio'),$filename);
			$url = Storage::url($path);
			
			unset($insert_data['audio']);
			$insert_data['audio_track'] = $url;

			TC::create($insert_data);
		} catch (Exception $e) {

		}
	}
	public function update(Request $request, $id)
	{
		try {
			$update_data = Input::all();
			$music_file = Input::file('audio');
			$data = TC::find($id)->toArray();
			if ($music_file) {
				$filename = uniqid().'.'.$music_file->getClientOriginalExtension(); 
				$path = Storage::putFileAs('audio', $request->file('audio'),$filename);
				$url = Storage::url($path);
				unset($update_data['audio']);
				$update_data['audio_track'] = $url;

				if (!is_null($data['audio_track'])) {
					$del_file = explode('/', $data['audio_track']);
					$del_file = end($del_file);

					Storage::delete('audio/'.$del_file);
				}
			}

			$log_data = [
				'type' => 'training_class',
				'old_data' => json_encode($data),
				'new_data' => json_encode($update_data),
			];
			HL::create($log_data);
			
			TC::where('id', $id)->update($update_data);
		} catch (Exception $e) {

		}
	}
	public function delete(Request $request, $id)
	{
		try {

			$data = TC::find($id)->toArray();
			if (!is_null($data['audio_track'])) {
				$del_file = explode('/', $data['audio_track']);
				$del_file = end($del_file);

				Storage::delete('audio/'.$del_file);
			}
			
			TC::destroy($id);
		} catch (Exception $e) {

		}
	}
}
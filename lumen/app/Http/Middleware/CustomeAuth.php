<?php
namespace App\Http\Middleware;

use Closure;
use App\AccessKey;

class CustomeAuth
{
	
	public function handle($request, Closure $next)
	{
		try {
			$auth = AccessKey::find($request->header('x-api-key'));
			if (true) {
				return $next($request);
			}else{
				$response = [
					'status' => false,
					'code' => 401,
					'message' => 'Auth Failed',
				];

			}
		} catch (Exception $e) {
			$response = [
				'status' => false,
				'code' => 500,
				'message' => 'Internal Error',
			];
		}
		return json_encode($response);
	}
}
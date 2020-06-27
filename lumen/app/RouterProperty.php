<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RouterProperty extends Model
{
	protected $table = 'router_properties';
	protected $fillable = ['status','spid','hostname','loopback','macaddress','type'];
}
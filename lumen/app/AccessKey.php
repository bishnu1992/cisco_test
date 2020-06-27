<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccessKey extends Model
{
	protected $table = 'access_keys';
    protected $primaryKey = 'access_key';
}
<?php

namespace Noodle50\Activities;

use Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Activities extends Eloquent {

	protected $table = 'users_activities';

	public function user() {
		return $this->belongsTo(Config::get('auth.model'), 'user_id');
	}

	public static function add($data = array()) {
		$user = Auth::user();
		
		$entry = new static;
		$entry->user_id = (int)$user->id;
		$entry->ip_address = Request::getClientIp();
		
		foreach (array('group', 'type', 'action', 'data') as $field) {
			$entry->$field = (isset($data[$field]) ? $data[$field] : null);
		}

		return (bool)$entry->save();
	}

}
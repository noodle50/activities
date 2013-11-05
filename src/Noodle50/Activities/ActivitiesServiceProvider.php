<?php

namespace Noodle50\Activities;

use Illuminate\Support\ServiceProvider;

class ActivitiesServiceProvider extends ServiceProvider {

	protected $defer = false;

	public function boot() {
		$this->package('Noodle50/activities');
	}

	public function register() {}

	public function provides() {
		return array();
	}

}
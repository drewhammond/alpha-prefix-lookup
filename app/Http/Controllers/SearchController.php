<?php

namespace App\Http\Controllers;

use App\Prefix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
	public function index() {
		return view('app');
    }

	/**
	 * Return JSON response with list of prefixes and policies
	 */
	public function prefixes() {

		$prefixes = Prefix::all(['id', 'policy_name']);


		return $prefixes;


    }

	public function process() {

		$results = file_get_contents('prefixes.json');

		$results = json_decode($results);


		foreach($results as $result) {

			$result = (array) $result;

			$prefix = $result['Prefix'];
			$name = $result['Plan Name'];

			// Insert into database
			if (Prefix::find($prefix)) {
				Log::debug("{$prefix} already exists. Skipping");
			} else {
				$new = new Prefix();
				$new->id = $prefix;
				$new->policy_name = $name;

				$new->save();
				Log::debug("Added new record for {$prefix}", ['record' => $new]);
			}

		}
    }
}

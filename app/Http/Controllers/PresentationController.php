<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PresentationController extends Controller {

	public function present() {
        return view('presentation');
    }

}

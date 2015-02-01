<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DebugBar\DebugBar;
use Illuminate\Http\Request;

class PresentationController extends Controller {

	public function present() {
        \Debugbar::disable();
        return view('presentation');
    }

}

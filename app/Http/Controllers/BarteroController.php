<?php namespace App\Http\Controllers;

use Gzero\Core\Http\Controllers\Controller;

class BarteroController extends Controller {
    public function index() {
        return view('bartero');
    }
}
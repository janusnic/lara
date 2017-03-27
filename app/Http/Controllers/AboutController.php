<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AboutController extends Controller {

    public function showIndex()       {
        return view('about');
    }

    public function fooIndex()       {
        return view('about');
    }

    public function barIndex()       {
        return view('hello')->with('name', 'Janus Nic');
    }

    public function baxIndex()       {
        return view('hello')->withName('Janus Nic With Name');
    }

    public function bazIndex()       {
        if (view()->exists('hello')) {
            return view('hello', ['name' => 'Janus Nic As Name']);
        }
    }
}

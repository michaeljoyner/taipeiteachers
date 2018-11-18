<?php

namespace App\Http\Controllers;

use App\InfoLinks\InfoLink;
use Illuminate\Http\Request;

class InfoLinksController extends Controller
{
    public function index()
    {
        $tips = InfoLink::latest()->get()->groupBy('topic');
        return view('front.info.page', ['link_groups' => $tips]);
    }
}

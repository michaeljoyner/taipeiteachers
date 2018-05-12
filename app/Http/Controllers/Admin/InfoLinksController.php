<?php

namespace App\Http\Controllers\Admin;

use App\InfoLinks\InfoLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoLinksController extends Controller
{
    public function index()
    {
        $info_links = InfoLink::all();

        return view('admin.info-links.index', ['info_links' => $info_links]);
    }

    public function show(InfoLink $info_link)
    {
        return view('admin.info-links.show', ['info_link' => $info_link->toArray()]);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'link' => ['required', 'url'],
            'link_text' => 'required',
            'topic' => 'required'
        ]);
        return InfoLink::create(request()->all());
    }

    public function update(InfoLink $info_link)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'link' => ['required', 'url'],
            'link_text' => 'required',
            'topic' => 'required'
        ]);

        $info_link->update(request()->all());

        return $info_link->fresh();
    }

    public function delete(InfoLink $info_link)
    {
        $info_link->delete();
    }
}

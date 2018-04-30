<?php

namespace App\Http\Controllers\Admin;

use App\Faqs\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs = Faq::get()->map->toArray();

        return view('admin.faqs.index', ['faqs' => $faqs]);
    }

    public function show(Faq $faq)
    {
        return view('admin.faqs.show', ['faq' => $faq]);
    }

    public function store()
    {
        request()->validate([
            'question' => 'required',
            'short_answer' => 'required',
        ]);
        return Faq::create(request()->all());
    }

    public function update(Faq $faq)
    {
        request()->validate([
            'question' => 'required',
            'short_answer' => 'required',
        ]);

        $faq->update(request()->all());

        return $faq->fresh();
    }

    public function delete(Faq $faq)
    {
        $faq->delete();
    }
}

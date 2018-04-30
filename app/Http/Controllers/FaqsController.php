<?php

namespace App\Http\Controllers;

use App\Faqs\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs = Faq::published()->get()->map->toArray();

        return view('front.faqs.page', ['faqs' => $faqs]);
    }

    public function show($slug)
    {
        $faq = Faq::published()->where('slug', $slug)->firstOrFail();

        return view('front.faqs.show', ['faq' => $faq]);
    }
}

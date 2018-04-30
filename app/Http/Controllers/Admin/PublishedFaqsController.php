<?php

namespace App\Http\Controllers\Admin;

use App\Faqs\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublishedFaqsController extends Controller
{
    public function store()
    {
        Faq::findOrFail(request('faq_id'))->publish();
    }

    public function delete(Faq $faq)
    {
        $faq->retract();
    }
}

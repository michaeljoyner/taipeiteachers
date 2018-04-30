<?php

namespace App\Http\Controllers\Admin;

use App\Faqs\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqFullAnswerController extends Controller
{

    public function edit(Faq $faq)
    {
        return view('admin.faqs.body.edit', ['faq' => $faq]);
    }

    public function update(Faq $faq)
    {
        $faq->updateFullAnswer(request('body'));
    }
}

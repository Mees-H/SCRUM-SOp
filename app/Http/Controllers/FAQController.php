<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionPostRequest;
use App\Models\Mail\Mailer;
use App\Models\Mail\MailFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FAQController extends Controller
{
    public function questionForm()
    {
        return view('faq.questionForm');
    }

    public function submit(QuestionPostRequest $request)
    {
        $validated = $request->validated();

        $mailFactory = new MailFactory();
        $mail = $mailFactory->createMail('sendQuestion',
            ['name' => $request['name'], 'email' => $request['email'], 'question' => $request['question']]);
        Mailer::Mail([], $mail, true);
        return redirect('faq')->with('success', 'Uw vraag is verzonden!');
    }
}

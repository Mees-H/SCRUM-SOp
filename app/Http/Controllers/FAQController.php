<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionPostRequest;
use App\Models\Mail\Mailer;
use App\Models\Mail\MailFactory;
use App\Models\FAQ;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FAQController extends Controller
{
    function index() {
        $FAQ = FAQ::all();
        return view('faq.index', compact('FAQ'));
    }

    function questionForm()
    {
        return view('faq.questionForm');
    }

    function submit(QuestionPostRequest $request)
    {
        $validated = $request->validated();

        $mailFactory = new MailFactory();
        $mail = $mailFactory->createMail('sendQuestion',
            ['name' => $request['name'], 'email' => $request['email'], 'question' => $request['question']]);
        Mailer::Mail([], $mail, true);
        return redirect('faq')->with('success', 'Uw vraag is verzonden!');
    }

    function create() {
        $FAQ = FAQ::all();
        return view('faq.create', compact('FAQ'));
    }

    function store(Request $request)
    {
        $attributes = $request->validate([
            'vraag' => 'required|max:255',
            'antwoord' => 'required|max:999',
        ]);

        FAQ::create(['question' => $attributes['vraag'], 'answer' => $attributes['antwoord']]);

        return redirect('/faq')->with('success', 'Vraag & antwoord opgeslagen.');
    }

    function edit(string $id) {
        $FAQ = FAQ::findOrFail($id);
        return view('faq.edit', compact('FAQ'));
    }

    function update(Request $request, string $id)
    {
        $attributes = $request->validate([
            'vraag' => 'required|max:255',
            'antwoord' => 'required|max:999',
        ]);

        FAQ::where('id', $id)->update(['question' => $attributes['vraag'], 'answer' => $attributes['antwoord']]);

        return redirect('/faq')->with('success', 'Vraag & antwoord geupdatet.');
    }

    function destroy(string $id)
    {
        FAQ::findOrFail($id)->delete();
        return redirect('/faq')->with('success', 'Vraag & antwoord verwijderd.');
    }
}

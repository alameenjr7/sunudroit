<?php

namespace App\Http\Controllers;

use App\Botman\OnboardingConversation;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;


class BotManController extends Controller
{
    //
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            $botman->startConversation(new OnboardingConversation);
        });

        $botman->listen();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

class MessengerController extends Controller
{
    //
    public function webhook() {
        $config = [
            'facebook' => [
                'token' => 'EAAmVeQXziy4BAGnLkxiNLQZB1YjP5KCpBSZBZB0DuZBGXPZB7FI13VMbgzNDO5piHbsCEL2AiLwYHdFu5JrCEZAHeZAnVQGvvsASuZAX7ZCOcXbzmmwiSW0q8j5TyCmiVxpaUW7E7j6k4XCsnHDUbJGy2OpG9s4082o0YZBux06rZB08AZDZD',
                'app_secret' => '7cbaacf026a09761451e8f5ba9652ef8',
                'verification'=>'maine_123',
            ]
        ];
        
        // Load the driver(s) you want to use
        DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);
        
        // Create an instance
        $botman = BotManFactory::create($config);
        
        // Give the bot something to listen for.
        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello yourself.');
        });

        $botman->hears('load', function (BotMan $bot) {
            $bot->reply('load yourself.');
        });
        
        // Start listening
        $botman->listen();
    }
}

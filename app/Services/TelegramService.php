<?php

namespace App\Services;

use Stringable;
use Illuminate\Support\Facades\Http;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Stringable as SupportStringable;

class TelegramService extends WebhookHandler
{
    public function hello()
    {
        $this->reply('Привет друг!');
    }

    // обработка неизвестной команды:
    protected function handleUnknownCommand(SupportStringable $text): void
    {
        $this->reply('Привет!');
    }

    // обработка отправляемы сообщений боту:
    protected function handleChatMessage(SupportStringable $text): void
    {
        $this->reply('Ты написал: "' . $text . '". Бот не обрабатывает простые сообщения. Иди нахуй!');
    }

    public function cryptocurrency()
    {
        Telegraph::message('Узнать курс крипты:',)
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Bitcoin')->action('getBitcoin'),
                Button::make('Ethereum')->action('getEthereum')
            ]))->send();
    }

    public function getBitcoin()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
            'ids' => 'bitcoin',
            'vs_currencies' => 'rub',
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $price = $data['bitcoin']['rub'];

            Telegraph::message('Стоимость одного Биткойна: '.$price.' рублей.')->send();
        } else {
            Telegraph::message('Не удалось получить данные.')->send();
        }
    }

    public function getEthereum()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
            'ids' => 'ethereum', 
            'vs_currencies' => 'rub',
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $price = $data['ethereum']['rub']; 

            Telegraph::message('Стоимость одного Эфира: '.$price.' рублей.')->send();
        } else {
            Telegraph::message('Не удалось получить данные.')->send();
        }
    }
}

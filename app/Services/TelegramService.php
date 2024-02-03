<?php

namespace App\Services;

use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Stringable as SupportStringable;
use Stringable;

class TelegramService extends WebhookHandler
{
    public function hello()
    {
        $this->reply('Привет Пидрила!');
    }

    // обработка неизвестной команды:
    protected function handleUnknownCommand(SupportStringable $text): void
    {
            $this->reply('Неизвестная команда!');
    }
    
    // обработка отправляемы сообщений боту:
    protected function handleChatMessage(SupportStringable $text): void
    {
        $this->reply('Ты написал: "'. $text . '". Бот не обрабатывает простые сообщения. Иди нахуй!');
    }
}

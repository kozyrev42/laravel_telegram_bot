<?php

namespace App\Services;

use DefStudio\Telegraph\Handlers\WebhookHandler;

class TelegramService extends WebhookHandler
{
    public function hello()
    {
        $this->reply('Привет Пидрила!');
    }
}

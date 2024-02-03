<?php

namespace App\Console\Commands;

use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Console\Command;

class RegCommandBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     *  Регистрация команды, чтобы в боте появились команды в Меню
     * 
     *  Выполнить команду:
     *  php artisan bot:register-command
     * @var string
     */
    protected $signature = 'bot:register-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle():void
    {
        // получаем бота через id
        $bot = TelegraphBot::find(1);

        // регистрируем команду
        // метод send(), отправит запрос в телеграм
        $bot->registerCommands([
            'hello' => 'Сказажи привет боту'
        ])->send();
    }
}

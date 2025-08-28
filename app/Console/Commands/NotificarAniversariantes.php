<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Promotor;

class NotificarAniversariantes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notificar:aniversariantes';
    protected $description = 'Envia notificações para usuários que estão de aniversário hoje';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $hoje = Carbon::today();

        $users = Promotor::whereMonth('dataNascimento', $hoje->month)
                     ->whereDay('dataNascimento', $hoje->day)
                     ->get();

        foreach ($users as $user) {
            $user->notify(new AniversarioNotification($user));
        }

        $this->info("Notificações enviadas para " . $users->count() . " aniversariante(s).");
    }
}

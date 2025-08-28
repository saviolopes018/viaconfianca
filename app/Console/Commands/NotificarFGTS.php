<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Produto;

class NotificarFGTS extends Command
{
    protected $signature = 'notificar:fgts';
    protected $description = 'Envia notificações para lembrar do dia do FGTS';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $hoje = Carbon::now('America/Sao_Paulo');

        $produto = Produto::where('descricao', 'fgts')->get()[0];

        $produto->notify(new FGTSNotification($produto));

        dd($produto);

        $this->info("Notificações enviadas para aniversariante(s).");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Banco extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'banco';

    protected $fillable = [
        'nomeBanco',
        'status',
    ];

    public static function getBancos() {
        return DB::table('banco')
            ->select('banco.*')
            ->where('banco.status', 1)
            ->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class Crypto extends Model
{
    use HasFactory, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'full',
        'value'
    ];

    /**
     * The attributes that are mass sortable.
     *
     * @var array<int,string>
     */
    public $sortable = [
        'name',
        'full',
        'value',
        'percent24',
        'rank'
    ];

    public function wallets(): HasMany
    {
        return $this->hasMany(WalletCrypto::class);
    }
}

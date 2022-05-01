<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class Group extends Model
{
    use HasFactory, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that are mass sortable.
     *
     * @var array<int,string>
     */
    public $sortable = [
        'name'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FunctionPoint extends Model
{
    use HasFactory;

    protected $table = 'functions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'user_id',
        'description',
        'start_date',
        'end_date',
        'creator',
        'executor',
        'manager',
        'fp'
    ];
}

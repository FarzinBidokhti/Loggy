<?php

namespace FarzinBidokhti\Loggy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loggy extends Model
{
    use HasFactory;

	public $timestamps = true;
    protected $table   = 'loggy';
}

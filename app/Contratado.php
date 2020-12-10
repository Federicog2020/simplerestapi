<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratado extends Model
{
    protected $table = 'contratados';

    public function productos() {
		return $this->belongsTo(User::class)->get();
	}
}

<?php

namespace Shoppvel\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

    public function users() {
        return $this->hasMany(User::class);
    }

}

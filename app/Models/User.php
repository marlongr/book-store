<?php

namespace Shoppvel\Models;
use Shoppvel\Models\Admin;
use Shoppvel\Models\Cliente;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    public function admin() {
        return $this->belongsTo(Admin::class);
    }
    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
    
}
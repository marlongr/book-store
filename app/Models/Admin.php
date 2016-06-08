<?php

namespace Shoppvel\Models;
use Shoppvel\Models\User;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

    public function user() {
        return $this->hasMany(User::class);
    }

}

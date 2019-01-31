<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class todo extends Model {

    public $table  = 'todos';


    public function users() {
        return $this->belongsTo( 'App\Models\User', 'user_id' );
    }

    public function mark(){
        $this->erledigt = $this->erledigt ? false : true;
        $this->save();
    }

}
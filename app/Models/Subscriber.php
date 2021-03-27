<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','first_name','last_name','email','ip'];

    public function status(){

        $status = ($this->deleted_at) ? 'eliminado' : 'activo' ;
        return $status;
    }

    public function scopeByStatus($query, $status){
        switch ($status) {
            case 'all':
                return $query->withTrashed();
                break;
            case 'delete':
                return $query->onlyTrashed();
                break;    
        }
        
    }

    public function scopeSearch($query, $filter){
        
        return $query->where('subscribers.email', 'like', "%$filter%")->orWhere('subscribers.first_name', 'like', "%$filter%")
        ->orWhere('subscribers.last_name', 'like', "%$filter%");
    }

    

}

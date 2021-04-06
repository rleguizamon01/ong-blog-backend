<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'ip',
    ];

    public function scopeByStatus($query, $status)
    {
        switch ($status) {
            case 'all':
                return $query->withTrashed();
            case 'delete':
                return $query->onlyTrashed();
            case 'active':
                return $query->whereNull('deleted_at');
        }
    }

    public function scopeSearch($query, $filter)
    {
        return $query
            ->where('email', 'like', "%{$filter}%")
            ->orWhere('first_name', 'like', "%{$filter}%")
            ->orWhere('last_name', 'like', "%{$filter}%");
    }
}

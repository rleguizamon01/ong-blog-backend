<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'birthdate',
        'body',
        'status',
        'reviewed_at'
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
}

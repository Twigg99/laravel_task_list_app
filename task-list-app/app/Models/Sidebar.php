<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sidebar extends Model
{
    //

    use HasFactory;

    protected $table='sidebar';

    protected $fillable = [
        'sidebar_link_name'
    ];

    public function notes()
    {
        return $this->hasMany(Notes::class, 'sidebar_link_id');
    }
}

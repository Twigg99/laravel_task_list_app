<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notes extends Model
{
    //
    use HasFactory;

    protected $table = 'notes';

    protected $fillable = ['note_title', 'note_image_path', 'note_body', 'sidebar_link_id'];

    public function sidebar()
    {
        return $this->belongsTo(Sidebar::class, 'sidebar_link_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'from_id', 'to_id'];
    
    public function user_id()
    {
        return $this->belongsTo(User::class);
    }
    
    // public function user_to_id()
    // {
        // return $this->belongsTo(User::class, 'to_id');
    // }_
}

<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'level', 'comment', 'aboutme'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function message_ids()
    {
        return $this->hasMany(Message::class, 'from_id');
    }
    
     public function message_to_ids()
    {
         return $this->hasMany(Message::class, 'to_id');
    }
    
    public function thankings()
    {
        return $this->belongsToMany(User::class, 'user_thanks', 'user_id', 'thanks_id')->withTimestamps();
    }
    
    public function talkers()
    {
        return $this->belongsToMany(User::class, 'user_thanks', 'thanks_id', 'user_id')->withTimestamps();
    }
    
    
    public function talks($userId) { // 既にフォローしているかの確認 

$exist = $this->is_thanking($userId); // 自分自身ではないかの確認 

$its_me = $this->id == $userId;

    if ($exist || $its_me) {


        return false;

    } else {

        $this->thankings()->attach($userId);

        return true;

    }
}

public function unthanks($userId)
{
    
    $exist = $this->is_thanking($userId);
    
    $its_me = $this->id == $userId;

    if ($exist && !$its_me) {
        
        $this->thankings()->detach($userId);
        return true;
    } else {
        
        return false;
    }
}

    public function is_thanking($userId) {
        return $this->thankings()->where('thanks_id', $userId)->exists();
    }
}
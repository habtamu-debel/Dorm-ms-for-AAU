<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Staff extends Model implements Authenticatable
{
    use HasFactory, Notifiable, \Illuminate\Auth\Authenticatable;

    protected $table = 'staffs';
    protected $primaryKey = 'staffid';
    protected $keyType = 'string';

    protected $fillable = [
        'staffid',
        'firstname',
        'lastname',
        'email',
        'password',

        'phone',
        'role',
        'campus',
        'region', 
        'wereda', 
        'zone', 
        'town', 
        'photo',
    ];

    public function account()
    {
        return $this->hasOne(Account::class, 'staffid', 'staffid');
    }

    // Implement the required methods from the Authenticatable contract
    public function getAuthIdentifierName()
    {
        return 'staffid';
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->account->password;
    }

    public function getRememberToken()
    {
        // Add code here if you want to implement "remember me" functionality
    }

    public function setRememberToken($value)
    {
        // Add code here if you want to implement "remember me" functionality
    }

    public function getRememberTokenName()
    {
        // Add code here if you want to implement "remember me" functionality
    }
}
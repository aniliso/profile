<?php

namespace Modules\Profile\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use Translatable;

    protected $table = 'profile__profiles';
    public $translatedAttributes = ['biography'];
    protected $fillable = ['email', 'phone', 'mobile', 'fax', 'address', 'facebook', 'twitter', 'google', 'linkedin', 'instagram', 'website'];

    public function user()
    {
        $driver = config('asgard.user.config.driver');
        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }
}

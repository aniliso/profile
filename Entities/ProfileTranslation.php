<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class ProfileTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['biography'];
    protected $table = 'profile__profile_translations';
}

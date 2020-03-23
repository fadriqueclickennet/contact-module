<?php

namespace Modules\Contact\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Translatable;

    protected $table = 'contact__contacts';
    public $translatedAttributes = [];
    protected $fillable = [];
}

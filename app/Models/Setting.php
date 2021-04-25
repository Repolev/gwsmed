<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=['favicon','logo','footer_logo','footer','title','url','phone','office_time','email','address','short_intro','about','facebook','twitter','google','instagram', 'google_analytics', 'google_tag_manager'];
}

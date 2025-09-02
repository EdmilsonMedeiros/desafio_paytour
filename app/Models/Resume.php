<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'desired_job', 'education', 'observations', 'file', 'ip_address'];
}

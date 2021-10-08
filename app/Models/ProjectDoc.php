<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDoc extends Model
{
    use HasFactory;
    protected $table='documents_projects';
    protected $keyType = 'string';
}

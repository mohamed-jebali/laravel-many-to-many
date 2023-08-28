<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['title','type_id' ,'description', 'slug', 'image'];

    use HasFactory;
    use SoftDeletes;


    public function getRouteKeyName(): string{
        return 'slug';
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
}

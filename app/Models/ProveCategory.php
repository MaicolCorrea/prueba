<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveCategory extends Model
{
    use HasFactory;

    protected $table = 'prove_category';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category',
        'description',
        'category_state'
    ];
}

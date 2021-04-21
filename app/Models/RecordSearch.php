<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordSearch extends Model
{
    use HasFactory;

    protected $table = 'record_searches';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['value_search','category'];

}

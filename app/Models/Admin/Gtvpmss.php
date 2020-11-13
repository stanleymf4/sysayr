<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Gtvpmss extends Model
{
    protected $primaryKey = 'gtvpmss_id';
    protected $table = 'gtvpmss';
    protected $fillable = ['gtvpmss_desc', 'gtvpmss_slug'];
    protected $guarded = 'gtvpmss_id';

    public function roles()
    {
        return $this->belongsToMany(Gtvrole::class, 'gsbpmrl', 'gsbpmrl_pmss_id', 'gsbpmrl_role_id');
    }
}

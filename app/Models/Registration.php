<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nama',
        'instansi',
        'email',
        'no_tlpn'
    ];

    /**
     * Get the certificate associated with the registration.
     */
    public function certificate()
    {
        return $this->hasOne(Certificate::class, 'email', 'email');
    }
}
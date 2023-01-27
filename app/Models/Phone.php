<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'state',
        'country_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function state(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value == 'valid') {
                    $value = "<span class='badge text-bg-success'>Valid</span>";
                } elseif ($value == 'not_valid') {
                    $value = "<span class='badge text-bg-danger'>Not Valid</span>";
                }

                return $value;
            },
        );
    }
}

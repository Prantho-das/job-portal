<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'description',
    ];

    /**
     * Set the value attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        // Ensure the value is always stored as a simple string.
        // If it's an array (e.g., from FileUpload multiple), take the first element.
        if (is_array($value)) {
            $this->attributes['value'] = $value[0] ?? null;
        } else {
            $this->attributes['value'] = $value;
        }
    }
}
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
     * Get the value attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute($value)
    {
        // If the value is a JSON string that represents an array,
        // and it contains only one element, return that element.
        // This handles cases where FileUpload might store single files as JSON arrays.
        $decodedValue = json_decode($value, true);
        if (is_array($decodedValue) && count($decodedValue) === 1 && is_string($decodedValue[0])) {
            return $decodedValue[0];
        }

        return $value;
    }

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
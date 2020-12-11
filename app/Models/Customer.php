<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organization',
        'address',
        'phone',
        'email',
        'feedback',
        'comment',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feedbackText()
    {

        if ($this->feedback == -1) return 'Already Have CC-Camera';
        if ($this->feedback == 0) return 'Not Interested';
        if ($this->feedback == 1) return 'Interested';
        if ($this->feedback == 2) return 'Highly Interested';
        if ($this->feedback == 3) return 'Urgent';
        return $this->feedback;
    }

    public function getFeedbackTextAttribute()
    {

        if ($this->feedback == -1) return 'Already Have CC-Camera';
        if ($this->feedback == 0) return 'Not Interested';
        if ($this->feedback == 1) return 'Interested';
        if ($this->feedback == 2) return 'Highly Interested';
        if ($this->feedback == 3) return 'Urgent';
        return $this->feedback;
    }

}

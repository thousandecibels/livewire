<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'name', 'card_type', 'description', 'password'
    ];

    /**
     * Card Team
     *
     * Get the Team that owns the Card.
     *
     **/
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

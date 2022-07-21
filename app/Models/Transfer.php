<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    public function __construct($appointment = '+', $value = 0, $user_id = 0)
    {
        $this->appointment = $appointment;
        $this->value = $value;
        $this->user_id = $user_id;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function deposit($value, $user_id)
    {
        $this->appointment = '+';
        $this->value = $value;
        $this->user_id = $user_id;
        $this->title = 'Ваш депозит';
        // $this->date = preg_split('/ /', $this->updated_at)[0];
        $this->date = Carbon::now()->isoFormat('Y-MM-DD');
        $this->saveOrFail();
    }
    public function withdraw($value, $user_id)
    {
        $this->appointment = '-';
        $this->value = $value;
        $this->user_id = $user_id;
        $this->title = 'Invest in macroshems';
        // $this->date = preg_split('/ /', $this->updated_at)[0];
        $this->date = Carbon::now()->isoFormat('Y-MM-DD');
        $this->saveOrFail();
    }
    public function customTransfer($value, $user_id, $title = 'Paid on your invest cash', $appointment = '+')
    {
        $this->appointment = $appointment;
        $this->value = $value;
        $this->user_id = $user_id;
        $this->title = $title;
        // $this->date = preg_split('/ /', $this->updated_at)[0];
        $this->date = Carbon::now()->isoFormat('Y-MM-DD');
        $this->saveOrFail();
    }
}

<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class TodoModel extends Model
{
    protected $fillable = ['user_id','title','description','is_complete'];

    public function scopeIncompleteTodos($query)
    {
        
        return $query->where('user_id',Auth::User()->id)
                     ->where('is_complete',false)
                     ->paginate(3);
    }

    public function scopeCompleteTodos($query)
    {
        return $query->where('user_id',Auth::User()->id)
                     ->where('is_complete',true)
                     ->get();
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'updated_at',
        'NG',
        'ranking',
        'user_id',
        'comment_id'
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //Categoryに対するリレーション
    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function user()
    {
        return $this->belongsTo('App\user');
    }
    //commentに対するリレーション
    //「多対1」の関係なので複数系に
    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
    
    public function getPaginateByLimitWithAuth(int $limit_count=10){
        return $this::where('user_id',auth()->id())->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

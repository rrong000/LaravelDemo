<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
    ];

    /**

 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo

 */

public function subject()
    {

    return $this->belongsTo(Subject::class);

    }
public function user()
{

return $this->belongsTo(user::class);

}
}


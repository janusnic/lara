<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    //
     /**
     * Raw Page Type.
     */
    const TYPE_RAW = 'RAW';

    /**
     * Markdown Page Type.
     */
    const TYPE_MARKDOWN = 'MARKDOWN';

    /**
     * HTML Page Type.
     */
    const TYPE_HTML = 'HTML';

    /**
     * Published Page Status.
     */
    const STATUS_PUBLISHED = 'PUBLISHED';

    /**
     * Draft Page Status.
     */
    const STATUS_DRAFT = 'DRAFT';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['meta' => 'array'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;

    if (! $this->exists) {
      $this->attributes['slug'] = Str::slug($value);
    }
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'metrics';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Relationship. A metric has many data points
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataPoints() {
        return $this->hasMany('App\DataPoint');
    }
}

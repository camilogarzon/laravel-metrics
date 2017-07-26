<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPoint extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'data_points';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Relationship. A data point belongs to a metric.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function metric() {
        return $this->belongsTo('App\Metric');
    }
}

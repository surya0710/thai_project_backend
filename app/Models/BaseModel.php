<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Apply filters to a query.
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function scopeFilter(Builder $query, array $filters = []): Builder
    {
        foreach ($filters as $column => $value) {
            if (!empty($value)) {
                if (is_array($value)) {
                    $query->whereIn($column, $value);
                } elseif (str_contains($column, '.')) {
                    $query->whereRelation(explode('.', $column)[0], explode('.', $column)[1], $value);
                } else {
                    $query->where($column, $value);
                }
            }
        }
        return $query;
    }
}

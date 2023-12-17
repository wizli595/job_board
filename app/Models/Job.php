<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class Job extends Model
{
    use HasFactory;
    public static array $experience = ["entry", "intermediate", "senior"];

    public static array $category = ["IT", "Finance", "sales", "marketing"];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
    public function scopeFilter(QueryBuilder | Builder $query, array $filters): QueryBuilder | Builder
    {
        return $query->when($filters['Search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where("title", "like", "%" . $search . "%")
                    ->orwhere("description", "like", "%" . $search . "%")
                    ->orWhereHas("employer", function ($query) use ($search) {
                        $query->where("company_name", "like", "%" . $search . "%");
                    });
            });
        })->when(
            $filters["min_salary"] ?? null,
            function ($query, $minSalary) {
                $query->where("salary", ">=", $minSalary);
            }
        )->when($filters["max_salary"] ?? null, function ($query, $maxSalary) {
            $query->where("salary", "<=", $maxSalary);
        })->when($filters["experience"] ?? null, function ($query, $experience) {
            $query->where("experience", $experience);
        })->when($filters["category"] ?? null, function ($query, $category) {
            $query->where("category", $category);
        });
    }
}

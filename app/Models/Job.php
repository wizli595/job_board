<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'location',
        'salary',
        'description',
        'experience',
        'category'
    ];
    public static array $experience = ["entry", "intermediate", "senior"];

    public static array $category = ["IT", "Finance", "sales", "marketing"];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Get all of the jobApplication for the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function hasUserApplied(Authenticatable | User |int $user): bool
    {
        return $this->where("id", $this->id)
            ->whereHas('jobApplications', fn ($query) => $query->where('user_id', '=', $user->id ?? $user))
            ->exists();
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

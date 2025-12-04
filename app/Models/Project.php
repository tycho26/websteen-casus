<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plot;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $guarded = ['projectID'];

    protected $primaryKey = 'projectID';

    public function getRouteKeyName(): string
    {
        return 'projectSlug';
    }

    public function isPublicString()
    {
        if ($this->projectPublic === 0) {
            return 'Nee';
        } else {
            return 'Ja';
        }
    }

    public function plots(): HasMany
    {
        return $this->hasMany(Plot::class);
    }
}

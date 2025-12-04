<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Plot extends Model
{
    /** @use HasFactory<\Database\Factories\PlotFactory> */
    use HasFactory;

    protected $guarded = ['plotID', 'areaTaskStatus', 'plotArea'];
    protected $primaryKey = "plotID";

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }
}

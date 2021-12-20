<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'reporterID',
        'reportTypeID',
        'addedOn',
        'reportContent',
        'focusesOnUser',
        'isOpenned',
    ];

    public function reportType(): BelongsTo
    {
        return $this->belongsTo(reportType::class);
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporterID');
    }

    public function focusesOnUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'focusesOnUser');
    }

    public function isSelectedType(int $typeid):bool
    {
        return hasType() &&$this->reportType->id == $typeid;
    }

    public function hasType():bool
    {
        return !is_null($this->reportType);
    }
}


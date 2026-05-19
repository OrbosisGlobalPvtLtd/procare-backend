<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImageHelper;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'request_type',
        'service_type',
        'name',
        'email',
        'mobile',
        'property_type',
        'property_address',
        'address',
        'preferred_date',
        'preferred_time',
        'document',
        'remark',
        'status',
        'admin_note'
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDocumentUrlAttribute()
    {
        if ($this->document) {
            return ImageHelper::getImageUrl($this->document);
        }
        return null;
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => '<span class="badge bg-warning">Pending</span>',
            'in_review' => '<span class="badge bg-info">In Review</span>',
            'approved' => '<span class="badge bg-primary">Approved</span>',
            'completed' => '<span class="badge bg-success">Completed</span>',
            'rejected' => '<span class="badge bg-danger">Rejected</span>',
        ];

        return $badges[$this->status] ?? '<span class="badge bg-secondary">Unknown</span>';
    }
}

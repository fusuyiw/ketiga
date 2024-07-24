<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'images' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    //searching
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('nama_fasum', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    ->orWhereHas('kelurahan', function ($query) use ($search) {
                        $query->where('nama', 'like', '%' . $search . '%')
                            ->orWhereHas('kecamatan', function ($query) use ($search) {
                                $query->where('nama', 'like', '%' . $search . '%');
                            });
                    });
            });
        });
    }
}

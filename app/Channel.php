<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $guarded = [];
    protected $casts = ['archived' => 'boolean'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('active', function ($builder) {
            $builder->where('archived', false)
            ->orderBy('name', 'asc');
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function withArchived()
    {
        return self::withoutGlobalScopes();
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function archive()
    {
        return $this->update(['archived' => true]);
    }
}

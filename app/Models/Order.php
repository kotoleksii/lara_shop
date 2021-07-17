<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed total_sum
 * @method static create(array $check)
 * @method exists()
 * @method static find($id)
 */
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_PENDING = 1;
    const STATUS_CLOSED = 2;
    const STATUS_ARCHIVED = 3;
    const STATUS_REJECTED = 0;

    protected $fillable = [
        'id',
        'status',
        'total_sum',
        'delivery_sum',
        'user_id'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
        'total_sum',
    ];

//    protected $visible = [
//
//    ];

    protected $appends = [
        'total_sum_hr',
    ];

    protected $casts = [
//      'status' => OrderStatusCast::class,
    ];

    public function getTotalSumHrAttribute()
    {
        return $this->total_sum / 100;
    }

    public function setTotalSumHrAttribute(float $val)
    {
        $this->total_sum = $val * 100;
    }

    /**
     * Order belongs to User
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Order has Invoice
     *
     * @return HasOne
     */
    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }

    /**
     * Order belongs to many Products
     *
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Order has many Transactions
     *
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}

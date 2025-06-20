<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class VendorAdmin extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $table = 'vendor_admins'; // Specify the guard

    protected $fillable = [
        'uuid',
        'user_type',
        'landmark',
        'phone',
        'email',
        'password',
        'name',
        'status',
        'admin_comments',
        'remember_token',
        'is_active',
        'email_verified_at',
        'mobile_verified_at',
        'business_name',
        'business_logo',
        'business_address',
        'business_category',
        'business_description',
        'business_contact_no',
        'pan_number',
        'pan_image',
        'state',
        'city',
        'postal_code',
        'area',
        'latitude',
        'longitude',
        'bank_name',
        'bank_branch',
        'gstin',
        'bank_city',
        'account_holder_name',
        'account_number',
        'ifsc_code',
        'cancel_cheque_image',
        'open_time',
        'close_time',
        'minimum_order_value',
        'delivery_range',
        'service_offered',
        'delivery_charge',
        'delivery_charge_status',
        'deliver_from',
        'otp_email',
        'mobile_otp',
        'is_deleted'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp_email',
        'mobile_otp',
        'pan_image',
        'cancel_cheque_image',
        'otp_status',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
        'is_active' => 'boolean',
        //'status' => 'boolean',
        'delivery_charge_status' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    /**
     * Automatically hash passwords when setting them.
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::needsRehash($value) ? Hash::make($value) : $value
        );
    }

    /**
     * Get full URL for business logo.
     */
    public function getBusinessLogoUrlAttribute()
    {
        return $this->business_logo ? Storage::url($this->business_logo) : asset('default-avatar.png');
    }
}

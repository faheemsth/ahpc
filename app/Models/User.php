<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $appends = ['amount'];

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'postel_address',
        'tehsil',
        'district',
        'province',
        'student_num',
        'doe',
        'institute',
        'institute_type',
        'inst_prf_completion',
        'program_uploaded',
        'documents_uploaded',
        'discipline',
        'ceo_name',
        'gender',
        'cnic_no',
        'qualification',
        'website_url',
        'contact',
        'declaration',
        'role_id',
        'description',
        'avatar',
        'inst_approval_status',//inst_approval_status 1= zero visit phase 2= accreditation phase 3= Re-Acc 4= License Approved

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAmountAttribute(){

        $invoice = Invoice::where('user_id',$this->id)->latest()->first();
        if($invoice){
            return $invoice->total_amount;
        }
        return 0;
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'user_id', 'id');
    }
}

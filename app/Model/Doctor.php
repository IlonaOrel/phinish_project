<?php

namespace App\Model;

use App\Model\DoctorPatient;
use App\Model\Specialization;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


class Doctor extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo', 'name', 'phone', 'email', 'specialization_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /*
     *
     */
    public function specialization(){
        return $this->belongsTo(Specialization::class);
    }
    /*
     *
     */
    public function doctorPatient(){
        return $this->hasMany(DoctorPatient::class);
    }
    /*
     *
     */
    public static function getImage($imageUrl)
    {

        $noImage = 'no_image.jpg';
        $path = '/upload/images/doctors/';
        $pathToProductImage = $path . $imageUrl;
        if (!file_exists($pathToProductImage)) {
            return $pathToProductImage;
        }

        return '/upload/images/' . $noImage;
    }
}

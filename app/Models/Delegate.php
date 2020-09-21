<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    const DEFAULT_IMAGE_PATH = '/uploads/images/';
    const IMAGES_FOLDER = self::DEFAULT_IMAGE_PATH . 'delegates/';
    const IMAGES_FOLDER_PROFILE = self::IMAGES_FOLDER . 'profile/';
    const IMAGES_FOLDER_NATIONAL = self::IMAGES_FOLDER . 'national/';
    /**
    fullname
    national_id
    phone
    governorate_id
    address
    qualification
    social_status
    other_phone
    city_id
    image
    national_image
     */
    protected $guarded = [];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function delegateDrive()
    {
        return $this->hasOne(DelegateDrive::class);
    }

    public function getImageProfilePAth()
    {
        return $this->image == 'default.png' ?
        asset(self::DEFAULT_IMAGE_PATH . $this->image) :
        asset(self::IMAGES_FOLDER_PROFILE . $this->image);
    }
    public function getImageNationalPAth()
    {
        return $this->national_image == 'default.png' ? asset(self::DEFAULT_IMAGE_PATH . $this->national_image) : asset(self::IMAGES_FOLDER_NATIONAL . $this->national_image);
    }
}

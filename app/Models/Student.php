<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Student extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];

    protected $dates = ['birthday'];

    const STATUS_DEFAULT = 0;
    const STATUS_PENDING = 1;
    const STATUS_ACCEPTED = 2;
    const STATUS_INCOMPLETE = 3;
    const STATUS_POSTPONED = 4;
    const STATUS_ABSENT = 5;

    public static function convertRoleToDepartmentId($role) {

        switch ($role) {
            case 'MIS': return 2;
            case 'AD': return 3;
            case 'VET': return 4;
            case 'NURSING': return 5;
            case 'MLT': return 6;
            case 'ARC': return 7;
            case 'BUILD': return 8;
            case 'TOURISM': return 9;
        }

    }

    public static function getStatusArray()
    {
        return [
            self::STATUS_DEFAULT => 'Default',
            self::STATUS_PENDING => 'تازە تۆمارکراو',
            self::STATUS_ACCEPTED => 'وەرگیراو',
            self::STATUS_INCOMPLETE => 'کێشەی تێدایە',
            self::STATUS_POSTPONED => 'دواخستن',
            self::STATUS_ABSENT => 'داپچڕان',
        ];
    }

    public function getUploadedIdType(): string
    {
        return $this->uploaded_id_type == 1 ? 'کارتی نیشتیمانی' : 'نانسنامە و ڕەگەزنامە';
    }

    public static function getStatusName($status)
    {
        return self::getStatusArray()[$status];
    }

    public function getProvinceArray() {
        return [
            1 => 'هەولێر',
            2 => 'سلێمانی',
            3 => 'دهۆك',
            4 => 'هەلەبجە',
            5 => 'کەرکووک',
        ];
    }

    public function getProvince() {
        return $this->getProvinceArray()[$this->province_id];
    }

    public function getBloodgroupArray() {
        return [
            1 => 'A+',
            2 => 'A-',
            3 => 'B+',
            4 => 'B-',
            5 => 'AB+',
            6 => 'AB-',
            7 => 'O+',
            8 => 'O-',
        ];
    }

    public function getBloodgroup() {
        return $this->getBloodgroupArray()[$this->bloodgroup_id];
    }

    public function getStudentTypeArray()
    {
        return [
            1 => 'دەرەکی',
            2 => 'ناوەکی'
        ];
    }

    public function getStudentType() {
        return $this->getEducationTypeArray()[$this->student_type_id];
    }

    public static function getDepartments(): array
    {
        return [
            1 => 'تەکنەلۆجیای زانیاری',
            2 => 'سیستەمی زانیاری کارگێڕی',
            3 => 'کارگێڕی کار',
            4 => 'ڤێرتەرنەری',
            5 => 'پەرستاری',
            6 => 'شیکاری نەخۆشیەکان',
            7 => 'تەلارسازی',
            8 => 'بیناکاری',
            9 => 'دەزگای کارگێڕی گەشتیاری',

        ];
    }

    public function getDepartment(): string
    {
        return self::getDepartments()[$this->department_id];
    }

    public static function getDepartmentName($id): string
    {
        return self::getDepartments()[$id];
    }

    public function getGender(): string
    {
        return $this->gender == 0 ? 'نێر' : 'مێ';
    }

    public static function getDepartmentTypes(): array
    {
        return [
            1 => 'زانکۆڵاین',
            2 => 'پاڕالێل',
            3 => 'ئێواران',
        ];
    }

    public static function getDepartmentTypeName($id): string
    {
        return self::getDepartmentTypes()[$id];
    }

    public function getStudentTypes(): array
    {
        return [
            1 => 'دەرەکی',
            2 => 'ناوەکی',
        ];
    }


    public static function getDepartmentTypeArray(): array
    {
        return [
            1 => 'زانکۆڵاین',
            2 => 'پاڕالێل',
            3 => 'ئێواران',
        ];
    }

    public function getDepartmentType(): string
    {
        return self::getDepartmentTypeArray()[$this->department_type_id];
    }

    public function getEducationTypeArray(): array
    {
        return [
            1 => 'وێژەیی',
            2 => 'زانستی',
            3 => 'پیشەیی',
        ];
    }

    public function getEducationType(): string
    {
        return $this->getEducationTypeArray()[$this->education_type_id];
    }

    private static function getLatestStudent(): object|null
    {
        return self::orderBy('id', 'DESC')->first();
    }

    private static function getLatestStudentId(): int
    {
        return self::getLatestStudent() ? self::getLatestStudent()->id : 0;
    }

    public static function generateStudentNumber(): string
    {
        $prefix = strtoupper(config('envAccess.STUDENT_NUMBER_PREFIX') . '_');
        $last = self::getLatestStudentId();
        $next = 1 + $last;

        return sprintf(
            '%s%s',
            $prefix,
            str_pad((string)$next, 6, "0", STR_PAD_LEFT)
        );
    }

}

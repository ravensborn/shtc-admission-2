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

    const STATUS_DEFAULT = 0;
    const STATUS_PENDING = 1;
    const STATUS_ACCEPTED = 2;
    const STATUS_INCOMPLETE = 3;

    public static function getStatusArray() {
        return [
            self::STATUS_DEFAULT => 'Default',
            self::STATUS_PENDING => 'Pending',
            self::STATUS_ACCEPTED => 'Accepted',
            self::STATUS_INCOMPLETE => 'Incomplete',
        ];
    }

    public static function getStatusName($status) {
        return self::getStatusArray()[$status];
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

    public static function getDepartmentName($id): string
    {
      return self::getDepartments()[$id];
    }


    public function getGender($value): string
    {
        return $value == 0 ? 'نێر' : 'مێ';
    }


    public function getDepartmentTypes(): array
    {
       return [
           1 => 'بەیانیان',
           2 => 'پاڕالێل',
           3 => 'ئێواران',
       ];
    }

    public function getStudentTypes(): array
    {
        return [
            1 => 'دەرەکی',
            2 => 'ناوەکی',
        ];
    }

    private static function getLatestStudent() : object|null
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

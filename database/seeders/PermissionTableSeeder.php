<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'التصنيفات',
            'عرض التصنيفات',
            'اضافة تصنيف',
            'تعديل تصنيف',
            'حذف تصنيف',

            'المقالات',
            'عرض المقالات',
            'اضافة مقالة',
            'تعديل مقالة',
            'حذف مقالة',

            'المحافظات',
            'عرض المحافظات',
            'اضافة محافظة',
            'تعديل محافظة',
            'حذف محافظة',

            'المدن',
            'عرض المدن',
            'اضافة مدينة',
            'تعديل مدينة',
            'حذف مدينة',

            'المستخدمين',
            'عرض المستخدمين',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'الصلاحيات',
            'عرض الصلاحيات',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',


            'عرض العملاء',
            'تفعيل العميل',
            'حذف العميل',

            'عرض الطلبات',
            'حذف الطلب',

            'عرض الرسائل',
            'حذف الرساله',

            'عرض الإعدادات',
            'تعديل الإعدادات'

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

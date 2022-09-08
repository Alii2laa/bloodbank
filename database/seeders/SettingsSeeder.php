<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Settings = [
                'phone' => '0123456789',
                'email' => 'hello@bloodbank.org',
                'about_us' => 'مرحباً بكم, نحن تطبيق بنك دم متخصص في توصيل المتبرعين بالمرضى لمساعدتهم على التبرع و أيضاً نوفر الكثير من الأمور الأخري الطبية.',
                'fb_link' => 'https://www.facebook.com/ipda3tech',
                'tw_link' => 'https://www.facebook.com/ipda3tech',
                'in_link' => 'https://www.facebook.com/ipda3tech',
                'yt_link' => 'https://www.facebook.com/ipda3tech',
                'notification_setting_message' => 'مرحباً من هنا يمكنك تعديل و تصفية الإشعارات التي تريدها.'
            ];

            Setting::create([
                'phone' => $Settings['phone'],
                'email' => $Settings['email'],
                'about_us' => $Settings['about_us'],
                'fb_link' => $Settings['fb_link'],
                'tw_link' => $Settings['tw_link'],
                'in_link' => $Settings['in_link'],
                'yt_link' => $Settings['yt_link'],
                'notification_setting_message' => $Settings['notification_setting_message']
            ]);

    }
}

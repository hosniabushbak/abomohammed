<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'page_section_access',
            ],
            [
                'id'    => 18,
                'title' => 'head_section_create',
            ],
            [
                'id'    => 19,
                'title' => 'head_section_edit',
            ],
            [
                'id'    => 20,
                'title' => 'head_section_access',
            ],
            [
                'id'    => 21,
                'title' => 'section_create',
            ],
            [
                'id'    => 22,
                'title' => 'section_edit',
            ],
            [
                'id'    => 23,
                'title' => 'section_show',
            ],
            [
                'id'    => 24,
                'title' => 'section_delete',
            ],
            [
                'id'    => 25,
                'title' => 'section_access',
            ],
            [
                'id'    => 26,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 27,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 28,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 29,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 30,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 31,
                'title' => 'clients_management_access',
            ],
            [
                'id'    => 32,
                'title' => 'client_create',
            ],
            [
                'id'    => 33,
                'title' => 'client_edit',
            ],
            [
                'id'    => 34,
                'title' => 'client_show',
            ],
            [
                'id'    => 35,
                'title' => 'client_delete',
            ],
            [
                'id'    => 36,
                'title' => 'client_access',
            ],
            [
                'id'    => 37,
                'title' => 'event_title_create',
            ],
            [
                'id'    => 38,
                'title' => 'event_title_edit',
            ],
            [
                'id'    => 39,
                'title' => 'event_title_show',
            ],
            [
                'id'    => 40,
                'title' => 'event_title_delete',
            ],
            [
                'id'    => 41,
                'title' => 'event_title_access',
            ],
            [
                'id'    => 42,
                'title' => 'client_event_create',
            ],
            [
                'id'    => 43,
                'title' => 'client_event_edit',
            ],
            [
                'id'    => 44,
                'title' => 'client_event_show',
            ],
            [
                'id'    => 45,
                'title' => 'client_event_delete',
            ],
            [
                'id'    => 46,
                'title' => 'client_event_access',
            ],
            [
                'id'    => 47,
                'title' => 'system_access',
            ],
            [
                'id'    => 48,
                'title' => 'site_setting_create',
            ],
            [
                'id'    => 49,
                'title' => 'site_setting_edit',
            ],
            [
                'id'    => 50,
                'title' => 'site_setting_show',
            ],
            [
                'id'    => 51,
                'title' => 'site_setting_delete',
            ],
            [
                'id'    => 52,
                'title' => 'site_setting_access',
            ],
            [
                'id'    => 53,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 54,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 55,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 56,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 57,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 58,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 59,
                'title' => 'question_create',
            ],
            [
                'id'    => 60,
                'title' => 'question_edit',
            ],
            [
                'id'    => 61,
                'title' => 'question_show',
            ],
            [
                'id'    => 62,
                'title' => 'question_delete',
            ],
            [
                'id'    => 63,
                'title' => 'question_access',
            ],
            [
                'id'    => 64,
                'title' => 'answer_create',
            ],
            [
                'id'    => 65,
                'title' => 'answer_edit',
            ],
            [
                'id'    => 66,
                'title' => 'answer_show',
            ],
            [
                'id'    => 67,
                'title' => 'answer_delete',
            ],
            [
                'id'    => 68,
                'title' => 'answer_access',
            ],
            [
                'id'    => 69,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

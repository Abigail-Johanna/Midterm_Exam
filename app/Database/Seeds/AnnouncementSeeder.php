<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Welcome to the New Academic Year!',
                'content' => 'We are excited to welcome all students, teachers, and staff to the new academic year. This year brings many new opportunities for learning and growth. Please make sure to check your course schedules and important dates regularly.',
                'target_role' => 'all',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Student: Important Library Hours Update',
                'content' => 'The library will now be open from 8:00 AM to 10:00 PM on weekdays and 9:00 AM to 6:00 PM on weekends. Please note that all library resources are available online through our digital portal. For any questions, contact the library staff.',
                'target_role' => 'student',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
            ],
            [
                'title' => 'Teacher: Faculty Meeting This Friday',
                'content' => 'There will be a faculty meeting this Friday at 2:00 PM in the main conference room. Please prepare your course reports and student progress updates. Attendance is mandatory for all teaching staff.',
                'target_role' => 'teacher',
                'created_at' => date('Y-m-d H:i:s', strtotime('-3 days'))
            ],
            [
                'title' => 'Student: Course Registration Opens Next Week',
                'content' => 'Course registration for the next semester will open on Monday, October 28th at 9:00 AM. Please prepare your course selections in advance and ensure you meet all prerequisites. Contact your academic advisor if you have any questions about course requirements.',
                'target_role' => 'student',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 week'))
            ],
            [
                'title' => 'Teacher: New Teaching Resources Available',
                'content' => 'New teaching resources and materials have been uploaded to the faculty portal. Please review the updated curriculum guidelines and assessment rubrics. Training sessions will be scheduled next week.',
                'target_role' => 'teacher',
                'created_at' => date('Y-m-d H:i:s', strtotime('-5 days'))
            ]
        ];

        // Insert data into the announcements table
        $this->db->table('announcements')->insertBatch($data);
    }
}
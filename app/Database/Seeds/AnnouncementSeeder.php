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
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Important: Library Hours Update',
                'content' => 'The library will now be open from 8:00 AM to 10:00 PM on weekdays and 9:00 AM to 6:00 PM on weekends. Please note that all library resources are available online through our digital portal. For any questions, contact the library staff.',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
            ],
            [
                'title' => 'Student Portal Maintenance Scheduled',
                'content' => 'The student portal will undergo scheduled maintenance on Sunday, October 20th from 2:00 AM to 6:00 AM. During this time, the portal may be temporarily unavailable. We apologize for any inconvenience and appreciate your patience.',
                'created_at' => date('Y-m-d H:i:s', strtotime('-5 days'))
            ],
            [
                'title' => 'New Course Registration Opens Next Week',
                'content' => 'Course registration for the next semester will open on Monday, October 28th at 9:00 AM. Please prepare your course selections in advance and ensure you meet all prerequisites. Contact your academic advisor if you have any questions about course requirements.',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 week'))
            ]
        ];

        // Insert data into the announcements table
        $this->db->table('announcements')->insertBatch($data);
    }
}
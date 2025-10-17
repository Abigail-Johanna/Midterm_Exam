<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTargetRoleToAnnouncements extends Migration
{
    public function up()
    {
        $this->forge->addColumn('announcements', [
            'target_role' => [
                'type' => 'ENUM',
                'constraint' => ['all', 'student', 'teacher', 'admin'],
                'default' => 'all',
                'after' => 'content'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('announcements', 'target_role');
    }
}

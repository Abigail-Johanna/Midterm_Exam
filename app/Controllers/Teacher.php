<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class Teacher extends BaseController
{
    protected $announcementModel;

    public function __construct()
    {
        $this->announcementModel = new AnnouncementModel();
    }
    /**
     * Teacher Dashboard
     */
    public function dashboard()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Please login first.');
        }

        // Check if user has teacher role
        $userRole = session()->get('user_role');
        if ($userRole !== 'teacher') {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
        }

        // Get teacher-specific announcements
        $announcements = $this->announcementModel->getAnnouncementsByRole('teacher');

        $data = [
            'title' => 'Teacher Dashboard',
            'user_name' => session()->get('user_name'),
            'user_role' => $userRole,
            'announcements' => $announcements
        ];

        return view('teacher_dashboard', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class Announcement extends BaseController
{
    protected $announcementModel;

    public function __construct()
    {
        $this->announcementModel = new AnnouncementModel();
    }

    /**
     * Display role-specific announcements
     */
    public function index()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Please login first.');
        }

        $userRole = session()->get('user_role');
        
        // Fetch announcements specific to user role
        $announcements = $this->announcementModel->getAnnouncementsByRole($userRole);

        $data = [
            'title' => 'Announcements',
            'announcements' => $announcements,
            'user_name' => session()->get('user_name'),
            'user_role' => $userRole
        ];

        return view('announcements', $data);
    }
}
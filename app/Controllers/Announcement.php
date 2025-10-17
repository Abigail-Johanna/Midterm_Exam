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
     * Display all announcements
     */
    public function index()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Please login first.');
        }

        // Fetch all announcements ordered by created_at descending (newest first)
        $announcements = $this->announcementModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'title' => 'Announcements',
            'announcements' => $announcements,
            'user_name' => session()->get('user_name'),
            'user_role' => session()->get('user_role')
        ];

        return view('announcements', $data);
    }
}
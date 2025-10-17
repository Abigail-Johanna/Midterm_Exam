<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class Admin extends BaseController
{
    protected $announcementModel;

    public function __construct()
    {
        $this->announcementModel = new AnnouncementModel();
    }
    /**
     * Admin Dashboard
     */
    public function dashboard()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Please login first.');
        }

        // Check if user has admin role
        $userRole = session()->get('user_role');
        if ($userRole !== 'admin') {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
        }

        $data = [
            'title' => 'Admin Dashboard',
            'user_name' => session()->get('user_name'),
            'user_role' => $userRole
        ];

        return view('admin_dashboard', $data);
    }

    /**
     * Manage announcements
     */
    public function manageAnnouncements()
    {
        // Check if user is logged in and is admin
        if (!session()->get('logged_in') || session()->get('user_role') !== 'admin') {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
        }

        $announcements = $this->announcementModel->getAllAnnouncementsForAdmin();

        $data = [
            'title' => 'Manage Announcements',
            'announcements' => $announcements,
            'user_name' => session()->get('user_name'),
            'user_role' => session()->get('user_role')
        ];

        return view('admin_manage_announcements', $data);
    }

    /**
     * Create new announcement
     */
    public function createAnnouncement()
    {
        // Check if user is logged in and is admin
        if (!session()->get('logged_in') || session()->get('user_role') !== 'admin') {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
        }

        if ($this->request->getMethod() === 'GET') {
            $data = [
                'title' => 'Create Announcement',
                'user_name' => session()->get('user_name'),
                'user_role' => session()->get('user_role')
            ];
            return view('admin_create_announcement', $data);
        }

        if ($this->request->getMethod() === 'POST') {
            if (!$this->validate([
                'title' => 'required|min_length[3]|max_length[255]',
                'content' => 'required|min_length[10]',
                'target_role' => 'required|in_list[all,student,teacher,admin]'
            ])) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                'target_role' => $this->request->getPost('target_role')
            ];

            if ($this->announcementModel->save($data)) {
                return redirect()->to('/admin/manage-announcements')->with('success', 'Announcement created successfully!');
            } else {
                return redirect()->back()->withInput()->with('errors', $this->announcementModel->errors());
            }
        }
    }
}

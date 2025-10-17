<?php

namespace App\Controllers;

class Admin extends BaseController
{
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
}

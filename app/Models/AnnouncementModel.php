<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table = 'announcements';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'title',
        'content',
        'target_role'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation rules
    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'content' => 'required|min_length[10]',
        'target_role' => 'required|in_list[all,student,teacher,admin]'
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Announcement title is required',
            'min_length' => 'Title must be at least 3 characters long',
            'max_length' => 'Title cannot exceed 255 characters'
        ],
        'content' => [
            'required' => 'Announcement content is required',
            'min_length' => 'Content must be at least 10 characters long'
        ]
    ];

    /**
     * Get all announcements ordered by creation date (newest first)
     */
    public function getAllAnnouncements()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    /**
     * Get recent announcements (last 5)
     */
    public function getRecentAnnouncements($limit = 5)
    {
        return $this->orderBy('created_at', 'DESC')->limit($limit)->find();
    }

    /**
     * Get announcements for specific role
     */
    public function getAnnouncementsByRole($role)
    {
        return $this->where('target_role', $role)
                   ->orWhere('target_role', 'all')
                   ->orderBy('created_at', 'DESC')
                   ->findAll();
    }

    /**
     * Get all announcements for admin management
     */
    public function getAllAnnouncementsForAdmin()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}
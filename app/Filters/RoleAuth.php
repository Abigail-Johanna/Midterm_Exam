<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleAuth implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Please login first.');
        }

        $userRole = session()->get('user_role');
        $currentPath = $request->getUri()->getPath();

        // Admin can access any route starting with /admin
        if ($userRole === 'admin') {
            if (strpos($currentPath, '/admin') === 0) {
                return; // Allow access
            }
        }

        // Teacher can only access routes starting with /teacher
        if ($userRole === 'teacher') {
            if (strpos($currentPath, '/teacher') === 0) {
                return; // Allow access
            }
        }

        // Student can access routes starting with /student and /announcements
        if ($userRole === 'student') {
            if (strpos($currentPath, '/student') === 0 || $currentPath === '/announcements') {
                return; // Allow access
            }
        }

        // If user tries to access a route not permitted for their role
        return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing here
    }
}

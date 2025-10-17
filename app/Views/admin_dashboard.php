<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">
                    <i class="fas fa-user-shield text-danger"></i> Admin Dashboard
                </h2>
                <span class="badge bg-danger">Administrator</span>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-user-shield fa-4x text-danger mb-4"></i>
                    <h3 class="text-danger">Welcome, Admin!</h3>
                    <p class="lead text-muted">You are now logged in as an administrator.</p>
                    <p class="text-muted">This is your dedicated admin dashboard where you can manage the entire system, users, courses, and system settings.</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">User Management</h5>
                            <p class="card-text">Manage students, teachers, and other administrators.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-book fa-2x text-success mb-3"></i>
                            <h5 class="card-title">Course Management</h5>
                            <p class="card-text">Create and manage courses and course content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-bullhorn fa-2x text-warning mb-3"></i>
                            <h5 class="card-title">Announcements</h5>
                            <p class="card-text">Create and manage system-wide announcements.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-cog fa-2x text-info mb-3"></i>
                            <h5 class="card-title">System Settings</h5>
                            <p class="card-text">Configure system settings and preferences.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="<?= base_url('/announcements') ?>" class="btn btn-primary">
                    <i class="fas fa-bullhorn"></i> View Announcements
                </a>
                <a href="<?= base_url('/auth/logout') ?>" class="btn btn-outline-secondary">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

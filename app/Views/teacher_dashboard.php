<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">
                    <i class="fas fa-chalkboard-teacher text-primary"></i> Teacher Dashboard
                </h2>
                <span class="badge bg-success">Teacher</span>
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
                    <i class="fas fa-chalkboard-teacher fa-4x text-primary mb-4"></i>
                    <h3 class="text-primary">Welcome, Teacher!</h3>
                    <p class="lead text-muted">You are now logged in as a teacher.</p>
                    <p class="text-muted">This is your dedicated teacher dashboard where you can manage your courses, students, and teaching materials.</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-book fa-2x text-info mb-3"></i>
                            <h5 class="card-title">My Courses</h5>
                            <p class="card-text">Manage your assigned courses and course materials.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-2x text-success mb-3"></i>
                            <h5 class="card-title">Students</h5>
                            <p class="card-text">View and manage your students' progress and grades.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-tasks fa-2x text-warning mb-3"></i>
                            <h5 class="card-title">Assignments</h5>
                            <p class="card-text">Create and grade assignments and quizzes.</p>
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

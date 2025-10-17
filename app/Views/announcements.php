<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">
                    <i class="fas fa-bullhorn text-primary"></i> Announcements
                </h2>
                <span class="badge bg-primary"><?= count($announcements) ?> Announcement(s)</span>
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

            <?php if (empty($announcements)): ?>
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-bullhorn fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No announcements yet</h5>
                        <p class="text-muted">Check back later for important updates and news.</p>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($announcements as $announcement): ?>
                        <div class="col-12 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-header bg-light">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="card-title mb-0 text-primary">
                                            <?= esc($announcement['title']) ?>
                                        </h5>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar-alt"></i>
                                            <?= date('M d, Y \a\t g:i A', strtotime($announcement['created_at'])) ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><?= nl2br(esc($announcement['content'])) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="mt-4">
                <a href="<?= base_url('/dashboard') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

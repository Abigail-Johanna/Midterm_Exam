<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">
                        <i class="fas fa-plus text-success"></i> Create New Announcement
                    </h4>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?= form_open('/admin/create-announcement') ?>
                        <div class="mb-3">
                            <label for="title" class="form-label">Announcement Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" 
                                   value="<?= old('title') ?>" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label for="target_role" class="form-label">Target Audience <span class="text-danger">*</span></label>
                            <select class="form-select" id="target_role" name="target_role" required>
                                <option value="">Select target audience...</option>
                                <option value="all" <?= old('target_role') === 'all' ? 'selected' : '' ?>>All Users</option>
                                <option value="student" <?= old('target_role') === 'student' ? 'selected' : '' ?>>Students Only</option>
                                <option value="teacher" <?= old('target_role') === 'teacher' ? 'selected' : '' ?>>Teachers Only</option>
                                <option value="admin" <?= old('target_role') === 'admin' ? 'selected' : '' ?>>Admins Only</option>
                            </select>
                            <div class="form-text">Choose who should see this announcement.</div>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Announcement Content <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="content" name="content" rows="6" 
                                      required minlength="10"><?= old('content') ?></textarea>
                            <div class="form-text">Minimum 10 characters required.</div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Create Announcement
                            </button>
                            <a href="<?= base_url('/admin/manage-announcements') ?>" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

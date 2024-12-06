<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/stylee.css') ?>">
</head>
<body>
  <div class="wrapper">
    <div class="logo">
      <img src="<?= base_url('assets/images/najj.png') ?>" width="180" alt="Logo">
    </div>

    <div class="form-container">
      <form action="<?= base_url('auth/process_reset_password') ?>" method="POST" class="reset-password">
        <h2>Reset Password</h2>

        <!-- Hidden input for the token -->
        <input type="hidden" name="token" value="<?= esc($token); ?>">

        <div class="field">
          <input type="password" name="password" placeholder="Enter new password" required>
        </div>

        <div class="field">
          <input type="password" name="confirm_password" placeholder="Confirm new password" required>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <div class="field btn">
          <div class="btn-layer"></div>
          <input type="submit" value="Reset Password">
        </div>
      </form>
    </div>
  </div>

  <script src="<?= base_url('assets/js/scriptt.js') ?>"></script>
</body>
</html>

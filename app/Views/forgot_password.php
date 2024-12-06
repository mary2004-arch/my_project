<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/stylee.css') ?>">
</head>
<body>
  <div class="wrapper">
    <div class="logo">
      <img src="<?= base_url('assets/images/najj.png') ?>" width="180" alt="Logo">
    </div>

    <div class="form-container">
      <form action="<?= base_url('auth/process_forgot_password') ?>" method="POST" class="forgot-password">
        <h2>Forgot Password</h2>
        <div class="field">
          <input type="email" name="email" placeholder="Enter your registered email" required>
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
          <input type="submit" value="Send Reset Link">
        </div>
      </form>
    </div>
  </div>

  <script src="<?= base_url('assets/js/scriptt.js') ?>"></script>
</body>
</html>

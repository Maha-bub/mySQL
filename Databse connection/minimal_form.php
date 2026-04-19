<?php
$database=new mysqli("localhost","root","","pwad_batch-70");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $database->query("call add_data('$name','$address','$email','$phone')");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Information</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&family=DM+Serif+Display&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <p class="heading">Your details</p>
  <p class="sub">Fill in the fields below to continue</p>

  <?php
  $submitted = false;
  $name = $address = $email = $phone = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = htmlspecialchars(trim($_POST['name']    ?? ''));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));
    $email   = htmlspecialchars(trim($_POST['email']   ?? ''));
    $phone   = htmlspecialchars(trim($_POST['phone']   ?? ''));

    if ($name && $address && $email && $phone) {
      $submitted = true;
    }
  }
  ?>

  <?php if ($submitted): ?>
    <!-- PHP success state -->
    <div class="success" style="display:flex;">
      <div class="success-icon">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="#1a1a1a" stroke-width="1.6">
          <circle cx="11" cy="11" r="9"/>
          <path d="M7 11l3 3 5-5"/>
        </svg>
      </div>
      <h3>All done!</h3>
      <p>Your information has been<br>submitted successfully.</p>
      <div class="php-success" style="margin-top:1rem;">
        <strong><?= $name ?></strong> — <?= $email ?>
      </div>
    </div>

  <?php else: ?>
    <!-- Form -->
    <form id="form-body" action="" method="post" novalidate>

      <div class="field">
        <label for="f-name">Full name</label>
        <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.4">
          <circle cx="8" cy="5.5" r="2.5"/>
          <path d="M2.5 13c0-3 2-4.5 5.5-4.5s5.5 1.5 5.5 4.5"/>
        </svg>
        <input id="f-name" type="text" name="name" placeholder="Jane Doe"
               autocomplete="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
      </div>

      <div class="field">
        <label for="f-address">Address</label>
        <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.4">
          <path d="M8 2C5.8 2 4 3.8 4 6c0 3 4 8 4 8s4-5 4-8c0-2.2-1.8-4-4-4z"/>
          <circle cx="8" cy="6" r="1.3"/>
        </svg>
        <input id="f-address" type="text" name="address" placeholder="123 Main Street, City"
               autocomplete="street-address" value="<?= htmlspecialchars($_POST['address'] ?? '') ?>">
      </div>

      <div class="field">
        <label for="f-email">Email</label>
        <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.4">
          <rect x="1.5" y="3.5" width="13" height="9" rx="2"/>
          <path d="M1.5 5.5l6.5 4 6.5-4"/>
        </svg>
        <input id="f-email" type="email" name="email" placeholder="jane@example.com"
               autocomplete="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
      </div>

      <div class="field">
        <label for="f-phone">Phone</label>
        <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.4">
          <rect x="4" y="1" width="8" height="14" rx="2"/>
          <circle cx="8" cy="12.5" r="0.7" fill="currentColor"/>
        </svg>
        <input id="f-phone" type="tel" name="phone" placeholder="+1 234 567 890"
               autocomplete="tel" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
      </div>

      <div class="divider"></div>
      <button type="submit" class="btn">Submit information</button>
    </form>

    <script>
      document.querySelector('form').addEventListener('submit', function (e) {
        var inputs = this.querySelectorAll('input');
        var valid = true;
        inputs.forEach(function (inp) {
          if (!inp.value.trim()) {
            inp.classList.add('error');
            valid = false;
            inp.addEventListener('input', function () {
              inp.classList.remove('error');
            }, { once: true });
          }
        });
        if (!valid) e.preventDefault();
      });
    </script>

  <?php endif; ?>
 
</div>

</body>
</html>
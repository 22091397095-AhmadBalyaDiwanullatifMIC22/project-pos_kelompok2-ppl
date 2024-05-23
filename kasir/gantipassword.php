<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Ganti Password
      <small>Ganti Password</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Ganti Password</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-5 col-lg-offset-3">

        <?php
        if (isset($_GET['alert'])) {
          if ($_GET['alert'] == "sukses") {
            echo "<div class='alert alert-success'>Password anda berhasil diganti!</div>";
          }
        }
        ?>

        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Ganti Password</h3>
          </div>
          <div class="box-body">
            <form action="gantipassword_act.php" method="post">
              <div class="form-group">
                <label for="password">Masukkan Password Baru</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password" placeholder="Masukkan Password Baru .." name="password" required="required" min="5">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="togglePassword">
                      <i id="eyeIcon" class="fa fa-eye"></i>
                    </button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
              </div>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>

<script>
  const togglePassword = document.getElementById('togglePassword');
  const password = document.getElementById('password');
  const eyeIcon = document.getElementById('eyeIcon');

  togglePassword.addEventListener('click', function() {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    // Change the eye icon
    if (type === 'password') {
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    } else {
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    }
  });
</script>

<?php include 'footer.php'; ?>
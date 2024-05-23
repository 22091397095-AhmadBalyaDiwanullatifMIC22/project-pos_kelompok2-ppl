<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Hutang
      <small>Daftar Hutang</small>
    </h1>
    <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Hutang</i></button><br>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-datatable">
        <thead>
          <tr>
            <th>No.urut</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Alasan</th>
            <th>Penghutang</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $query = mysqli_query($koneksi, "SELECT * FROM hutang where jumlah > 1000 ORDER BY tgl_hutang DESC");
          $no = 1;
          while ($data = mysqli_fetch_assoc($query)) {
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['jumlah'] ?></td>
              <td><?= $data['tgl_hutang'] ?></td>
              <td><?= $data['alasan'] ?></td>
              <td><?= $data['penghutang'] ?></td>
              <td>
                <!-- Button untuk modal -->
                <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_hutang']; ?>"></a>
              </td>
            </tr>
            <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $data['id_hutang']; ?>" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Hutang</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="proses-edit-hutang.php" method="get">

                      <?php
                      $id = $data['id_hutang'];
                      $query_edit = mysqli_query($koneksi, "SELECT * FROM hutang WHERE id_hutang='$id'");
                      //$result = mysqli_query($conn, $query);
                      while ($row = mysqli_fetch_array($query_edit)) {
                      ?>


                        <input type="hidden" name="id_hutang" value="<?php echo $row['id_hutang']; ?>">

                        <div class="form-group">
                          <label>Jumlah</label>
                          <input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">
                        </div>

                        <div class="form-group">
                          <label>Tanggal</label>
                          <input type="date" name="tgl_hutang" class="form-control" value="<?php echo $row['tgl_hutang']; ?>">
                        </div>

                        <div class="form-group">
                          <label>Alasan</label>
                          <input type="text" name="alasan" class="form-control" value="<?php echo $row['alasan']; ?>">
                        </div>

                        <div class="form-group">
                          <label>Penghutang</label>
                          <input type="text" name="penghutang" class="form-control" value="<?php echo $row['penghutang']; ?>">
                        </div>

                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Ubah</button>
                          <a href="hapus-hutang.php?id_hutang=<?= $row['id_hutang']; ?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                      <?php
                      }
                      //mysql_close($host);
                      ?>

                    </form>
                  </div>
                </div>

              </div>
            </div>



            <!-- Modal -->
            <div id="myModalTambah" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- konten modal-->
                <div class="modal-content">
                  <!-- heading modal -->
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Hutang</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- body modal -->
                  <form action="tambah-hutang.php" method="get">
                    <div class="modal-body">
                      Jumlah :
                      <input type="text" class="form-control" name="jumlah">
                      Tanggal :
                      <input type="date" class="form-control" name="tgl_hutang">
                      Penghutang :
                      <input type="text" class="form-control" name="penghutang">
                      Alasan :
                      <input type="text" class="form-control" name="alasan">
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Tambah</button>
                  </form>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
              </div>

            </div>
    </div>


  <?php
          }
  ?>
  </tbody>
  </table>
  </div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php require 'footer.php' ?>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }

  // Area Chart Example
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["7 hari lalu", "6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu", "1 hari lalu"],
      datasets: [{
        label: "Pendapatan",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: [<?php echo $tujuhhari['0'] ?>, <?php echo $enamhari['0'] ?>, <?php echo $limahari['0'] ?>, <?php echo $empathari['0'] ?>, <?php echo $tigahari['0'] ?>, <?php echo $duahari['0'] ?>, <?php echo $satuhari['0'] ?>],
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 7
          }
        }],
        yAxes: [{
          ticks: {
            maxTicksLimit: 5,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
              return 'Rp.' + number_format(value);
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
          }
        }
      }
    }
  });
</script>

<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';
  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Pendapatan", "Pengeluaran"],
      datasets: [{
        data: [<?php echo $pendapatan ?>, <?php echo $pengeluaran ?>],
        backgroundColor: ['#4e73df', '#e74a3b'],
        hoverBackgroundColor: ['#2e59d9', '#e74a3b'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });
</script>
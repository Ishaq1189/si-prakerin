  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Beranda</a>
        </li>
        <li class="breadcrumb-item active">Halaman Beranda</li>
      </ol>
      <?php echo $this->session->flashdata('message');?>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-4">
          <?php 
            $query = $this->db->query("SELECT COUNT(tb_mahasiswa.nim) AS total FROM `tb_mahasiswa` JOIN tb_mhs_pilih_perusahaan ON tb_mahasiswa.nim = tb_mhs_pilih_perusahaan.nim JOIN tb_perusahaan ON tb_mhs_pilih_perusahaan.id_perusahaan = tb_perusahaan.id_perusahaan JOIN tahun_akademik ON tb_mahasiswa.id_tahun_akademik = tahun_akademik.id_tahun_akademik JOIN tb_program_studi ON tb_mahasiswa.id_program_studi = tb_program_studi.id_program_studi");
            foreach ($query->result() as $key):
              $total_mhs_pkl = $key->total;
            endforeach;
          ?>
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5"><h3><?php echo $total_mhs_pkl; ?></h3> JUMLAH MAHASISWA PKL</div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
          <?php 
            $query = $this->db->query("SELECT COUNT(id_perusahaan) AS total FROM `tb_monev` WHERE id_perusahaan != 'NULL'");
            foreach ($query->result() as $key):
              $total_jadwal = $key->total;
            endforeach;
          ?>
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar-plus-o"></i>
              </div>
              <div class="mr-5"><h3><?php echo $total_jadwal; ?></h3> JUMLAH JADWAL MONITORING</div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
          <?php 
            $query = $this->db->query("SELECT COUNT(id_perusahaan) AS total FROM `tb_monev` WHERE status = 'Selesai'");
            foreach ($query->result() as $key):
              $total_selesai = $key->total;
            endforeach;
          ?>
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar-check-o"></i>
              </div>
              <div class="mr-5"><h3><?php echo $total_selesai; ?></h3> SELESAI DI MONITORING</div>
            </div>
          </div>
        </div>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header" align="center">
          <b>JADWAL MONOTORING HARI INI</b>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Pemonev</th>
                  <th>Perusahaan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tidak Ada Data</td>
                  <td>Tidak Ada Data</td>
                  <td>Proses</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
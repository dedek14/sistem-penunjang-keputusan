 <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="_img/user/<?= $sessionlogin['foto'] ?>" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name"><?= $sessionlogin['nama_user'] ?></p>
          <p class="designation"><?= $hak_akses ?></p>
        </div>
       
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="<?= $webserver ?>">
        <span class="menu-title">Home</span>
        <i class="icon-screen-desktop menu-icon"></i>
      </a>
    </li>

    <?php if($hak_akses=='HRD'){ ?>
    <li class="nav-item nav-category"><span class="nav-link">Master Data</span></li>
    <li class="nav-item">
      <a  class="nav-link"  href="data-devisi" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Devisi</span>
        <i class="icon-layers menu-icon"></i>
      </a>
     
    </li>
    <li class="nav-item">
      <a class="nav-link" href="data-karyawan">
        <span class="menu-title">Karyawan</span>
        <i class="icon-globe menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="data-kriteria">
        <span class="menu-title">Kriteria Penilaian</span>
        <i class="icon-book-open menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="evaluasi-penilaian">
        <span class="menu-title">Data Nilai</span>
        <i class="icon-chart menu-icon"></i>
      </a>
    </li>
    
    <li class="nav-item nav-category"><span class="nav-link">Laporan</span></li>
    <li class="nav-item">
      <a class="nav-link" href="laporan-karyawan">
        <span class="menu-title">Karyawan</span>
        <i class="icon-grid menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="hasil-keputusan">
        <span class="menu-title">Hasil Keputusan</span>
        <i class="icon-grid menu-icon"></i>
      </a>
    </li>
   

  <?php }?>


  <?php if($hak_akses=='Section Manager') { ?>

    <li class="nav-item nav-category"><span class="nav-link">Proses</span></li>
    <li class="nav-item">
      <a  class="nav-link"  href="data-penilaian" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Penilaian Karyawan</span>
        <i class="icon-layers menu-icon"></i>
      </a>
      
    </li>

    
   
    

  <?php }?>

  <?php if($hak_akses=='Departemen Manager') { ?>

    <li class="nav-item nav-category"><span class="nav-link">Master Data</span></li>
    <li class="nav-item">
      <a  class="nav-link"  href="data-nilai" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Data Nilai</span>
        <i class="icon-layers menu-icon"></i>
      </a>
      
    </li>
     <li class="nav-item">
      <a  class="nav-link"  href="evaluasi-penilaian" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Evaluasi Penilaian</span>
        <i class="icon-layers menu-icon"></i>
      </a>
      
    </li>

    <li class="nav-item nav-category"><span class="nav-link">Laporan</span></li>
    <li class="nav-item">
      <a class="nav-link" href="laporan-karyawan">
        <span class="menu-title">Karyawan</span>
        <i class="icon-grid menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="hasil-keputusan">
        <span class="menu-title">Hasil Keputusan</span>
        <i class="icon-grid menu-icon"></i>
      </a>
    </li>

    
    
   

    

  <?php }?>

   
    
  </ul>
</nav>
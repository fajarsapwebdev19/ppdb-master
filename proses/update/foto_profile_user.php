<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['update']))
  {
    if(isset($_POST['id']))
    {
      $id = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['id'])));
      $pic_adm = $_FILES['foto']['name'];
      $tmp_pic_adm = $_FILES['foto']['tmp_name'];
      $size_pic_adm = $_FILES['foto']['size'];
      $extension = array('jpg','jpeg','png');
      $ex_info = pathinfo($pic_adm, PATHINFO_EXTENSION);

      if(empty($_FILES['foto']['name']))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger text-white bg-danger">
                              <div class="alert-message"><em class="fas fa-info-circle"></em> Gagal ! Foto Kosong</div>
                            </div>';
                            header('location: ../../Admin/?page=profile');
      }else{
        if(!in_array($ex_info, $extension))
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-warning bg-warning text-primary">
                                    <div class="alert-message">
                                      <em class="fas fa-info-circle"></em> Ekstensi Foto Tidak Sesuai !
                                    </div>
                                  </div>';
                                  header('location: ../../Admin/?page=profile');
        }else{
          if($size_pic_adm > 2000000)
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                                      <div class="alert-message">
                                        <em class="fas fa-times-circle"></em> Gagal! Ukuran File Lebih Dari 2 MB
                                      </div>
                                    </div>';
                                    header('location: ../../Admin/?page=profile');
          }else{
            $dir = "../../Foto/foto_profile/".$pic_adm;
            
            $admin = mysqli_query($koneksi, "SELECT foto FROM admin WHERE id='$id'");
            $db_adm = mysqli_fetch_assoc($admin);

            if(empty($db_adm['foto']))
            {
              move_uploaded_file($tmp_pic_adm, $dir);
            }
            else{
              if(file_exists('../../Foto/foto_profile/'.$db_adm['foto']))
              {
                unlink('../../Foto/foto_profile/'.$db_adm['foto']);
              }

              move_uploaded_file($tmp_pic_adm, $dir);
            }

            $update = mysqli_query($koneksi, "UPDATE admin SET foto='$pic_adm' WHERE id='$id'");

            if($update)
            {
              $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                <div class="alert-message">
                  <em class="fas fa-check-circle"></em> Berhasil Update Foto Profile
                </div>
              </div>';
              header('location: ../../Admin/?page=profile');
            }
          }
        }
      }
    }
  }elseif(isset($_POST['update_user']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $pic_usr = $_FILES['foto']['name'];
      $tmp_pic_usr = $_FILES['foto']['tmp_name'];
      $size_pic_usr = $_FILES['foto']['size'];
      $extension = array('jpg','jpeg','png');
      $ex_info = pathinfo($pic_usr, PATHINFO_EXTENSION);

      if(empty($_FILES['foto']['name']))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger text-white bg-danger">
                              <div class="alert-message"><em class="fas fa-info-circle"></em> Gagal ! Foto Kosong</div>
                            </div>';
                            header('location: ../../User/?page=profile');
      }else{
        if(!in_array($ex_info, $extension))
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-warning bg-warning text-primary">
                                    <div class="alert-message">
                                      <em class="fas fa-info-circle"></em> Ekstensi Foto Tidak Sesuai !
                                    </div>
                                  </div>';
                                  header('location: ../../User/?page=profile');
        }else{
          if($size_pic_usr > 2000000)
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                                      <div class="alert-message">
                                        <em class="fas fa-times-circle"></em> Gagal! Ukuran File Lebih Dari 2 MB
                                      </div>
                                    </div>';
                                    header('location: ../../User/?page=profile');
          }else{
            $dir = "../../Foto/foto_profile/".$pic_usr;
            
            $user = mysqli_query($koneksi, "SELECT foto='$pic_usr' FROM admin WHERE username='$username'");
            $db_usr = mysqli_fetch_assoc($user);

            if(empty($db_usr['foto']))
            {
              move_uploaded_file($tmp_pic_usr, $dir);
            }
            else{
              if(file_exists('../../Foto/foto_profile/'.$db_usr['foto']))
              {
                unlink('../../Foto/foto_profile/'.$db_usr['foto']);
              }

              move_uploaded_file($tmp_pic_usr, $dir);
            }

            $update = mysqli_query($koneksi, "UPDATE user SET foto='$pic_usr' WHERE username='$username'");

            if($update)
            {
              $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                <div class="alert-message">
                  <em class="fas fa-check-circle"></em> Berhasil Update Foto Profile
                </div>
              </div>';
              header('location: ../../User/?page=profile');
            }
          }
        }
      }
    }
  }

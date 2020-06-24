if(isset($_POST['login'])){

    $connect = new mysqli("localhost","root","","d_base_espara");
    $username = $_POST['username'];
    $pass     = md5($_POST['pass']);
    $level = $_POST['level'];

    if ($level == 'Kurikulum') {
        $login = mysqli_query($connect, "SELECT * FROM tb_guru WHERE uname = '$username'");
        $row=mysqli_fetch_array($login);
        if ($row['uname'] == $username && $row['pass'] == $pass && $row['jabatan'] == "Kaur. Kurikulum" && $row['status_guru'] == 1)
        {
          session_start();
          $_SESSION['userdata'] = $row['kd_guru'];
          $_SESSION['username'] = $row['nama_guru'];
          header('location:http://localhost/apel_espara/kakur/');
        }
        elseif ($row['uname'] == $username && $row['pass'] == $pass && $row['status_guru'] == 1) {
            session_start();
          $_SESSION['userdata'] = $row['kd_guru'];
          $_SESSION['username'] = $row['nama_guru'];
          header('location:http://localhost/apel_espara/guru/');
        }
        elseif ($row['uname'] == $username && $row['pass'] == $pass && $row['status_guru'] == 0) {
            echo "<div class='alert alert-danger'>Anda Sudah <b>TIDAK AKTIF</b> di ESPARA</div>";
        }
        else
        {
          echo "<div class='alert alert-danger'>Username Atau Password Anda <b>SALAH !</b></div>";
        }
        
    }else{
        $login = mysqli_query($connect, "SELECT * FROM tb_guru WHERE uname = '$username'");
        $row=mysqli_fetch_array($login);
        if($row['uname'] == $username && $row['pass'] == $pass && $row['status_guru'] == 1) {
            session_start();
          $_SESSION['userdata'] = $row['kd_guru'];
          $_SESSION['username'] = $row['nama_guru'];
          header('location:http://localhost/apel_espara/guru/');
        }
        elseif ($row['uname'] == $username && $row['pass'] == $pass && $row['status_guru'] == 0) {
            echo "<div class='alert alert-danger'>Anda Sudah <b>TIDAK AKTIF</b> di ESPARA</div>";
        }
        else
        {
          echo "<div class='alert alert-danger'>Username Atau Password Anda <b>SALAH !</b></div>";
        }
    }

}
<?php 
if (isset($_POST['login'])) {
        $connect = new mysqli("localhost","root","","d_base_espara");
        $User = $_POST['username'];
        $Pass = md5($_POST['pass']);
        $Level = $_POST['level'];
        
            $login = mysqli_query($connect, "SELECT * From tb_guru where uname = '$User'");
            $Row = mysqli_fetch_array($login); 
            if ($Row['uname']==$User && $Row['pass']==$Pass && $Row['jabatan']=="Kaur. Kurikulum") {
                session_start();
                $_SESSION['userdata'] = $row['kd_guru'];
                $_SESSION['username'] = $row['nama_guru'];
                header('location: kakur/');
            }elseif ($Row['uname']!=$User || $Row['pass']!=$Pass) {
                echo "<div class='alert alert-danger'>Username Atau Password Anda <b>SALAH !</b></div>";
            }elseif ($Row['jabatan']!="Kaur. Kurikulum") {
                echo "<div class='alert alert-danger'>Anda Bukan <b>ADMIN !</b></div>";
            }
        
    }
?>
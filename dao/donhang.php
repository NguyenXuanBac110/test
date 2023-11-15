<?php
// require_once 'pdo.php';


function bill_user_insert_id($madh, $iduser, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_tel, $total, $ship, $voucher, $tongthanhtoan, $pttt)
{
  $sql = "INSERT INTO bill(madh,iduser,nguoidat_ten, nguoidat_email, nguoidat_tel, nguoidat_diachi,nguoinhan_ten,nguoinhan_diachi,nguoinhan_tel,total,ship,voucher,tongthanhtoan,pttt) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  return pdo_execute_id($sql, $madh, $iduser, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_tel, $total, $ship, $voucher, $tongthanhtoan, $pttt);
}

function donhang_new()
{
  $sql = "SELECT * FROM bill ORDER BY id DESC ";
  return pdo_query($sql);
}

function donhang_all()
{
  $sql = "SELECT * FROM bill ";
  return pdo_query($sql);
}
function donhang_id($iduser)
{
  $sql = "SELECT * FROM bill WHERE iduser=?  ";
  return pdo_query($sql, $iduser);
}

function showsp_donhang($dssp)
{
  $html_dssp = '';
  $i = 1;
  foreach ($dssp as $sp) {
    extract($sp);
    $html_dssp .= '<tr>
   <td>' . $i . '</td>
   <td>' . $madh . '</td>
   <td>' . $tongthanhtoan . '</td>
</tr>';
    $i++;
  }
  return $html_dssp;
}


function tong_doanhthu($dssp)
{
  $tong = 0;
  foreach ($dssp as $sp) {
    extract($sp);
    $tong += $tongthanhtoan;
  }
  return $tong;
}

function show_dh_new($dssp)
{
  $html_dssp = '';
  foreach ($dssp as $sp) {
    extract($sp);
    $html_dssp .= '<tr>
   <td>' . $madh . '</td>
   <td>' . $trangthai . '</td>
</tr>';
  }
  return $html_dssp;
}



function show_donhang($dssp)
{
  $html_dssp = '';
  $i = 1;
  foreach ($dssp as $sp) {
    extract($sp);
    $html_dssp .= '<td>' . $i . '</td>
   <td>' . $madh . '</td>
   <td>' . $nguoidat_ten . '</td>
   <td>' . $nguoidat_tel . '</td>
   <td>' . $nguoidat_email . '</td>
   <td>' . $nguoidat_diachi . '</td>
   <td>' . $nguoinhan_ten . '</td>
   <td>' . $nguoinhan_tel . '</td>
   <td>' . $nguoinhan_diachi . '</td>
   <td>' . $tongthanhtoan . '</td>
   <td>
       <a href="admin.php?pg=deldh&id=' . $id . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Huỷ</a>
   </td>
</tr>';
    $i++;
  }
  return $html_dssp;
}

function show_donhang_user($dssp)
{
  $html_dssp = '';
  $i = 1;
  foreach ($dssp as $sp) {
    extract($sp);
    $html_dssp .= '<td>' . $i . '</td>
   <td>' . $madh . '</td>
   <td>' . $nguoidat_ten . '</td>
   <td>' . $nguoidat_tel . '</td>
   <td>' . $nguoidat_email . '</td>
   <td>' . $nguoidat_diachi . '</td>
   <td>' . $nguoinhan_ten . '</td>
   <td>' . $nguoinhan_tel . '</td>
   <td>' . $nguoinhan_diachi . '</td>
   <td>' . $tongthanhtoan . '</td>
   <td>
       <a href="index.php?pg=deletedh&id=' . $id . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Huỷ</a>
   </td>
</tr>';
    $i++;
  }
  return $html_dssp;
}

function donhang_delete($id)
{
  $sql = "DELETE FROM bill WHERE id=?";
  pdo_execute($sql, $id);

}

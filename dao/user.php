<?php
// require_once 'pdo.php';

function user_insert($username, $password, $email){
     $sql = "INSERT INTO user(username, password, email) VALUES (?, ?, ?)"; 
    pdo_execute($sql, $username, $password, $email);
}


function user_insert_id($username,$password,$ten, $diachi, $email, $dienthoai){
  $sql = "INSERT INTO user(ten,username,password,diachi,email,dienthoai) VALUES (?,?,?,?,?,?)"; 
 return  pdo_execute_id($sql,$username,$password,$ten, $diachi, $email, $dienthoai);
}
function user_all() {
  $sql = "SELECT * from user order by id asc";
  return pdo_query($sql);
}
function user_new() {
  $sql = "SELECT * from user order by id DESC";
  return pdo_query($sql);
}


function  checkuser($username,$password){
$sql = "SELECT * from user WHERE username=? and password=?";
  return pdo_query_one($sql,$username,$password);
  
//   if(is_array($kq)&&(count($kq))){
//   return $kq['id']; 
//   }else{
//     return 0;
//   }
}
function checkusername($username){
  $sql = "SELECT * from user WHERE username=?";
  return pdo_query_one($sql,$username);
}
function checkuseremail($email){
  $sql = "SELECT * from user WHERE email=?";
  return pdo_query_one($sql,$email);
}
function  user_update($username,$password,$email,$diachi,$dienthoai,$id){
    $sql = "UPDATE  user SET username=?,password=?,email=?,diachi=?,dienthoai=? WHERE id=?";
    pdo_execute($sql, $username,$password,$email,$diachi,$dienthoai,$id);
}


function  get_user($id){
    $sql = "SELECT * from user WHERE id=?";
      return pdo_query_one($sql,$id);
    }


    // admin 

    function showdm_admin_user($dsdm){
      $html_dm='';
      $i = 1 ;
      foreach ($dsdm as $dm) {
          extract($dm);
       if($role==0){
        $quyen="Khách Hàng";
       }else if($role== 1){
        $quyen= "Admin";
       }
          $html_dm.='<tr>
          <td>'.$i.'</td>
          <td>'.$username.'</td>
          <td>'.$ten.'h</td>
          <td>'.$diachi.'</td>
          <td>'.$email.'</td>
          <th>'.$dienthoai.'</th>
          <td>'.$quyen.'</td>
          <td>
          <a href="admin.php?pg=adminadduser&id='.$id.'" class="btn btn-warning"><i
          class="fa-solid fa-pen-to-square"></i> Sửa</a>
      </td>
      </tr>
        ';
        $i++;
      }
      return $html_dm;
  }



function user_update_admin($id,$role){
  $sql = "UPDATE  user SET role=? WHERE id=?";
  pdo_execute($sql,$role,$id);
}

function showdm_user_new($dsdm){
  $html_dm='';
  $i=1;
  foreach ($dsdm as $dm) {
      extract($dm);
      $html_dm.='<tr>
      <td>'.$i.'</td>
      <td>'.$username.'</td>
  </tr>
    ';
    $i++;
  }
  return $html_dm;
}

// function user_delete($ma_kh){
//     $sql = "DELETE FROM  user  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

// function user_select_all(){
//     $sql = "SELECT * FROM  user";
//     return pdo_query($sql);
// }

function user_select_by_id($id){
    $sql = "SELECT * FROM  user WHERE id=?";
    return pdo_query_one($sql, $id);
}

// function user_exist($ma_kh){
//     $sql = "SELECT count(*) FROM  user WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function user_select_by_role($vai_tro){
//     $sql = "SELECT * FROM  user WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function user_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE  user SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }
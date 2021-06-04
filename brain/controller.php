<?php
include('functions.php');
if(isset($_POST['request']) && $_POST['request'] == 'login')
{
   $username = $_POST['username'];
    $password = $_POST['password'];
    if(login($username,$password)==true)
    {
        session_start();
        $_SESSION['username'] = $username;
        $alt_key = "@!$#@^#&";
        $_SESSION['token_key'] = md5($alt_key.$password);
        
        header('location:../dashboard.php');
    } 
    else 
    {
        
        header('location:../index.php?notice=login_error');
    }
} 
else if(isset($_POST['request']) && $_POST['request'] == 'addproduct')
{
   
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $size = $_POST['size'];
    $voltage = $_POST['voltage'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $serial = $_POST['serial'];
    if(addProduct($description,$brand,$serial,$size,$voltage,$quantity,$price)==true)
    {
        header('location:../dashboard.php?page='._crypt('addproduct').'&notice=product_saved');
    }
}
else if(isset($_POST['request']) && $_POST['request'] == 'updateproduct')
{
   
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $size = $_POST['size'];
    $voltage = $_POST['voltage'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $id = _crypt($_POST['id'],'d');
    
      $serial = $_POST['serial'];
    if(updateProduct($description,$brand,$serial,$size,$voltage,$quantity,$price,$id)==true)
    {
        $page = _crypt('listproduct');
        
        header('location:../dashboard.php?page='.$page.'&notice=product_updated');
    }
}
else if(isset($_POST['request']) && $_POST['request'] == 'deleteproduct')
{
   
    $id = _crypt($_POST['id'],'d');
    
      $page = _crypt('listproduct');
    if(deleteProduct($id)==true)
    {
        header('location:../dashboard.php?page='.$page.'&notice=product_deleted');
    } 
    else
    {
         header('location:../dashboard.php?page='.$page.'&notice=product_deleted_failed');
    }
}
else if(isset($_POST['request']) && $_POST['request'] == 'addsupplier')
{
    $name = $_POST['name'];
    $address = $_POST['address'];
    $brand = $_POST['brand'];
    
    if(addSupplier($name,$address,$brand)==true)
    {
       header('location:../dashboard.php?page='._crypt('addsupplier').'&notice=supplier_added');  
    }
    
}

else if(isset($_POST['request']) && $_POST['request'] == 'updatesupplier')
{
   
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $address = $_POST['address'];
    $id = _crypt($_POST['id'],'d');
    if(updateSupplier($name,$address,$brand,$id)==true)
    {
        header('location:../dashboard.php?page='._crypt('listsupplier').'&notice=supplier_updated');
    }
}
else if(isset($_POST['request']) && $_POST['request'] == 'neworder')
{
   $orderno = $_POST['order_no'];
    $supplier = $_POST['supplier'];
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $size = $_POST['size'];
    $voltage = $_POST['voltage'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    if(newOrder($orderno,$supplier,$description,$brand,$size,$voltage,$quantity)==true)
    {
        header('location:../dashboard.php?page='._crypt('listorder').'&notice=order_submitted');
    }
}
else if(isset($_POST['request']) && $_POST['request'] == 'updateprofile')
{
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
 if(updateprofile($username, $password, $fname, $mname, $lname, $email, $mobile)==true)
 {
     $_SESSIOn['username'] = $username;
       header('location:../dashboard.php?notice=profile_updated');
     
 }
}
else if(isset($_POST['request']) && $_POST['request'] == 'addprofile')
{
       $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
 if(addprofile($username, $password, $fname, $mname, $lname, $email, $mobile)==true)
 {
     
       header('location:../dashboard.php?page='._crypt('listprofile').'&notice=profile_updated');
     
 }
}
else if(isset($_POST['request']) && $_POST['request'] == 'additem')
{
    $qty = $_POST['qty'];
    $serial = $_POST['serial'];
    $code = $_POST['code'];
    additem($code,$serial,$qty);
}
else if(isset($_POST['request']) && $_POST['request'] == 'getitem')
{
    $transactioncode = $_POST['code'];
        listItem($transactioncode);
}
else if(isset($_POST['request']) && $_POST['request'] == 'purchase')
{
    
    $cfname = $_POST['fname'];
    $cmobile = $_POST['mobile'];
    $transact_code = $_POST['transact_code'];   
  
   if(purchaseItems($cfname,$cmobile,$transact_code))
   {
          session_start();
   $_SESSION['tcode'] = round(microtime(true));
          header('location:../dashboard.php?page='._crypt('listpurchases').'&notice=purchase_complete');
   } else 
   {
         header('location:../dashboard.php?page=pos&notice=purchase_failed');
   }
}
else if(isset($_POST['request']) && $_POST['request'] == 'delitem')
{
    $id= $_POST['id'];
    $qty = $_POST['quantity'];
    $pid = $_POST['pid'];
    delitem($id,$qty,$pid);
}
else if(isset($_POST['request']) && $_POST['request'] == 'stockCondition')
{
    
    stocksCondition();
}
else if(isset($_POST['request']) && $_POST['request'] == 'notif')
{
    
    getNotification();
}
else if(isset($_POST['request']) && $_POST['request'] == 'delnotif')
{
    $id = $_POST['id'];
    delNotification($id);
}
else if(isset($_POST['request']) && $_POST['request'] == 'countnotif')
{
 
    countnotif();
}
?>
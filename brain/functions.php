<?php

include('config.php');


function login($username,$password)
{
    $stmt = $GLOBALS['con']->prepare("SELECT username,password FROM users_ WHERE username = ? AND password = ? LIMIT 1") OR die ($GLOBALS['con']->error);
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $count = $stmt->get_result()->num_rows;
    if($count == 1)
    {
        return true;
    } else 
    {
          return false;
    }
}

function addProduct($description,$brand,$serial,$size,$voltage,$quantity,$price)
{
    $stmt = $GLOBALS['con']->prepare("INSERT INTO product(description,brand,serial,size,voltage,quantity,price) VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssid",$description,$brand,$serial,$size,$voltage,$quantity,$price);
     if($stmt->execute())
     {
         return true;
     } else {
          return false;
     }
}

function updateProduct($description,$brand,$serial,$size,$voltage,$quantity,$price,$id)
{
    $stmt = $GLOBALS['con']->prepare("UPDATE product SET description = ?, brand = ?, serial=?, size = ?, voltage = ?, quantity = ?, price = ? WHERE id =? ");
    $stmt->bind_param("sssssidi",$description,$brand,$serial,$size,$voltage,$quantity,$price,$id);
     if($stmt->execute())
     {
         return true;
     } else {
          return false;
     }
}

function productList()
{
       $stmt = $GLOBALS['con']->prepare("SELECT * FROM product");
        $stmt->execute();
        $result = $stmt->get_result();
      $data = "";
        while($r=$result->fetch_assoc())
        {
            $data .= '
                    <tr>
                        <td>'.$r['description'].'</td>
                        <td>'.$r['brand'].'</td>
                         <td>'.$r['serial'].'</td>
                        <td>'.$r['size'].'</td>
                        <td>'.$r['voltage'].'</td>
                        <td>'.$r['quantity'].'</td>
                        <td>'.$r['price'].'</td>
                        <td><a href="?page=editproduct&id='.$r['id'].'">EDIT </a></td>
                    </tr>
            ';  
        }
    echo $data;
}

function addSupplier($name,$address,$brand)
{
    $stmt = $GLOBALS['con']->prepare("INSERT INTO supplier(name,address,brand) VALUES(?,?,?)");
    $stmt->bind_param("sss",$name,$address,$brand);
     if($stmt->execute())
     {
         return true;
     } else {
          return false;
     }
}

function supplierList()
{
        $stmt = $GLOBALS['con']->prepare("SELECT * FROM supplier");
        $stmt->execute();
        $result = $stmt->get_result();
      $data = "";
        while($r=$result->fetch_assoc())
        {
            $data .= '
                    <tr>
                        <td>'.$r['name'].'</td>
                        <td>'.$r['address'].'</td>
                        <td>'.$r['brand'].'</td>
                        <td><a href="?page=editsupplier&id='.$r['id'].'">EDIT </a></td>
                    </tr>
            ';  
        }
    echo $data;
}

function updateSupplier($name,$address,$brand,$id)
{
      $stmt = $GLOBALS['con']->prepare("UPDATE supplier SET name = ?, address = ?, brand = ? WHERE id = ?");
    $stmt->bind_param("sssi",$name,$address,$brand,$id);
     if($stmt->execute())
     {
         return true;
     } else {
          return false;
     }
}

function supplierOption()
{
            $stmt = $GLOBALS['con']->prepare("SELECT * FROM supplier");
        $stmt->execute();
        $result = $stmt->get_result();
      $data = "";
        while($r=$result->fetch_assoc())
        {
            $data .= '
                    <option value="'.$r['name'].'">'.$r['name'].'</option>
            ';  
        }
    echo $data;
}
function newOrder($orderno,$supplier,$description,$brand,$size,$voltage,$quantity)
{
      $stmt = $GLOBALS['con']->prepare("INSERT INTO orders(order_number, supplier, description, brand, size, voltage, quantity) VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssi",$orderno,$supplier,$description,$brand,$size,$voltage,$quantity);
     if($stmt->execute())
     {
         return true;
     } else {
          return false;
     }
}

function orderList()
{
        $stmt = $GLOBALS['con']->prepare("SELECT * FROM orders");
        $stmt->execute();
        $result = $stmt->get_result();
      $data = "";
        while($r=$result->fetch_assoc())
        {
            $data .= '
                    <tr>
                     <td>'.$r['order_number'].'</td>
                      <td>'.$r['supplier'].'</td>
                        <td>'.$r['description'].'</td>
                        <td>'.$r['brand'].'</td>
                        <td><a href="?page=editorder&id='.$r['id'].'">VIEW </a></td>
                    </tr>
            ';  
        }
    echo $data;
}


function countProducts()
{
    $stmt = $GLOBALS['con']->prepare("SELECT * FROM product");
        $stmt->execute();
    $count = $stmt->get_result()->num_rows;
    echo $count;
}

function countUsers() 
{
    $stmt = $GLOBALS['con']->prepare("SELECT * FROM users_");
        $stmt->execute();
    $count = $stmt->get_result()->num_rows;
    echo $count;
}

function updateprofile($username, $password, $fname, $mname, $lname, $email, $mobile)
{
    $stmt = $GLOBALS['con']->prepare("UPDATE users SET username = ?, password= ?, firstname = ?, middlename = ?, lastname = ?, email = ?, mobile = ?") OR die($GLOBALS['con']->error);
    $stmt->bind_param("sssssss",$username, $password, $fname, $mname, $lname, $email, $mobile);
        if($stmt->execute())
        {
            return true;
        } else {
            return false;
        }
}
function addprofile($username, $password, $fname, $mname, $lname, $email, $mobile)
{
        $stmt = $GLOBALS['con']->prepare("INSERT INTO users(username,password,firstname,middlename,lastname,email,mobile) VALUES(?,?,?,?,?,?,?)") OR die($GLOBALS['con']->error);
    $stmt->bind_param("sssssss",$username, $password, $fname, $mname, $lname, $email, $mobile);
        if($stmt->execute())
        {
            return true;
        } else {
            return false;
        }
}

function userList()
{
      $stmt = $GLOBALS['con']->prepare("SELECT * FROM users");
        $data= "";
                $stmt->execute();
          $result = $stmt->get_result();
         while($pf = $result->fetch_assoc())
         {
             $data .= '
                <tr>
                    <td>'.$pf['username'].'</td>
                      <td>'.$pf['firstname'].'</td>
                        <td>'.$pf['middlename'].'</td>
                          <td>'.$pf['lastname'].'</td>
                            <td>'.$pf['email'].'</td>
                              <td>'.$pf['mobile'].'</td>
                              
                </tr>
             ';
         }
    echo $data;
}

function additem($code,$serial,$qty)
{
    $stmt = $GLOBALS['con']->prepare("SELECT * FROM product WHERE serial = ?");
    $stmt->bind_param("s",$serial);
    $stmt->execute();
    $result = $stmt->get_result();
    $pr = $result->fetch_assoc();
    
    if($pr != null)
    {
        $cart =  $GLOBALS['con']->prepare("INSERT INTO carttemp(transact_no,description,serial,quantity,price,total) VALUES(?,?,?,?,?,?)");
        $desc = $pr['description'];
        $price = $pr['price'];
        $total = $qty * $price;
        $cart->bind_param("sssidd",$code,$desc,$serial,$qty,$price,$total);
        if($cart->execute())
        {
            return true;
        } else {
            return false;
        }
    }
}

function listItem($transactioncode)
{
      $stmt = $GLOBALS['con']->prepare("SELECT * FROM carttemp WHERE transact_no = ?");
    $stmt->bind_param("s",$transactioncode);
        $data= "";
                $stmt->execute();
          $result = $stmt->get_result();
    $total = 0;
    $grandtotal =0;
         while($pf = $result->fetch_assoc())
         {
             $id = $pf['id'];
             $grandtotal += $pf['total'];
             $data .= '
                <tr>
                    <td><button class="btn btn-danger btn-sm" onclick="delCart('.$id.')">x</button>
                        <td>'.$pf['description'].'</td>
                          <td>'.$pf['serial'].'</td>
                            <td>'.$pf['quantity'].'</td>
                              <td>'.$pf['price'].'</td>
                              <td>'.$pf['total'].'</td>
                              </tr>
             ';
         }
    $data .= '
        <tr>
        <td colspan="5"> <h4>Amount due:</h4></td>
        <td><h4>'.$grandtotal .'</h4></td>
        </tr>
    ';
    echo $data;
}

function purchaseItems($cfname,$cmobile,$transact_code)
{
       $stmt = $GLOBALS['con']->prepare("SELECT * FROM carttemp WHERE transact_no = ?") OR die( $GLOBALS['con']->error);
    $stmt->bind_param("s",$transact_code);
        $data= "";
    $stmt->execute();
    $result = $stmt->get_result();
    $total = 0;
    $grandtotal =0;
    $data_order = array();
    $valid =false;
        while($pf = $result->fetch_assoc())
         {
            $valid=true;
              $data_order [] = $pf;
             $grandtotal += $pf['total'];
           
        }
        $json = json_encode($data_order);

    if($valid == true)
    {
        $st = $GLOBALS['con']->prepare("INSERT INTO purchases(transact_no, c_fullname,c_mobile,order_data,total ) VALUES(?,?,?,?,?)")OR die( $GLOBALS['con']->error);
        $st->bind_param("ssssd",$transact_code,$cfname,$cmobile,$json,$grandtotal)OR die( $st->error);
        if($st->execute())
        {
            $message = "Hello " .$cfname." Your purchase is complete. with transaction code: " .$transact_code;

           sms($message,$cmobile,"109631");
            return true;
   
        } else 
        {
        
            return false;
        }
    } else {

        return false;
    }
    
}
  function purchaseList() 
  {
            $stmt = $GLOBALS['con']->prepare("SELECT * FROM purchases") OR die( $GLOBALS['con']->error);
            $stmt->execute();
          $result = $stmt->get_result();
      $data = "";
      $order="";
        while($r=$result->fetch_assoc())
        {
            $od = json_decode($r['order_data']);
            foreach($od as $o)
            {
                $order .= '
                    '.$o->description.'(serial:'.$o->serial.') x '.$o->quantity.'<br>
                ';
            }
            $data .= '
                    <tr>
                     <td>'.$r['transact_no'].'</td>
                      <td>'.$r['c_fullname'].'</td>
                        <td>'.$r['c_mobile'].'</td>
                        <td>'.$order.'</td>
                    <td>'.$r['total'].'</td>
                                            <td>'.$r['timestamp'].'</td>
                    </tr>
            ';  
            $order ="";
        }
    echo $data;
  }
function delitem($id)
{
        $stmt = $GLOBALS['con']->prepare("DELETE FROM carttemp WHERE id =?") OR die( $GLOBALS['con']->error);
    $stmt->bind_param("i",$id);
            $stmt->execute();
}

 function sms($msg,$number,$deviceid)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
          CURLOPT_SSL_VERIFYPEER=>false,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "[{\"phone_number\": \"$number\", \"message\": \"$msg\", \"device_id\": $deviceid}]",
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Postman-Token: 0dfb5acc-f0ae-415b-a5d3-ca12a2dfdfd3",
            "authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU1MDkzNzg4NCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY4NDA1LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.vE6Fe6eCNl5haiISuIB6XiAZ-LwXGQ3M0W2TZ8gYJRU"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
?>
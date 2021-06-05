<?php

include('config.php');
include('security.php');
$deviceid = "109805";

function login($username,$password)
{
   
    $stmt = $GLOBALS['con']->prepare("SELECT username,password,role FROM users WHERE username = ? AND password = ? LIMIT 1") OR die ($GLOBALS['con']->connect_error);
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $count = $res->num_rows;

    if($count == 1)
    {
        
        if($r['role'] == "1")
        {
            $_SESSION['role'] = "admin"; 
        } else {
            $_SESSION['role'] = "staff";
        }
        return true;
    } 
    else 
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


function deleteProduct($id)
{
     $stmt = $GLOBALS['con']->prepare("DELETE FROM product WHERE id =?") OR die( $GLOBALS['con']->error);
        $stmt->bind_param("i",$id);
           if( $stmt->execute())
           {
               return true;
           } else {
               return false;
           }
}


function productList($api = false)
{
       $stmt = $GLOBALS['con']->prepare("SELECT * FROM product");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = "";
        if($api == false) {
            while($r=$result->fetch_assoc())
            {
                $data .= '
                        <tr>
                            <td>'.xssafe($r['description']).'</td>
                            <td>'.xssafe($r['brand']).'</td>
                            <td>'.xssafe($r['serial']).'</td>
                            <td>'.xssafe($r['size']).'</td>
                            <td>'.xssafe($r['voltage']).'</td>
                            <td>'.xssafe($r['quantity']).'</td>
                            <td>'.xssafe($r['price']).'</td>
                            <td><a href="?page='._crypt("editproduct").'&id='.xssafe(_crypt($r['id'])).'">EDIT </a></td>
                        </tr>
                ';  
            }
            echo $data;
        } else {
            $data =[];
            while($r = $result->fetch_assoc()){
                $data[] = $r;
            }
            
            return $data;
        }
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
                        <td>'.xssafe($r['name']).'</td>
                        <td>'.xssafe($r['address']).'</td>
                        <td>'.xssafe($r['brand']).'</td>
                        <td><a href="?page='._crypt('editsupplier').'&id='.xssafe(_crypt($r['id'])).'">EDIT </a></td>
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
                    <option value="'.xssafe($r['name']).'">'.xssafe($r['name']).'</option>
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
                     <td>'.xssafe($r['order_number']).'</td>
                      <td>'.xssafe($r['supplier']).'</td>
                        <td>'.xssafe($r['description']).'</td>
                        <td>'.xssafe($r['brand']).'</td>
                        <td><a href="?page='._crypt('editorder').'&id='.xssafe($r['id']).'">VIEW </a></td>
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
    $stmt = $GLOBALS['con']->prepare("SELECT * FROM users");
        $stmt->execute();
    $count = $stmt->get_result()->num_rows;
    echo $count;
}

function countSupplier() 
{
    $stmt = $GLOBALS['con']->prepare("SELECT * FROM supplier");
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
                    <td>'.xssafe($pf['username']).'</td>
                      <td>'.xssafe($pf['firstname']).'</td>
                        <td>'.xssafe($pf['middlename']).'</td>
                          <td>'.xssafe($pf['lastname']).'</td>
                            <td>'.xssafe($pf['email']).'</td>
                              <td>'.xssafe($pf['mobile']).'</td>
                              
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
        if(checkCode($code,$serial)==false)
        {
            $cart =  $GLOBALS['con']->prepare("INSERT INTO carttemp(transact_no,description,serial,quantity,price,total) VALUES(?,?,?,?,?,?)");
            $desc = $pr['description'];
            $price = $pr['price'];
            $total = $qty * $price;
            $cart->bind_param("sssidd",$code,$desc,$serial,$qty,$price,$total);
            if($cart->execute())
            {
                updateStock($pr['id'],$qty,'deduct');
                return true;
            } else {
                return false;
            }
        } else {
             $price = $pr['price'];
            $total = $qty * $price;
            updateItem($qty,$code,$serial,$total);
            updateStock($pr['id'],$qty,'deduct');
        }
    }
}

function updateStock($id,$qty,$method)
{
     if($method=="deduct")
     {
        $stmt = $GLOBALS['con']->prepare("UPDATE product set quantity = quantity - ? WHERE id = ?");
        $stmt->bind_param("ii",$qty,$id);
        $stmt->execute();
     } else if($method=="restock"){
         $stmt = $GLOBALS['con']->prepare("UPDATE product set quantity = quantity + ? WHERE id = ?");
        $stmt->bind_param("ii",$qty,$id);
        $stmt->execute();
     }
}

function checkCode($code,$serial)
{
    $c = $GLOBALS['con']->prepare("SELECT serial FROM carttemp WHERE transact_no = ? AND serial = ?") OR die($GLOBALS['con']->error);
    $c->bind_param("ss",$code,$serial); 
    $c->execute();
    $res = $c->get_result();
    $num = $res->num_rows;
    if($num==1)
    {
        return true;
    }
    else 
    {
        return false;
    }
}

function updateItem($quantity,$code,$serial,$total)
{
    $u = $GLOBALS['con']->prepare("UPDATE carttemp SET quantity = quantity + ?, total = total + ? WHERE transact_no = ? AND serial = ?");
    $u->bind_param("idss",$quantity,$total,$code,$serial);
    $u->execute();
}


function listItem($transactioncode)
{
      $stmt = $GLOBALS['con']->prepare("SELECT * FROM carttemp WHERE transact_no = ? ORDER BY id DESC");
    $stmt->bind_param("s",$transactioncode);
        $data= "";
                $stmt->execute();
          $result = $stmt->get_result();
    $total = 0;
    $grandtotal =0;
         while($pf = $result->fetch_assoc())
         {
    $stmt = $GLOBALS['con']->prepare("SELECT * FROM product WHERE serial = ?");
    $stmt->bind_param("s",$pf['serial']);
    $stmt->execute();
    $result = $stmt->get_result();
    $pr = $result->fetch_assoc();
             
             $id = $pf['id'];
             $grandtotal += $pf['total'];
             $data .= '
                <tr>
                    <td><button class="btn btn-danger btn-sm" onclick="delCart('.$id.','.$pf['quantity'].','.$pr['id'].')">x</button>
                        <td>'.xssafe($pf['description']).'</td>
                          <td>'.xssafe($pf['serial']).'</td>
                            <td>'.xssafe($pf['quantity']).'</td>
                              <td>'.xssafe($pf['price']).'</td>
                              <td>'.xssafe($pf['total']).'</td>
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
            global $deviceid;
           sms($message,$cmobile,$deviceid);
           
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
            $stmt = $GLOBALS['con']->prepare("SELECT * FROM purchases ORDER BY id DESC") OR die( $GLOBALS['con']->error);
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
                     <td>'.xssafe($r['transact_no']).'</td>
                      <td>'.xssafe($r['c_fullname']).'</td>
                        <td>'.xssafe($r['c_mobile']).'</td>
                        <td>'.$order.'</td>
                         <td>'.xssafe($r['total']).'</td>
                         <td>'.xssafe($r['timestamp']).'</td>
                    </tr>
            ';  
            $order ="";
        }
    echo $data;
  }
function delitem($id,$qty,$pid)
{
        $stmt = $GLOBALS['con']->prepare("DELETE FROM carttemp WHERE id =?") OR die( $GLOBALS['con']->error);
        $stmt->bind_param("i",$id);
            if($stmt->execute())
            {
                updateStock($pid,$qty,'restock');
            }
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
        $title="Purchase Complete";
           $body='
            Purchase item(s) completed. Confirmation message is sent to the customer.
           ';
           $type="purchase_complete";
           addNotif($title, $body, $type);
    }
function stocksCondition()
{
    $s = $GLOBALS['con']->prepare("SELECT description, quantity FROM product ORDER BY quantity ASC LIMIT 0,5");
    $s->execute();
    $result = $s->get_result();
   $data = array();
    foreach ($result as $row) {
        $data[] = $row;
        }
   print json_encode($data);
  
}

function getNotification()
{
    
    $s = $GLOBALS['con']->prepare("SELECT * FROM notifications WHERE is_read = false ORDER BY id DESC LIMIT 0,10");
    $s->execute();
    $result = $s->get_result();
    $data = '';
    while ($r = $result->fetch_assoc())
    {
        $id = "'" . $r['id'] ."'";
        $data .='
        <div class="media">
        <img class="mr-3" src="assets/images/'.xssafe($r['type']).'.png" style="width:50px;height:50px;" alt="X">
        <a onclick="delNotif('.$id.')" href="#" style="text-decoration:none;color:black;">
        <div class="media-body">
            <h6 class="mt-0">'.xssafe($r['title']).'</h6>
            '.xssafe($r['body']).'<br>
            <small> '.xssafe($r['date']).'</small>
        </div>
        </a>
        </div>
        <br>
        ';
    }
    if($result->num_rows == 0)
    {
        echo '<div class="alert alert-warning" role="alert">
        Hey! You\'re all set. Come back later.
      </div>';
      exit();
    }
    echo $data;
}

function delNotification($id)
{
    $s = $GLOBALS['con']->prepare("UPDATE notifications SET is_read = true WHERE id = ?");
    $s->bind_param("i",$id);
    $s->execute();
}

function countnotif()
{
    $s = $GLOBALS['con']->prepare("SELECT is_read FROM notifications WHERE is_read = false");
    $s->execute();
    $r = $s->get_result();
    $count = $r->num_rows;
   if($count == 0)
   {
       $count ='';
   } 
    echo $count;
   
}

function checkStock()
{
    $s = $GLOBALS['con']->prepare("SELECT description, quantity, serial FROM product WHERE quantity <= 10");
    $s->execute();
    $result = $s->get_result(); 
    while ($r = $result->fetch_assoc())
    {
        $body = "the item: ".$r['description']." is low in stocks. Current stocks: ".$r['quantity']." items left";
        $type = "critical";
        $itemid = $r['serial'];
        addNotif("CRITICAL STOCK DETECTED", $body, $type);
    }
}


function monthSales()
{
    $get = $GLOBALS['con']->prepare("select date_format(`batterydb`.`purchases`.`timestamp`,'%M %Y') AS `month`,sum(`batterydb`.`purchases`.`total`) AS `sales` from `batterydb`.`purchases` WHERE month(timestamp) = month(CURRENT_DATE()) group by month(`batterydb`.`purchases`.`timestamp`)") or die($GLOBALS['con']->error);
    $get->execute();
    $res = $get->get_result();
    $r = $res->fetch_assoc();
    $sales =$r !== null ? $r['sales'] : 0.00;
    echo number_format($sales,2);
}
function addNotif($title, $body, $type)
{
 
    //if($itemid == ''){
    $s = $GLOBALS['con']->prepare("INSERT INTO notifications(title, body, type) 
                                    VALUES (?,?,?);
    ");
    $s->bind_param("sss",$title,$body,$type);
    $s->execute();
   /* } else {
        $not = $GLOBALS['con']->prepare("SELECT * FROM notifications WHERE itemid = ?");
        $not>bind_param("s",$itemid);
        $not->execute();
        $count = $not->get_result()->num_rows;
            if($count == 1)
            {
                $body = "the item: ".$r['description']." is low in stocks. Current stocks: ".$r['quantity']." items left";
                $up = $GLOBALS['con']->prepare("UPDATE notifications SET body = ? WHERE itemid = ?");
                $up->bind_param("ss",$body,$itemid);
            }
    }*/
}

function xssafe($data,$encoding='UTF-8')
{
   return htmlspecialchars($data,ENT_QUOTES | ENT_HTML401,$encoding);
}
function xecho($data)
{
   echo xssafe($data);
}

?>


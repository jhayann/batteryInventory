 <div class="container col col-md-6" id="form_order" style="margin:auto">
 <?php
 
         $stmt = $con->prepare("SELECT * FROM orders WHERE id = ?");
     $stmt->bind_param("i",$_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();
      $data = "";
     $r=$result->fetch_assoc();
 
 ?>
<table class="table">
    <thead>
        <th colspan="4">ORDER FORM</th>
        <th>
        <!-- My Enhancement.. Print the order  -->
        <button class="btn btn-info float-right"  onclick="printContent('form_order');">PRINT</button>
        
        </th>
    </thead>
    <tr>
        <td colspan="4">Supplier: <?= $r['supplier'] ?></td>
        
        <td>Date: <?= $r['datetime'] ?></td>
    </tr>
    <tr>
        <td colspan="5">Order #: <?= $r['order_number'] ?></td>
    </tr>
    <tr>
        <td colspan="5">Order summary:</td>
    </tr>
    <thead class="thead-dark">
        <th>Item</th>
        <th>brand</th>
        <th>Size</th>
        <th>voltage</th>
        <th>quantity</th>
    </thead>
    <tbody>
    <?php
    $stmt = $con->prepare("SELECT * FROM orders WHERE id = ?");
     $stmt->bind_param("i",$_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();
      $data = "";
    while($rw=$result->fetch_assoc())
        {
            $data .= '
                    <tr>
                        <td>'.$rw['description'].'</td>
                        <td>'.$rw['brand'].'</td>
                        <td>'.$rw['size'].'</td>
                        <td>'.$rw['voltage'].'</td>
                        <td>'.$rw['quantity'].'</td>
                      
                    </tr>
            ';  
        }
    echo $data;
    ?>
    </tbody>
</table>
</div>
<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>
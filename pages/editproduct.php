<?php
$id = $_GET['id'];
  $ulam = $con->prepare("SELECT * FROM product where id = ?");
$id = _crypt($id,'d');
  $ulam->bind_param("i",$id);
        $ulam->execute();
        $result = $ulam->get_result();
        $count = $result->num_rows;
      $data = "";
        $r=$result->fetch_assoc();

?>
    <style>

.nav-container {
  position:relative;
}
.button-del {
  position:absolute;
  right:1rem;
  top:50%;
  transform:translateY(-50%);
}
</style>
<?php
    if($count ==0)
    {
        echo '
        <div class="conatiner">
        <div class="alert alert-danger" style="margin:auto;max-width:50%;padding-top:100px;color:#03684d">
            <h1 style="text-align:center">INVALID ID</h1>
            <p  style="text-align:center">Sorry, an error has occured, Requested product not found!</p>
        </div>  
    </div>
        ';
        exit;
    }
?>
    <div class="container" style="margin:auto;width:60%">
    <div class="nav-container">
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
        UPDATE PRODUCT
      </li>
     
  </ol>
         <form method="POST" id="registerform" action="brain/controller.php">
             <input type="hidden" value="deleteproduct" name="request">
             <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
            <button class="btn btn-sm btn-danger button-del">REMOVE</button>
        </form>
</div>
    <form method="POST" id="registerform" action="brain/controller.php">
      <input type="hidden" name="id" value="<?= $_GET['id']?>">
       <input type="hidden" value="updateproduct" name="request">
         <div id="response"></div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description:</label>
            <input type="text" class="form-control" name="description" placeholder="Enter Description" autocomplete="off" value="<?= $r['description']?>" required>
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Brand:</label>
            <input type="text" class="form-control" name="brand"  placeholder="Enter Brand name" value="<?= $r['brand']?>" required>
        </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Product number:</label>
            <input type="text" class="form-control" name="serial"  value="<?= $r['serial']?>" placeholder="Enter serial number" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Select size: </label>
               <select class="form-control" name="size" required>
                       <option >Select size</option>
                       <option value="MCB" <?= $s = $r['size']=='MCB'?'selected':''?>>MCB</option>
                       <option value="1SN"  <?= $s = $r['size']=='1SN'?'selected':''?>>1SN</option>
                       <option value="1SM"  <?= $s = $r['size']=='1SM'?'selected':''?>>1SM</option>
                       <option value="2SM"  <?= $s = $r['size']=='2SM'?'selected':''?>>2SM</option>
                       <option value="3SM"  <?= $s = $r['size']=='3SM'?'selected':''?>>3SM</option>
                       <option value="6SM"  <?= $s = $r['size']=='6SM'?'selected':''?>>6SM</option>
                       <option value="2D"  <?= $s = $r['size']=='2D'?'selected':''?>>2D</option>
                       <option value="4D"  <?= $s = $r['size']=='4D'?'selected':''?>>4D</option>
                       <option value="8D"  <?= $s = $r['size']=='8D'?'selected':''?>>8D</option>
               </select>
        </div>
        <div class="form-group">
            <label for="voltage">Voltage:</label>
                <select class="form-control" name="voltage" required>
                       <option>Select voltage</option>
                       <option value="12V"  <?= $s = $r['voltage']=='12V'?'selected':''?>>12 volts</option>
                       <option value="24V"  <?= $s = $r['voltage']=='24V'?'selected':''?>>24 volts</option>
                       <option value="48V"  <?= $s = $r['voltage']=='48V'?'selected':''?>>48 volts</option>
               </select>
        </div>
           <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" name="quantity" value="<?= $r['quantity']?>" placeholder="Enter quantity">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" value="<?= $r['price']?>" placeholder="Enter Price">
        </div>
        <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
    </form>
     
    </div>
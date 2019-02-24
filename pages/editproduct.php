<?php
$id = $_GET['id'];
  $ulam = $con->prepare("SELECT * FROM product where id = ?");
  $ulam->bind_param("i",$id);
        $ulam->execute();
        $result = $ulam->get_result();
      $data = "";
        $r=$result->fetch_assoc();

            


?>
    
    <div class="container" style="margin:auto;width:60%">
    <div class="breadcrumb">UPDATE PRODUCT</div>
    <form method="POST" id="registerform" action="brain/controller.php">
      <input type="hidden" name="id" value="<?= $_GET['id']?>">
       <input type="hidden" value="updateproduct" name="request">
         <div id="response"></div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Enter Description" autocomplete="off" value="<?= $r['description']?>" require>
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Brand:</label>
            <input type="text" class="form-control" name="brand"  placeholder="Enter Brand name" value="<?= $r['brand']?>" required>
        </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Serial number:</label>
            <input type="text" class="form-control" name="serial"  value="<?= $r['serial']?>" placeholder="Enter serial number" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Select size: </label>
               <select class="form-control" name="size">
                       <option >Select size</option>
                       <option value="medium" <?= $s = $r['size']=='medium'?'selected':''?>>Medium</option>
                       <option value="small"  <?= $s = $r['size']=='small'?'selected':''?>>Small</option>
                       <option value="large"  <?= $s = $r['size']=='large'?'selected':''?>>Large</option>
               </select>
        </div>
        <div class="form-group">
            <label for="voltage">Voltage:</label>
                <select class="form-control" name="voltage">
                       <option>Select voltage</option>
                       <option value="12V"  <?= $s = $r['voltage']=='12V'?'selected':''?>>12 volts</option>
                       <option value="24V"  <?= $s = $r['voltage']=='24V'?'selected':''?>>24 volts</option>
                       <option value="48V"  <?= $s = $r['voltage']=='48V'?'selected':''?>>48 volts</option>
               </select>
        </div>
           <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" value="<?= $r['quantity']?>" placeholder="Enter quantity">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" value="<?= $r['price']?>" placeholder="Enter Price">
        </div>
        <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
    </form>
     
    </div>
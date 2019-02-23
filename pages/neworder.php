    <div class="container" style="margin:auto;width:60%">
    <div class="breadcrumb">NEW ORDER</div>
    <form method="POST" id="registerform" action="brain/controller.php">
       <input type="hidden" value="neworder" name="request">
        <input type="hidden" name="order_no" value="<?= round(microtime(true)) ?>">
         <div id="response"></div>
          <div class="form-group">
            <label for="voltage">SUPPLIER:</label>
                <select class="form-control" name="supplier">
                       <option>Select supplier</option>
                         <?php
                   
                        supplierOption();
                    
                         ?>
               </select>
               
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Enter Description" autocomplete="off" require>
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Brand:</label>
            <input type="text" class="form-control" name="brand"  placeholder="Enter Brand name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Select size: </label>
               <select class="form-control" name="size">
                       <option >Select size</option>
                       <option value="medium">Medium</option>
                       <option value="small">Small</option>
                       <option value="large">Large</option>
               </select>
        </div>
        <div class="form-group">
            <label for="voltage">Voltage:</label>
                <select class="form-control" name="voltage">
                       <option>Select voltage</option>
                       <option value="12V">12 volts</option>
                       <option value="24V">24 volts</option>
                       <option value="48V">48 volts</option>
               </select>
        </div>
           <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="Enter quantity">
        </div>
        
        
        <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
     
    </form>
     
    </div>
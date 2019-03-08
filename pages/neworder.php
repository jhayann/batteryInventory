    <div class="container" style="margin:auto;width:60%">
    <div class="breadcrumb">PRODUCT ORDER</div>
    <form method="POST" id="registerform" action="brain/controller.php">
       <input type="hidden" value="neworder" name="request" required>
        <input type="hidden" name="order_no" value="<?= round(microtime(true)) ?>">
         <div id="response"></div>
          <div class="form-group">
            <label for="voltage">Supplier:</label>
                <select class="form-control" name="supplier" required>
                       <option>Select supplier</option>
                         <?php
                   
                        supplierOption();
                    
                         ?>
               </select>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description:</label>
            <input type="text" class="form-control" name="description" placeholder="Enter Description" autocomplete="off" required>
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Brand:</label>
            <input type="text" class="form-control" name="brand"  placeholder="Enter Brand name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Select size: </label>
               <select class="form-control" name="size" required>
                       <option >Select size</option>
                       <option value="mcb">MCB</option>
                       <option value="1sn">1SN</option>
                       <option value="1sm">1SM</option>
                       <option value="2sm">2SM</option>
                       <option value="3sm">3SM</option>
                       <option value="6sm">6SM</option>
                       <option value="2d">2D</option>
                       <option value="4d">4D</option>
                       <option value="8d">8D</option>
               </select>
        </div>
        <div class="form-group">
            <label for="voltage">Voltage:</label>
                <select class="form-control" name="voltage" required>
                       <option>Select voltage</option>
                       <option value="12V">12 volts</option>
                       <option value="24V">24 volts</option>
                       <option value="48V">48 volts</option>
               </select>
        </div>
           <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" required>
        </div>
        
        
        <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
     
    </form>
     
    </div>
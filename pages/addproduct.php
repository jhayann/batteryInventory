    <div class="container col col-md-6" style="margin:auto">
    <div class="breadcrumb">ADD PRODUCT</div>
    <form method="POST" id="registerform" action="brain/controller.php">
       <input type="hidden" value="addproduct" name="request">
         <div id="response"></div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description:</label>
            <input type="text" class="form-control" name="description" placeholder="Enter Description" autocomplete="off"  pattern="[A-Za-z\s0-9]{6,50}$" title="Input only letters and number." required>
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Brand:</label>
            <input type="text" class="form-control" name="brand"   pattern="[A-Za-z\s0-9]{6,30}$" title="Input only letters and number." placeholder="Enter Brand name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Product number:</label>
            <input type="text"  pattern="[0-9]{10,10}$" title="Input ten digit number only." class="form-control" name="serial"  placeholder="Enter product number" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Select size: </label>
               <select class="form-control" name="size">
                       <option >Select size</option>
                       <option value="medium">MCB</option>
                       <option value="small">1SN</option>
                       <option value="large">1SM</option>
                       <option value="large">2SM</option>
                       <option value="large">3SM</option>
                       <option value="large">6SM</option>
                       <option value="large">2D</option>
                       <option value="large">4D</option>
                       <option value="large">8D</option>
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
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control"  pattern="[0-9]{1,3}$" title="Input 1 -3 digit number only." name="quantity" placeholder="Enter quantity" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control"  pattern="[0-9]{3,5}$" title="Input 1 - 5 digit number only." name="price" placeholder="Enter Price" required>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block">SAVE</button>
     
    </form>
     
    </div>
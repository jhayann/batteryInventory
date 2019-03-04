    <div class="container" style="margin:auto;width:60%">
    <div class="breadcrumb">ADD SUPPLIER</div>
    <form method="POST" id="registerform" action="brain/controller.php">
       <input type="hidden" value="addsupplier" name="request">
         <div id="response"></div>
        <div class="form-group">
            <label for="exampleInputPassword1">COMPANY NAME:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter company name" autocomplete="off" required>
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">ADDRESS:</label>
            <input type="text" class="form-control" name="address"  placeholder="Enter address " required>
        </div>
           <div class="form-group">
            <label for="quantity">BRAND ADVERTISE:</label>
            <input type="text" class="form-control" name="brand" placeholder="Enter brand advertise" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">SAVE</button>
    </form>
     
    </div>
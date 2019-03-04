<?php
if(!isset($_SESSION['tcode'] ))
{
$_SESSION['tcode'] = round(microtime(true));
}
checkStock();
?>
<style>
table ,tr td{
    border:1px solid blue
}
tbody {
    display:block;
    height:250px;
    overflow:auto;
}
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;/* even columns width , fix width of table too*/
}
thead {
    width: calc( 100% - 1em )/* scrollbar is average 1em/16px width, remove it from thead width */
}
table {
    width:400px;
}
</style>
       <div class="container" style="width:80%;margin:auto;">
        <input type="hidden" id="tcode" name="transact_code" value="<?= $_SESSION['tcode']?>">
         <div class="form-group">
           
            <div class="row">
                <div class="col-sm-9">
                    <label for="exampleInputPassword1">Product number:</label>
                    <input type="text" class="form-control" maxlength="10" name="serial" id="serial" placeholder="Enter product number" autocomplete="off"  require>
                </div>
                <div class="col-sm-3">
                    <label for="exampleInputPassword1">Quantity:</label>
                    <input type="number" class="form-control" maxlength="2"oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "2" name="qty" value="1" id="qty" placeholder="Enter Serial number" autocomplete="off"  require>
                </div>
            </div>
            
        </div>
        <hr>
        <table class="table">
            <thead>
               <th>drop</th>
                <th>description</th>
                <th>serial no.</th>
                <th>quantity</th>
                <th>price</th>
                <th>Total</th>
            </thead>
           
                <tbody id="carttb">
                
            </tbody>
           
        </table>
        <hr>
        <button type="submit" data-toggle="modal" data-target="#addcredit" class="btn  btn-success">Finalize Purchases</button>
    </div>
    <div class="modal fade" id="addcredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Enter Customer Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="brain/controller.php">
           <input type="hidden" name="request" value="purchase">
            <input type="hidden" id="tcode" name="transact_code" value="<?= $_SESSION['tcode']?>">
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label">Customer Fullname:</label>
                <div class="col-sm-8">
                    <input type="text" maxlength="30" class="form-control" value="" name="fname"  required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label">Mobile number:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" maxlength="11" value="" name="mobile"  required>
                </div>
            </div>
            
         <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">SUBMIT</button>
      </div>
         </form>
      </div>
    </div>
  </div>
</div>
    <script>
$(document).ready(function(){
    getCart($('#tcode').val());
    $('#serial').bind("enterKey",function(e){
        var serial = $('#serial').val();
        var qty = $('#qty').val();
        var t_code = $('#tcode').val();
        $.ajax({
            url:"brain/controller.php",
            method:"POST",
            data:{request:"additem",serial:serial,qty:qty,code:t_code},
            success: function()
            {
                 $('#serial').focus();
            $('#serial').val('');
                getCart($('#tcode').val());
            }
        }); // eto po ung error
        
});
$('#serial').keyup(function(e){    if(e.keyCode == 13)
    {
        $(this).trigger("enterKey");
    }
});
});
        function getCart(e)
        {
            $.ajax({
            
            url:"brain/controller.php",
            method:"POST",
            data:{request:"getitem",code:e},
            success: function(data)
            {
            $('#carttb').html(data);
            }
     
            });
        }
        
        function delCart(e,q,pid)
        {
              $.ajax({
            
            url:"brain/controller.php",
            method:"POST",
            data:{request:"delitem",id:e,quantity:q,pid:pid},
            success: function(data)
            {
           getCart($('#tcode').val());
            }
     
            });
        }
        
</script>
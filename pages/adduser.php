    <div class="container" style="margin:auto;width:60%">
       <div class="breadcrumb">ADD STAFF</div>
        <form method="POST" action="brain/controller.php">
           <input type="hidden" name="request" value="addprofile">
            <div class="form-group row">
                <label for="user" class="col-sm-3 col-form-label">Username: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="users"  autocomplete="off" name="username" required>
                    <div class="list-group" id="userlist" >        
                    </div>
                </div>
            </div>
               <div class="form-group row">
                <label for="user" class="col-sm-3 col-form-label">Password: </label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="users" value="" autocomplete="off" name="password" required>
                    <div class="list-group" id="userlist" >        
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Firstname:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"  name="fname"  required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Middlename:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"  name="mname"  required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Lastname:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="lname"  required>
                </div>
            </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email"  required>
                </div>
            </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Mobile:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"  name="mobile"  required>
                </div>
            </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">ADD USER</button>
      </div>
         </form>
</div>
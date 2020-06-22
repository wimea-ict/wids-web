<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>" crossorigin="anonymous">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" crossorigin="anonymous">
</head>
<body>
      <h3 class="formhead">Enter database and System Details</h3>
  <div class="formdiv">
  <?php echo form_open('',array('class'=>'form','id'=>'db-form')); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">System Email:</label>
    <input type="text" name="system_email" class="form-control" placeholder="Account UserName" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">System user password</label>
    <input type="password" name="systempassword" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Database Name</label>
    <input type="text" name="database_name" class="form-control" placeholder="Database name" required><strong>Database shall be created</strong>
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Database username:</label>
    <input type="text" name="database_username" class="form-control"  placeholder="Database username" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Database Password:</label>
    <input type="password" name="database_password" class="form-control" id="exampleInputPassword1" placeholder="Database password">
    <input type='hidden' name="step" value="1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Select Country for which you are installing the system:</label><br>
    <select class="custom-select" id="country" name="country" required>
      <option value="Nigeria">Nigeria</option>
      <option value="Ghana">Ghana</option>
      <option value="South Sudan">South Sudan</option>
      <option value="Uganda">Uganda</option>
    </select>
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
</body>
</html>

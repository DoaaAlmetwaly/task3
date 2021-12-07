<?php


function Clean($input){
     return   strip_tags(trim($input));

}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name     = Clean($_POST['name']);
    $password = Clean($_POST['password']);
    $email    = Clean($_POST['email']);
    $address  = Clean($_POST['address']);
    $url      = Clean($_POST['url']);


$errors = [];

# Validate Name ... 
if(empty($name)){
    $errors['Name']  = "Field Required";
}

# Validate Email ..... 
if(empty($email)){
    $errors['Email'] = "Field Required";
}

#Validate Password
if(strlen($password) < 6){
   $errors['Password']  = "Password Length must be >= 6 char ";
}
if(empty($password)){
    $errors['password'] = "Field Required";
}
#Validate address
if(strlen($address) < 10){
    $errors['address']  = "address Length must be >= 10 char ";
 }
 if(empty($address)){
     $errors['address'] = "Field Required";
 }
#Validate url
if(empty($url)){
    $errors['url'] = "Field Required";
}

if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo("$url is a valid URL");
} else {
    echo("$url is not a valid URL");
}
# Check .... 
if(count($errors) > 0){
    foreach ($errors as $key => $value) {
        # code...
        echo '* '.$key.' : '.$value.'<br>';
    }
}else{

   echo 'Valid Data .... ';
}


}







?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
 
 
  <form  action="<?php echo $_SERVER['PHP_SELF'];?>"   method="post" >

  

  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="exampleInputName"  name="name" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="email"   class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">New Password</label>
    <input type="password"   class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">

    <div class="form-group">
    <label for="exampleInputName">Address</label>
    <input type="text" class="form-control" id="exampleInputName"  name="address" aria-describedby="" placeholder="Enter address">
  </div>
  </div>

  <div class="form-group">
    <label for="basic-url">linked in url </label>
    <input type="text"   class="form-control" id="basic-url" name="url" aria-describedby="" placeholder="Enter linked in url">
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
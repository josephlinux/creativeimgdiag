<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 14px;

}

.active {
  background-color: #4CAF50;
  color: wheat;
}

.home {
  background-color:#FF5733;
  color: wheat;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 14px;    
  border: none;
  outline: none;
  color: white;
  padding: 16px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: lightblue;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 14px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, :hover.dropdown .dropbtn {
  background-color: green;
  color: wheat;
}

.dropdown-content a:hover {
  background-color: #FF5733;
  color: white;
}

:hover.dropdown .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
</head>
<body>

<center><div class="topnav" id="myTopnav">
  <b>
  <a href="main.php" class="home">Home</a></b>
 
 
   
  <div class="dropdown">
    <button class="dropbtn">Adding Tasks
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addcenter.php">Add Center</a>
           <a href="sadminadduser.php">Add User</a>
      </div>
  </div> 
  
  
  
  <div class="dropdown">
    <button class="dropbtn">Update/Delete Tasks
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="editcenter.php">Update Center Name</a>
  	   <a href="editusername.php">Update username </a>
           <a href="sadmindeleteuser.php">Delete user</a>
      <a href="deletecenter.php">Delete center</a>
    </div>
  </div> 
  
     
  
  
  

  
    <div class="dropdown">
    <button class="dropbtn">Upload Tasks
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="sadminimportdoctor.php">Upload Doctors</a>
      <a href="sadminimporttests.php">Upload Tests</a>
      <a href="sadminimportreferal.php">Upload Referals</a>
      </div>
  </div> 
  
  
  
  <div class="dropdown">
    <button class="dropbtn">Lists Printouts
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="centersprint.php" target="_blank">Centers list</a>
      <a href="sadminusersprint.php" target="_blank">Users List</a>
      </div>
  </div> 

  <a href="changepasswordselect.php">Reset Password</a>
   <a href="logout.php" class="active">Logout</a>

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

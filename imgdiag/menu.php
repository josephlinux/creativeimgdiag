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
  padding: 12px 14px;
  text-decoration: none;
  font-size: 12px;

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
  padding: 14px 14px;
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
  padding: 12px 14px;
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
  <a href="registration.php" class="active">New Application</a>
  <a href="returnselect.php">Returns</a>
  <div class="dropdown">
    <button class="dropbtn">Reports 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="daywiseselect.php">Daily Reports</a>
      <a href="admindaywisecumselect.php">Daily/Monthly User wise Reports</a>
       <a href="cumulativeallreportselect.php">Category Wise Cummulative Report</a>
      <a href="returnsreportselect.php">Returns Report</a>
      <a href="monthlyreportselect.php">Monthly Referals Reports with Receipts</a>
      <a href="testwisereportselect.php">Test wise Reports (Business Report)</a>
	  <a href="doctorwisetestsselect.php">Doctor wise Tests Reports(Business)</a>
	  <a href="monthlydoctorsselect.php">Monthly Doctors Payments</a>
  	 <a href="catecumutestsselect.php">Category Cumulative Tests Report</a>
	  <a href="cumulativetestscountselect.php">Cumulative Tests Counts</a>
	  <a href="testlist.php">Total Tests List</a>
	  <a href="adminlogreportselect.php">Log History </a>
	  <a href="viewtransactionselect.php">View Transactions</a>


    </div>
  </div> 
  
  <div class="dropdown">
    <button class="dropbtn">Update Tasks
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="editcost.php">Update Test Costs</a>
  	   <a href="doctorslistreport.php">Update Doctors Info</a>
      <a href="updateuserpassword.php">Update User Password</a>
      <a href="updaterecordselect.php">Update Record</a>
      <a href="reprintselect.php">Re-print Receipt</a>
      <a href="deleteselect.php">Delete Record</a>
      <a href="deletedoctordisplay.php">Delete Doctor</a>
    </div>
  </div> 
  
     
  
  <div class="dropdown">
    <button class="dropbtn">Updated/Deleted Tasks
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
          <a href="updatedlistselectnotref.php">Updated Records without referal</a>
      <a href="updatedlistselect.php">Updated Records</a>
      <a href="deletedrecordsselect.php">Deleted Records</a>
      <a href="doctordeleteinglist.php" target="_blank">Deleted Doctors</a>
    </div>
  </div> 


 <div class="dropdown">
    <button class="dropbtn">Referals 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addreferal.php">Add Referals</a>
      <a href="referancerecordlistdisplay.php">Edit Referals</a>
      <a href="referancedeletelistdisplay.php">Delete Referals</a>
      <a href="referancezerotransactionselect.php">Zero Referals</a>

    </div>
  </div> 
  
  
  
  <div class="dropdown">
    <button class="dropbtn">Adding Tasks
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="adddoctor.php">Add Doctor</a>
      <a href="addtestselect.php">Add Test</a>
      <a href="addcategoryselect.php">Add Category</a>
      <a href="adduser.php">Add User</a>
      </div>
  </div> 
  
  
    <div class="dropdown">
    <button class="dropbtn">Upload Tasks
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="importdoctor.php">Upload Doctors</a>
      <a href="importtests.php">Upload Tests</a>
      <a href="importreferal.php">Upload Referals</a>
      </div>
  </div> 
  
  
  
  <div class="dropdown">
    <button class="dropbtn">Lists Printouts
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="testlistprint.php" target="_blank">Tests list</a>
      <a href="doctorslistprint.php" target="_blank">Doctors List</a>
            <a href="referalslistprint.php" target="_blank">Referals List</a>
      <a href="userslistprint.php" target="_blank">Users List</a>
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

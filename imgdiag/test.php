<?php

require_once('dbconn.php');



$sth = $dbconn->prepare("SELECT `id`, `product_name`, `price`, `category` FROM dummy order by id desc");
$sth->execute();
/* Fetch all of rows in the result set */
$results = $sth->fetchAll();



?>


<?php 
  
  $sth= $dbconn->prepare("SELECT count(*) FROM dummy");
  $sth->execute();
  $result1=$sth->fetchColumn();
  //echo $result1;
  
  ?>

  <div class="tab-content">
    <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
</div>
 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	



<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:(null)3="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
 
    
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "testsearch.php",
	data: dataString,
	cache: false,
	success: function(html)
	{

$("#resultt").html(html).show();
	}
	});
}return false;    
});

jQuery("#resultt").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#resultt").fadeOut(); 
	}
});

$('#searchid').click(function()

{
	jQuery("#resultt").fadeIn();
	

});
});
</script>




<style type="text/css">
	body{ 
		font-family:Tahoma, Geneva, sans-serif;
		font-size:18px;
		color:black
	}
	.content{
		width:300px;
		margin:0 auto;
	}
	#searchid
	{
		width:200px;
		border:solid 1px #000;
		padding:10px;
		font-size:12px;
		align :center;
	}
	#resultt
	{
		position:absolute;
		width:200px;
		padding:10px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
		font-color:black
		
	}
	.show
	{
		padding:8px; 
		border-bottom:1px #999 dashed;
		font-size:12px; 
		height:30px;
		font-color:black
		
	}
	.show:hover
	{
		background:white;
		color:#FFF;
		cursor:pointer;
	}
</style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    

  
<div class="content">

<input type="text" size="60" class="search" id="searchid" name="searchid" placeholder="Search for Doctors"  style='text-transform:uppercase'></left>

<div id="resultt">
</div>
</div>
<input type="hidden" id ='prod_id' value='' />
  
          <input type='text'  id='price'  placeholder='Quantity'  />
          
          <input type='number' id='category'  placeholder='Price'  />
          
<button type='button' id='saverecords'  class="btn btn-primary"   value ='Add Records'><i class="fa fa-plus"></i>
			&nbsp;&nbsp;Add Item</button>
        

 
<?php 
  
$sth= $dbconn->prepare("SELECT SUM(category) AS tot FROM dummy");
$sth->execute();
$result2=$sth->fetchColumn();
//echo $result2;


?><?php 
  
$sth= $dbconn->prepare("SELECT count(*) FROM dummy");
$sth->execute();
$result1=$sth->fetchColumn();
//echo $result1;

?>

<div class="panel panel-info">
         <div class="panel-heading">
         <h3 class="panel-title pull-right"><i class="fa fa-money"></i>&nbsp;&nbsp;Total 
			Price&nbsp;&nbsp;<span class="badge badge-secondary"><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $result2; ?></span></h3>
       
         <!-- <div class="panel-title pull-right"><span class="badge badge-secondary"><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $result2; ?></span></div>             -->
  <h3 class="panel-title">View Records</h3>
           
         </div>
         <div class="panel-body">
        
    <table table border="1" width="60%" cellpadding="10" style="border-collapse: collapse">
      <tr>
        <!-- <th>#</th> -->
        <th>Item Name</th>
        <th>Quantity</th>
        <th><i class="fa fa-rupee"></i>&nbsp; Price</th>
        <th>Action</th>

      </tr>
  <?php
  /* FetchAll foreach with edit and delete using Ajax */
  if($sth->rowCount()):
   foreach($results as $row){ ?>
     <tr>
       <!-- <td><?php //echo $row['id']; ?></td> -->
       <td style="font-size:12px;color:black; text-transform: uppercase;" bgcolor="#F9EEDF">
       <?php echo $row['product_name']; ?></td>
       <td bgcolor="#F9EEDF"><?php echo $row['price']; ?></td>
       <td bgcolor="#F9EEDF"><?php echo $row['category']; ?></td>
       <td bgcolor="#F9EEDF"><input type=button  value="delete" class='delbtn' data-pid=<?php echo $row['id']; ?> href='javascript:void(0)'><i class="fa fa-trash" aria-hidden="true" style="font-size:18px;color:red"></i></a></td>
     </tr>
   <?php }  ?>
  <?php endif;  ?>
  </table>
         </div>
     </div>
  

  </div>
  <script>
    $(function(){

      /* Delete button ajax call */
      $('.delbtn').on( 'click', function(){
        if(confirm('This action will delete this record. Are you sure?')){
          var pid = $(this).data('pid');
          $.post( "delete_ajax.php", { pid: pid })
          .done(function( data ) {
            if(data > 0){
              $('.success').show(30).html("Record deleted successfully.").delay(32).fadeOut(60);
            }else{
              $('.error').show(3000).html("Record could not be deleted. Please try again.").delay(3200).fadeOut(6000);;
            }
            setTimeout(function(){
                window.location.reload(1);
            }, 50);
          });
        }
      });

     /* Edit button ajax call */
      $('.editbtn').on( 'click', function(){
          var pid = $(this).data('pid');
          $.get( "getrecord_ajax.php", { id: pid })
            .done(function( product ) {
              data = $.parseJSON(product);

              if(data){
                $('#prod_id').val(data.id);
                $('#searchid').val(data.searchid);
                $('#price').val(data.price);
                $('#category').val(data.category);
                $("#saverecords").val('Save Records');
            }
          });
      });

      /* Edit button ajax call */
       $('#saverecords').on( 'click', function(){
           var prod_id  = $('#prod_id').val();
           var product = $('#searchid').val();
           var price   = $('#price').val();
           var category = $('#category').val();
           if(!product || !price || !category){
             $('.error').show(30).html("All fields are required.").delay(32).fadeOut(30);
           }else{
                if(prod_id){
                var url = 'edit_record_ajax.php';
              }else{
                var url = 'add_records_ajax.php';
              }
                $.post( url, {prod_id:prod_id, product: product, category: category, price: price  })
               .done(function( data ) {
                 if(data > 0){
                   $('.success').show(30).html("Record saved successfully.").delay(20).fadeOut(10);
                 }else{
                   $('.error').show(30).html("Record could not be saved. Please try again.").delay(20).fadeOut(1000);
                 }
                 $("#saverecords").val('Add Records');
                 setTimeout(function(){
                     window.location.reload(1);
                 }, 15);
             });
          }
       });
    });
 </script>


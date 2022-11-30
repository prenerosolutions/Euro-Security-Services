	<?php
include "header.php";

include "config.php";

	$employee_code = $_GET['employee_code'];
	$salary_id = $_GET['salary_id'];

	?>
<div class="container">
	<div class="row">
		<img src="assets/img/logo.png" alt="" style="height: 100px; float: left;">
	<h1  style="float: left;">Euro Security Services</h1>
	
	
</div>
<div class="row">
<h2>Staff Salary Slip </h2>
<table class="table table-hover table-striped">
	<thead>
			<?php
				$sql = "SELECT * FROM `employee` WHERE `employee_code` = '$employee_code'"; 
				$result = $connect->query($sql);
					if($result){
					$crow = mysqli_fetch_array($result);
				}
			?>

		<tr style="background:#5bc0de; ">
			<th><strong  style="color:#FFFFFF;">Staff Name</strong></th>
			<th><strong  style="color:#FFFFFF;"><?php echo $crow['employee_name'];?></strong></th>
            <th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
				$sql = "SELECT * FROM `salary` WHERE `salary_id` = '$salary_id'"; 
				$result = $connect->query($sql);
					if($result){
					$prow = mysqli_fetch_array($result);
				}
			?>

		<tr>
			<td>CNIC</td>
			<td><?php echo $crow['emp_email']; ?></td>
			<td>Email</td>
			<td><?php echo $crow['emp_phone']; ?></td>
		</tr>

		
		<tr>
			<td>Phone : </td>
			<td><?php echo $crow['esi']; ?></td>
			<td>Service : </td>
			<td><?php echo $prow['pf_num']; ?></td>
		</tr>

		

		<tr>
			
			<td>Customer Address </td>
			<td><?php echo $crow['address']; ?></td>
            <td> </td>
			<td> </td>
		</tr>

		<tr>
			
		</tr>
	</tbody>
</table>

<table class="table table-hover table-striped">
                                    <thead style="background:#5bc0de; ">
                                        <th> <strong style="color:#FFFFFF;">Salary Amount</strong></th>
                                        <th> <strong style="color:#FFFFFF;">Month</strong></th>
                                        <th><strong style="color:#FFFFFF;">Payment Date</strong></th>
                                          <th><strong style="color:#FFFFFF;">Payment Method</strong></th>
                                          
										
                                    </thead>
                                   <tbody>
								
                                       <?php
				$sql = "SELECT * FROM `salary` WHERE `salary_id`=$salary_id && `employee_code`=$employee_code"; 
				$iresult = $connect->query($sql);
					if($iresult){
					$irow = mysqli_fetch_array($iresult);
				}
			?>                    
                                
                                        <tr>
                                            <td><?php echo $irow['salary_amount']; ?></td>
                                            <td><?php echo $irow['pay_month']; ?></td>
                                            <td><?php echo $irow['submition_date']; ?></td>           
                                            
                                            <td><?php echo $irow['payment_method']; ?></td>
                                            
                                            
										  </tr> 
                                   
                                </tbody>
                            </table>
                            </div>
                            <div class="row" style="margin-bottom:120px;">
                            	<button class="btn btn-success" style="float:right; margin-left:10px;"> Download </button>
                                	<button class="btn btn-success"  style="float:right;"> Print </button>
                           
                            
                            
                            
                             </div> 
                            </div>
<?php
include "footer.php";
?>
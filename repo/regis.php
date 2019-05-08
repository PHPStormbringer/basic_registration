<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ERROR | E_WARNING );

include("header.php");  
?>

<style>
.event_info label{width:75px;}

</style>
<div class="container-fluid">
	<div class="row event_info">
		<div class="col-sm-4">
			<label>When:</label><?php echo "event date" ?>
		</div>
		<div class="col-sm-4">
			<label>Where:</label> <?php echo "event city" ?>
		</div>
		<div class="col-sm-4">
			<label>Name:</label> <?php echo "hotel name" ?><br />
			<label>Address:</label><?php echo "hotel address" ?><br />
			<label>Phone:</label><?php echo "event phone" ?>
		</div>
	</div>
</div>
<div class="container-fluid">
	<!--
	<div class="row">
		<div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
		<div class="col-sm-4" style="background-color:lavenderblush;">.col-sm-4</div>
		<div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
	</div>
	-->
	<form id="frmRegis" name="frmRegis" action="regis_action.php" method="post" >
		<input id="submit" name="submit" type="submit" />
		<hr />
		<div class="row">
        	<div class="col-sm-4" >
					<div class="input_caption">name</div>                    
			</div>
		</div>

		<div class="row">
        	<div class="col-sm-4" style="min-width:250px;max-height:35px;">
                <!--<input type="text" id="title" name="title" placeholder="title" value="<?php echo $_SESSION['regis']['title']; ?>" />-->
					<select id="title" name="title">
                        <option value="" selected="selected">Title</option>
                        <option value="Dr." <?php if ($_SESSION['regis']['title'] == 'Dr.') echo 'SELECTED';?> >Dr.</option>
                        <option value="Mr." <?php if ($_SESSION['regis']['title'] == 'Mr.') echo 'SELECTED';?>>Mr.</option>
                        <option value="Ms." <?php if ($_SESSION['regis']['title'] == 'Ms.') echo 'SELECTED';?>>Ms.</option>
                        <option value="Mrs. <?php if ($_SESSION['regis']['title'] == 'Mrs.') echo 'SELECTED';?>">Mrs.</option>
                        <option value="Miss"<?php if ($_SESSION['regis']['title'] == 'Miss') echo 'SELECTED';?>>Miss</option>
                    </select>
					
                    <input type="text" id="fname" name="fname" placeholder="first name" value="<?php echo $_SESSION['regis']['fname']; ?>" />
                    <input type="text" id="middle_initial" name="middle_initial" placeholder="mi" value="<?php echo $_SESSION['regis']['middle_initial']; ?>" />

                    <div class="error_message"><?php echo $_SESSION['regis_errors']['title']; ?></div>
                    <div class="error_message"><?php echo $_SESSION['regis_errors']['fname']; ?></div>
                    <div class="error_message"><?php echo $_SESSION['regis_errors']['middle_initial']; ?></div>
			</div>
			
            <div class="col-sm-4" >				
					<input type="text" id="lname" name="lname" placeholder="last name" value="<?php echo $_SESSION['regis']['lname']; ?>" />
					<div class="error_message"><?php echo $_SESSION['regis_errors']['lname']; ?></div>
			</div>
			
            
		</div>
		<div class="row">

        	<div class="col-sm-4" >
				<div class="input_caption">degrees</div>
				<input type="text" id="degrees" name="degrees" placeholder="degrees" value="<?php echo $_SESSION['regis']['degrees']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['degrees']; ?></div>
            </div>

            <div  class="col-sm-4" >
                <div class="input_caption">email</div>
                <input type="text" id="email" name="email" placeholder="email" value="<?php echo $_SESSION['regis']['email']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['email']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">preferred email</div>
                <input type="text" id="email_preferred" name="email_preferred" placeholder="preferred email" value="<?php echo $_SESSION['regis']['email_preferred']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['email_preferred']; ?></div>
            </div>

		</div>
		<div class="row">
			<div class="col-sm-4" >
                <div class="input_caption">phone</div>
                <input type="text" id="phone" name="phone" placeholder="phone" value="<?php echo $_SESSION['regis']['phone']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['phone']; ?></div>
            </div>

            <div class="col-sm-4" >
                <div class="input_caption">cell</div>
                <input type="text" id="cell" name="cell" placeholder="cell" value="<?php echo $_SESSION['regis']['cell']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['cell']; ?></div>
            </div>
            
            <div class="col-sm-4" >
                <div class="input_caption">professional titles</div>
                <input type="text" id="pro_titles" name="pro_titles" placeholder="professional titles" value="<?php echo $_SESSION['regis']['pro_titles']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['pro_titles']; ?></div>
            </div>    
		</div>
		<div class="row">
			<div class="col-sm-4" >
				<div class="input_caption">Specialty:*</div>

				<select name="specialty" id="specialty">
					<option value="" selected="selected">Specialty - Choose one.</option>
					<option value="Cardiothoracic Surgeon">Cardiothoracic Surgeon</option>
					<option value="Case Manager">Case Manager</option>
					<option value="Clinical Cardiologist">Clinical Cardiologist</option>
					<option value="Clinical Pharmacist">Clinical Pharmacist</option>
					<option value="Discharge Planner">Discharge Planner</option>
					<option value="Emergency Medicine">Emergency Medicine</option>
					<option value="Family/General Practitioner">Family/General Practitioner</option>
					<option value="Hospitalist">Hospitalist</option>
				
					<option value="Internist">Internist</option>
					<option value="Interventional Cardiologist">Interventional Cardiologist</option>
					<option value="Medical Director">Medical Director</option>
					<option value="Nurse Practitioner">Nurse Practitioner</option>
					<option value="Pharmacy Director">Pharmacy Director</option>
					<option value="Physician's Assistant">Physician's Assistant</option>
					<option value="Primary Care Physician">Primary Care Physician</option>
					<option value="Retail Pharmacist">Retail Pharmacist</option>
					<option value="Other Cath Lab Staff">Other Cath Lab Staff</option>
					<option value="Other Hospital Staff">Other Hospital Staff</option>
				</select>
                
				<div class="error_message"><?php echo $_SESSION['regis_errors']['specialty']; ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4" >
				<div class="input_caption">*Only aproved specialities are approved for this event</div>
			</div>
		</div>
		<hr />
		<div class="row">
            <div class="col-sm-4" >
                <div class="input_caption">Personal Address 1</div>
                <input type="text" id="addr1" name="addr1" placeholder="Address 1" value="<?php echo $_SESSION['regis']['addr1']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['addr1']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">Personal Address 2</div>
                <input type="text" id="addr2" name="addr2" placeholder="Address 2"  value="<?php echo $_SESSION['regis']['addr2']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['addr2']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">city</div>
                <input type="text" id="city" name="city" placeholder="city" value="<?php echo $_SESSION['regis']['city']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['city']; ?></div>
            </div>
		</div>
		<div class="row">

            <div class="col-sm-4" >
                <div id="caption_state" class="input_caption" >state</div>
                <div id="caption_zip"   class="input_caption" >zip</div>
            </div>
		</div>
		<div class="row">

            <div class="col-sm-4" >
				<select name="state" id="state"> 
					<option value=""  >Choose State</option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="MA">Massachusetts</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="PR">Puerto Rico</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VA">Virginia</option>
					<option value="VT">Vermont</option>
					<option value="WA">Washington</option>
					
                    <option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
                    <option value="DC">Washington, D.C.</option>
					
				</select>

                <input type="text" id="zip" name="zip" placeholder="zip"  onblur="checkZipCode(this)" value="<?php echo $_SESSION['regis']['zip']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['state']; ?></div>
                <div id="err_zip" class="error_message"><?php echo $_SESSION['regis_errors']['zip']; ?></div>
            </div>
		</div>


	</form>


<!--
	<div class="basic_registration" style="position:relative">
        <div class="page_title">Basic Registration 2</div>


		<form id="frmRegis" name="frmRegis" action="regis_action.php" method="post" >


            <div class="col-sm-4" >
                <div class="input_caption">Affiliation</div>
                <input type="text" id="org_name" name="org_name" value="<?php echo $_SESSION['regis']['org_name']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_name']; ?></div>
            </div>

        
            <div id="ig_organization" class="input_group">
                <div class="input_caption">Affiliation</div>
                <input type="text" id="org_name" name="org_name" value="<?php echo $_SESSION['regis']['org_name']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_name']; ?></div>
            </div>
        



            <div id="ig_payment_addr_1" class="input_group">
                <div class="input_caption">Payment Mailing Address 1</div>
                <input type="text" id="pay_addr1" name="pay_addr1" value="<?php echo $_SESSION['regis']['pay_addr1']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['pay_addr1']; ?></div>
            </div>
            <div id="ig_payment_addr_2" class="input_group">
                <div class="input_caption">address 2</div>
                <input type="text" id="pay_addr2" name="pay_addr2" value="<?php echo $_SESSION['regis']['pay_addr2']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['pay_addr2']; ?></div>
            </div>
            <div id="ig_payment_city" class="input_group">
                <div class="input_caption">city</div>
                <input type="text" id="pay_city" name="pay_city" value="<?php echo $_SESSION['regis']['pay_city']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['pay_city']; ?></div>
            </div>
            <div id="ig_payment_state" class="input_group">
                <div class="input_caption">state</div>
				<select name="pay_state" id="pay_state"> 
					<option value=""  >Choose one</option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DC">District of Columbia</option>
					<option value="DE">Delaware</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="MA">Massachusetts</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="PR">Puerto Rico</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VA">Virginia</option>
					<option value="VT">Vermont</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
                <div class="error_message"><?php echo $_SESSION['regis_errors']['pay_state']; ?></div>
            </div>
            <div id="ig_payment_zip" class="input_group">
                <div class="input_caption">zip code</div>
                <input type="text" id="pay_zip" name="pay_zip" onblur="checkZipCode(this)" value="<?php echo $_SESSION['regis']['pay_zip']; ?>" />
                <div id="err_pay_zip" class="error_message"><?php echo $_SESSION['regis_errors']['pay_zip']; ?></div>
            </div>



            <div id="ig_organization_addr_1" class="input_group">
                <div class="input_caption">address 1</div>
                <input type="text" id="org_addr1" name="org_addr1" value="<?php echo $_SESSION['regis']['org_addr1']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_addr1']; ?></div>
            </div>
            <div id="ig_organization_addr_2" class="input_group">
                <div class="input_caption">address 2</div>
                <input type="text" id="org_addr2" name="org_addr2" value="<?php echo $_SESSION['regis']['org_addr2']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_addr2']; ?></div>
            </div>
            <div id="ig_organization_city" class="input_group">
                <div class="input_caption">city</div>
                <input type="text" id="org_city" name="org_city" value="<?php echo $_SESSION['regis']['org_city']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_city']; ?></div>
            </div>
            <div id="ig_organization_state" class="input_group">
                <div class="input_caption">state</div>
				<select name="org_state" id="org_state"> 
					<option value=""  >Choose one</option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DC">District of Columbia</option>
					<option value="DE">Delaware</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="MA">Massachusetts</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="PR">Puerto Rico</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VA">Virginia</option>
					<option value="VT">Vermont</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_state']; ?></div>
            </div>
            <div id="ig_organization_zip" class="input_group">
                <div class="input_caption">zip code</div>
                <input type="text" id="org_zip" name="org_zip" onblur="checkZipCode(this)" value="<?php echo $_SESSION['regis']['org_zip']; ?>" />
                <div id="err_org_zip" class="error_message"><?php echo $_SESSION['regis_errors']['org_zip']; ?></div>
            </div>

            <div id="ig_state_licensed" class="input_group">
                <div class="input_caption">state licensed</div>
                <input type="text" id="state_licensed" name="state_licensed" value="<?php echo $_SESSION['regis']['state_licensed']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['state_licensed']; ?></div>
            </div>
            <div id="ig_license_number" class="input_group">
                <div class="input_caption">license number</div>
                <input type="text" id="license_number" name="license_number" value="<?php echo $_SESSION['regis']['license_number']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['license_number']; ?></div>
            </div>
            <div id="ig_hcp_nci_number" class="input_group">
                <div class="input_caption">hcp nci number</div>
                <input type="text" id="hcp_nci_number" name="hcp_nci_number" value="<?php echo $_SESSION['regis']['hcp_nci_number']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['hcp_nci_number']; ?></div>
            </div>
            
            <div id="ig_emergency_contact_name" class="input_group">
                <div class="input_caption">emergency contact name</div>
                <input type="text" id="emergency_contact_name" name="emergency_contact_name" value="<?php echo $_SESSION['regis']['emergency_contact_name']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['emergency_contact_name']; ?></div>
            </div>
            <div id="ig_emergency_contact_phone" class="input_group">
                <div class="input_caption">emergency contact phone</div>
                <input type="text" id="emergency_contact_phone" name="emergency_contact_phone" value="<?php echo $_SESSION['regis']['emergency_contact_phone']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['emergency_contact_phone']; ?></div>
            </div>
            <div id="ig_emergency_contact_email" class="input_group">
                <div class="input_caption">emergency contact name</div>
                <input type="text" id="emergency_contact_email" name="emergency_contact_email" value="<?php echo $_SESSION['regis']['emergency_contact_email']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['emergency_contact_email']; ?></div>
            </div>

			<div id="ig_comments">
                <div class="input_caption">comments</div>
                <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
                
                <div class="error_message"><?php echo $_SESSION['regis_errors']['comments']; ?></div>
            </div>
            
			<div id="ig_special_needs">
                <div class="input_caption">special needs</div>
                <textarea id="special_needs" name="special_needs" rows="4" cols="50"></textarea>
                <div class="error_message"><?php echo $_SESSION['regis_errors']['special_needs']; ?></div>
            </div>
            
			<div id="ig_hotel">
                <div class="input_caption">hotel</div>
                <input type="radio" name="hotel" id="hotel_y" value="yes" checked />
				<input type="radio" name="hotel" id="hotel_n" value="no" />                
                <div class="error_message"><?php echo $_SESSION['regis_errors']['hotel']; ?></div>
			</div>
            
		</form>
	</div>
-->
<br /><br />
<script src="js/custom.js"></script>
<script type="text/javascript">
	
	var arrErrors = <?php echo json_encode($_SESSION['regis_errors']); ?>;
	error_highlighting(arrErrors);

</script>
<?php include("footer.php"); ?>  
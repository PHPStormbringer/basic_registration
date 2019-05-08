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
			<label>When:</label><?php echo $_SESSION['EVENT_DATA'][event_date_init]; ?>
		</div>
		<div class="col-sm-4">
			<label>Where:</label><?php echo $_SESSION['EVENT_DATA'][hotel_city]. ", ". $_SESSION['EVENT_DATA'][hotel_state]; ?>
		</div>
		<div class="col-sm-4">
			<label>Hotel:</label><?php echo $_SESSION['EVENT_DATA'][hotel_name]; ?><br />
			<label>Address:</label><?php echo $_SESSION['EVENT_DATA'][hotel_addr1]; ?><br />
			<label>Phone:</label><?php echo $_SESSION['EVENT_DATA'][contact_phone]; ?>
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
	<form id="frmRegis" name="frmRegis" action="regis_action" method="post" >
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
                    <input type="text" id="mi" name="mi" placeholder="mi" value="<?php echo $_SESSION['regis']['mi']; ?>" />

                    <div class="error_message"><?php echo $_SESSION['regis_errors']['title']; ?></div>
                    <div class="error_message"><?php echo $_SESSION['regis_errors']['fname']; ?></div>
                    <div class="error_message"><?php echo $_SESSION['regis_errors']['mi']; ?></div>
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
                <input type="text" id="email2" name="email2" placeholder="preferred email" value="<?php echo $_SESSION['regis']['email2']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['email2']; ?></div>
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

		<hr />
		<div class="row">
            <div class="col-sm-4" >
                <div class="input_caption">Payment Mailing Address 1</div>
                <input type="text" id="pay_addr1" name="pay_addr1" placeholder="payment address 1" value="<?php echo $_SESSION['regis']['pay_addr1']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['pay_addr1']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">address 2</div>
                <input type="text" id="pay_addr2" name="pay_addr2" placeholder="payment address 2" value="<?php echo $_SESSION['regis']['pay_addr2']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['pay_addr2']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">city</div>
                <input type="text" id="pay_city" name="pay_city"  placeholder="payment city" value="<?php echo $_SESSION['regis']['pay_city']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['pay_city']; ?></div>
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
				<input type="text" id="pay_zip" name="pay_zip" placeholder="pay zip" onblur="checkZipCode(this)" value="<?php echo $_SESSION['regis']['pay_zip']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['pay_state']; ?></div>
                <div id="err_pay_zip" class="error_message"><?php echo $_SESSION['regis_errors']['pay_zip']; ?></div>
            </div>
		</div>
		<hr />

		<div class="row">
            <div class="col-sm-4" >
                <div class="input_caption">Affiliation</div>
                <input type="text" id="org_name" name="org_name" placeholder="affiliation" value="<?php echo $_SESSION['regis']['org_name']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_name']; ?></div>
            </div>
		</div>
		<div class="row">
            <div class="col-sm-4" >
                <div class="input_caption">Affiliate Mailing Address 1</div>
                <input type="text" id="org_addr1" name="org_addr1" placeholder="affiliate address 1" value="<?php echo $_SESSION['regis']['org_addr1']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_addr1']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">address 2</div>
                <input type="text" id="org_addr2" name="org_addr2" placeholder="affiliate address 2" value="<?php echo $_SESSION['regis']['org_addr2']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_addr2']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">city</div>
                <input type="text" id="org_city" name="org_city"  placeholder="affiliate city" value="<?php echo $_SESSION['regis']['org_city']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_city']; ?></div>
            </div>
		</div>
		<div class="row">
            <div class="col-sm-4" >
                <div id="caption_state" class="input_caption" >affiliate state</div>
                <div id="caption_zip"   class="input_caption" >affiliate zip</div>
            </div>
		</div>
		<div class="row">
            <div class="col-sm-4" >
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
				<input type="text" id="org_zip" name="org_zip" placeholder="aff. zip" onblur="checkZipCode(this)" value="<?php echo $_SESSION['regis']['org_zip']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['org_state']; ?></div>
                <div id="err_org_zip" class="error_message"><?php echo $_SESSION['regis_errors']['org_zip']; ?></div>
            </div>
		</div>
		<hr />
		<div class="row">
            <div class="col-sm-4" >
                <div class="input_caption">state licensed</div>
                <input type="text" id="state_licensed" name="state_licensed" placeholder="states licensed" value="<?php echo $_SESSION['regis']['state_licensed']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['state_licensed']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">license number</div>
                <input type="text" id="license_number" name="license_number" placeholder="license number" value="<?php echo $_SESSION['regis']['license_number']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['license_number']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">hcp nci number</div>
                <input type="text" id="hcp_nci_number" name="hcp_nci_number" placeholder="HCP NCI number" value="<?php echo $_SESSION['regis']['hcp_nci_number']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['hcp_nci_number']; ?></div>
            </div>
		</div>

		<hr />
		<div class="row">
            <div class="col-sm-4" >
                <div class="input_caption">emergency contact name</div>
                <input type="text" id="emergency_contact_name" name="emergency_contact_name" placeholder="emergency contact name" value="<?php echo $_SESSION['regis']['emergency_contact_name']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['emergency_contact_name']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">emergency contact phone</div>
                <input type="text" id="emergency_contact_phone" name="emergency_contact_phone" placeholder="emergency contact phone" value="<?php echo $_SESSION['regis']['emergency_contact_phone']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['emergency_contact_phone']; ?></div>
            </div>
            <div class="col-sm-4" >
                <div class="input_caption">emergency contact email</div>
                <input type="text" id="emergency_contact_email" name="emergency_contact_email"  placeholder="emergency contact email" value="<?php echo $_SESSION['regis']['emergency_contact_email']; ?>" />
                <div class="error_message"><?php echo $_SESSION['regis_errors']['emergency_contact_email']; ?></div>
            </div>
		</div>

		<hr />
		<div class="row">
			<div class="col-sm-4" >
                <div class="input_caption">comments</div>
                <textarea id="comments" name="comments" placeholder="comments" ></textarea>
                
                <div class="error_message"><?php echo $_SESSION['regis_errors']['comments']; ?></div>
            </div>
			<div class="col-sm-4" >
                <div class="input_caption">special needs</div>
                <textarea id="special_needs" name="special_needs" placeholder="special_needs" ></textarea>
                <div class="error_message"><?php echo $_SESSION['regis_errors']['special_needs']; ?></div>
            </div>

			<div class="col-sm-4" >
                <div class="input_caption perm">hotel accomodations needed</div>
                <input type="radio" name="hotel" id="hotel_y" value="yes" checked />Yes
				<input type="radio" name="hotel" id="hotel_n" value="no" />            No    
                <div class="error_message"><?php echo $_SESSION['regis_errors']['hotel']; ?></div>
			</div>
		</div>

	</form>
</div>

<br /><br />
<script src="js/custom.js"></script>
<script type="text/javascript">
	
	var arrErrors = <?php echo json_encode($_SESSION['regis_errors']); ?>;
	error_highlighting(arrErrors);

</script>
<?php include("footer.php"); ?>  
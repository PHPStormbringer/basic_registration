// JavaScript Document
	
	function error_highlighting(err)	
	{
		/* Put all input backgrounds back to white */
		var x = document.getElementsByTagName("input");
		var i;
		for (i = 0; i < x.length; i++) 
		{
			x[i].style.backgroundColor = "white";
		}
		
		var fields = ["title","degrees","fname","middle_initial","lname","email","email2","phone","cell","pro_titles","specialty","addr1","addr2","city","state","zip","pay_addr1","pay_addr2","pay_city","pay_state","pay_zip","org_name","org_addr1","org_addr2","org_city","org_state","org_zip","state_licensed","license_number","hcp_nci_number","emergency_contact_name","emergency_contact_phone","emergency_contact_email","comments","special_needs","hotel"];
			 
	//	var err = <?php echo json_encode($_SESSION['regis_errors']); ?>;
		
		for (i=0; i < fields.length; i++)
		{
			if( err[fields[i]] != "" &&  err[fields[i]] != null ) document.getElementById(fields[i]).style.backgroundColor="#ffbbbb";
		}
	}


	function checkZipCode(x)
	{
	
		var patt = /^[a-zA-Z0-9]+$/;
		var res = patt.test(x.value);
		
		if(x.value.length == 0)
		{

		}
		else if (x.value.length < 5 )
		{
			if(x.id == "pay_zip")
			{
				document.getElementById('err_pay_zip').innerHTML = "This zip code seems to be too short.";
			}
			else if(x.id == "org_zip")
			{
				document.getElementById('err_org_zip').innerHTML = "This zip code seems to be too short.";
			}
			else if(x.id == "zip")
			{
				document.getElementById('err_zip').innerHTML = "This zip code seems to be too short.";
			}
			document.getElementById('submit').disabled = true;
		}
		else
		{
			if(res == false)
			{
				if(x.id == "pay_zip")
				{
					document.getElementById('err_pay_zip').innerHTML = "Please enter a valid zip code.";
				}
				else if(x.id == "org_zip")
				{
					document.getElementById('err_org_zip').innerHTML = "Please enter a valid zip code.";
				}
				else if(x.id == "zip")
				{
					document.getElementById('err_zip').innerHTML = "Please enter a valid zip code.";
				}
				document.getElementById('submit').disabled = true;
			}
			else
			{
				if(x.id == "pay_zip")
				{
					document.getElementById('err_pay_zip').innerHTML = "";
				}
				else if(x.id == "org_zip")
				{
					document.getElementById('err_org_zip').innerHTML = "";
				}
				else if(x.id == "zip")
				{
					document.getElementById('err_zip').innerHTML = "";
				}
				document.getElementById('submit').disabled = false;
			}
		}
	//	if(res == false) alert("Please enter a valid zip code.")
		
	}

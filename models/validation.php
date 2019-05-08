<?php
// ***********************************************************
// name: validation.php
// date: 22 mar 2016
// auth:  vvenning
//
// Proj: basic registration bootstrap
// ***********************************************************
//
// **********************************************************************************************************
// Validation Functions  
// **********************************************************************************************************
// NOTE:  I'm not happy with this class.  Look into c_types on php.net
//
//

include_once "definitions_rsvp.php";

class validation
{

	public static function clean_POST_Array($arr_POST)
	{
  	    if($arr_POST == $_GET)
		{
			
			//filter_input_array(INPUT_GET, FILTER_SANITIZE_EMAIL);
		    return filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING); 
		}
		elseif ($arr_POST == $_POST)
		{
		    return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
   		}
	}
	// This is NOT a generic function.  It's very specific to basic registration
	public static function sanitize_and_validate_POST()
	{
		// sanitize title
		if ( !empty($_POST['title']) ) 
		{
			$_POST['title'] = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
			if ($_POST['title'] == "") 
			{
				$errors['title'] = ERR_TITLE_VALID;
			}
		} 
		elseif(REQ_title == true)
		{
			$errors['title'] = ERR_TITLE_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize degrees
		if ( !empty($_POST['degrees']) ) 
		{
			$_POST['degrees'] = filter_var($_POST['degrees'], FILTER_SANITIZE_STRING);
			if ($_POST['degrees'] == "") 
			{
				$errors['degrees'] = ERR_DEGREES_VALID;
			}
		} 
		elseif(REQ_degrees == true)
		{
			$errors['degrees'] = ERR_DEGREES_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize first name
		if ( !empty($_POST['fname']) ) 
		{
			$_POST['fname'] = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
			if ($_POST['fname'] == "") 
			{
				$errors['fname'] = ERR_FNAME_VALID;
			}
		} 
		elseif(REQ_fname == true)
		{
			$errors['fname'] = ERR_FNAME_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize middle initial
		if ( !empty($_POST['mi']) ) 
		{
			$_POST['mi'] = filter_var($_POST['mi'], FILTER_SANITIZE_STRING);
			if ($_POST['mi'] == "") 
			{
				$errors['mi'] = ERR_MIDDLE_INITIAL_VALID;
			}
		} 
		elseif(REQ_middle_initial == true)
		{
			$errors['mi'] = ERR_MIDDLE_INITIAL_EMPTY; // This is only necessary if it is a required field
		}
		
		// sanitize last name
		if ( !empty($_POST['lname']) ) 
		{
			$_POST['lname'] = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
			if ($_POST['lname'] == "") 
			{
				$errors['lname'] = ERR_LNAME_VALID;
			}
		} 
		elseif(REQ_lname == true) 
		{
			$errors['lname'] = ERR_LNAME_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize email
		if ( !empty($_POST['email']) ) 
		{
			$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			if ($_POST['email'] == "") 
			{
				$errors['email'] = ERR_EMAIL_VALID;
			}
			elseif (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))
			{
				$errors['email'] = ERR_EMAIL_VALID;
			}
		} 
		elseif(REQ_email == true) 
		{
			$errors['email'] = ERR_EMAIL_EMPTY; // This is only necessary if it is a required field
		}
		
		
	
		// sanitize preferred email
		if ( !empty($_POST['email2']) ) 
		{
			$_POST['email2'] = filter_var($_POST['email2'], FILTER_SANITIZE_EMAIL);
			
			if ($_POST['email2'] == "") 
			{
				$errors['email2'] = ERR_EMAIL_VALID;
			}
			elseif (!filter_input(INPUT_POST, 'email2', FILTER_VALIDATE_EMAIL))
			{
				$errors['email2'] = ERR_EMAIL_VALID;
			}
		} 
		elseif(REQ_email_preferred == true) 
		{
			$errors['email2'] = ERR_EMAIL_EMPTY; // This is only necessary if it is a required field
		}
		

	
		// sanitize phone
		if ( !empty($_POST['phone']) )
		{
			$_POST['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
			if ($_POST['phone'] == "") 
			{
				$errors['phone'] = ERR_PHONE_VALID;
			}
		} 
		elseif(REQ_phone == true) 
		{
			$errors['phone'] = ERR_PHONE_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize cell
		if ( !empty($_POST['cell']) ) 
		{
			$_POST['cell'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
			if ($_POST['cell'] == "") 
			{
				$errors['cell'] = ERR_CELL_VALID;
			}
		} 
		elseif(REQ_cell == true) 
		{
			$errors['cell'] = ERR_CELL_EMPTY; // This is only necessary if it is a required field
		}
		
		// sanitize professional titles
		if ( !empty($_POST['pro_titles']) ) 
		{
			$_POST['pro_titles'] = filter_var($_POST['pro_titles'], FILTER_SANITIZE_STRING);
			if ($_POST['pro_titles'] == "") 
			{
				$errors['pro_titles'] = ERR_PROFESSIONAL_TITLES_VALID;
			}
		} 
		elseif(REQ_professional_titles == true) 
		{
			$errors['pro_titles'] = ERR_PROFESSIONAL_TITLES_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize specialty.
		if ( !empty($_POST['specialty']) ) 
		{
			$_POST['specialty'] = filter_var($_POST['specialty'], FILTER_SANITIZE_STRING);
			if ($_POST['specialty'] == "") 
			{
				$errors['specialty'] = ERR_SPECIALTY_VALID;
			}
		} 
		elseif(REQ_specialty == true) 
		{
			$errors['specialty'] = ERR_SPECIALTY_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize personal address 1
		if ( !empty($_POST['addr1']) ) 
		{
			$_POST['addr1'] = filter_var($_POST['addr1'], FILTER_SANITIZE_STRING);
			if ($_POST['addr1'] == "") 
			{
				$errors['addr1'] = ERR_ADDR1_VALID;
			}
		} 
		elseif(REQ_addr1 == true) 
		{
			$errors['addr1'] = ERR_ADDR1_EMPTY; // This is only necessary if it is a required field
		}
		
		// sanitize personalize address 2
		if ( !empty($_POST['addr2']) )
		{
			$_POST['addr2'] = filter_var($_POST['addr2'], FILTER_SANITIZE_STRING);
			if ($_POST['addr2'] == "") 
			{
				$errors['addr2'] = ERR_ADDR2_VALID;
			}
		} 
		elseif(REQ_addr2 == true) 
		{
			$errors['addr2'] = ERR_ADDR2_EMPTY; // This is only necessary if it is a required field
		}
		
		// sanitize personal city
		if ( !empty($_POST['city']) ) 
		{
			$_POST['city'] = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
			if ($_POST['city'] == "") 
			{
				$errors['city'] = ERR_CITY_VALID;
			}
		} 
		elseif(REQ_city == true) 
		{
			$errors['city'] = ERR_CITY_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize personal state
		if ( !empty($_POST['state']) ) 
		{
			$_POST['state'] = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
			if ($_POST['state'] == "") 
			{
				$errors['state'] = ERR_STATE_VALID;
			}
		} 
		elseif(REQ_state == true) 
		{
			$errors['state'] = ERR_STATE_EMPTY; // This is only necessary if it is a required field
		}
			
		// sanitize personal zip
		if ( !empty($_POST['zip']) )
		{
			$_POST['zip'] = filter_var($_POST['zip'], FILTER_SANITIZE_STRING);
			if ($_POST['zip'] == "") 
			{
				$errors['zip'] = ERR_ZIP_VALID;
			}
		} 
		elseif(REQ_zip == true) 
		{
			$errors['zip'] = ERR_ZIP_EMPTY; // This is only necessary if it is a required field
		}
	
		// payment mailing information
	
		// sanitize payment mailing address 1
		if ( !empty($_POST['pay_addr1']) ) 
		{
			$_POST['pay_addr1'] = filter_var($_POST['pay_addr1'], FILTER_SANITIZE_STRING);
			if ($_POST['pay_addr1'] == "") 
			{
				$errors['pay_addr1'] = ERR_PAY_ADDR1_VALID;
			}
		} 
		elseif(REQ_pay_addr1 == true) 
		{
			$errors['pay_addr1'] = ERR_PAY_ADDR1_EMPTY; // This is only necessary if it is a required field
		}
		
		// sanitize payment mailing 2
		if ( !empty($_POST['pay_addr2']) ) 
		{
			$_POST['pay_addr2'] = filter_var($_POST['pay_addr2'], FILTER_SANITIZE_STRING);
			if ($_POST['pay_addr2'] == "") 
			{
				$errors['pay_addr2'] = ERR_PAY_ADDR2_VALID;
			}
		} 
		elseif(REQ_pay_addr2 == true) 
		{
			$errors['pay_addr2'] = ERR_PAY_ADDR2_EMPTY; // This is only necessary if it is a required field
		}
		
		// sanitize payment mailing city
		if ( !empty($_POST['pay_city']) )
		{
			$_POST['pay_city'] = filter_var($_POST['pay_city'], FILTER_SANITIZE_STRING);
			if ($_POST['pay_city'] == "") 
			{
				$errors['pay_city'] = ERR_PAY_CITY_VALID;
			}
		} 
		elseif(REQ_pay_city == true) 
		{
			$errors['pay_city'] = ERR_PAY_CITY_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize payment mailing state
		if ( !empty($_POST['pay_state']) ) 
		{
			$_POST['pay_state'] = filter_var($_POST['pay_state'], FILTER_SANITIZE_STRING);
			if ($_POST['pay_state'] == "") 
			{
				$errors['pay_state'] = ERR_PAY_STATE_VALID;
			}
		} 
		elseif(REQ_pay_state == true) 
		{
			$errors['pay_state'] = ERR_PAY_STATE_EMPTY; // This is only necessary if it is a required field
		}
			
		// sanitize payment mailing zip
		if ( !empty($_POST['pay_zip']) )
		{
			$_POST['pay_zip'] = filter_var($_POST['pay_zip'], FILTER_SANITIZE_STRING);
			if ($_POST['pay_zip'] == "") 
			{
				$errors['pay_zip'] = ERR_PAY_ZIP_VALID;
			}
		} 
		elseif(REQ_zip == true) 
		{
			$errors['pay_zip'] = ERR_PAY_ZIP_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize organization
		if ( !empty($_POST['org_name']) ) 
		{
			$_POST['org_name'] = filter_var($_POST['org_name'], FILTER_SANITIZE_STRING);
			if ($_POST['org_name'] == "") 
			{
				$errors['org_name'] = ERR_ORG_NAME_VALID;
			}
		} 
		elseif(REQ_org_name == true) 
		{
			$errors['org_name'] = ERR_ORG_NAME_EMPTY; // This is only necessary if it is a required field
		}
	
		// organization information
	
		// sanitize organization address 1
		if ( !empty($_POST['org_addr1']) ) 
		{
			$_POST['org_addr1'] = filter_var($_POST['org_addr1'], FILTER_SANITIZE_STRING);
			if ($_POST['org_addr1'] == "") 
			{
				$errors['org_addr1'] = ERR_ORG_ADDR1_VALID;
			}
		} 
		elseif(REQ_org_addr1 == true) 
		{
			$errors['org_addr1'] = ERR_ORG_ADDR1_EMPTY; // This is only necessary if it is a required field
		}
		
		// sanitize organization 2
		if ( !empty($_POST['org_addr2']) ) 
		{
			$_POST['org_addr2'] = filter_var($_POST['org_addr2'], FILTER_SANITIZE_STRING);
			if ($_POST['org_addr2'] == "") 
			{
				$errors['org_addr2'] = ERR_ORG_ADDR2_VALID;
			}
		} 
		elseif(REQ_org_addr2 == true) 
		{
			$errors['org_addr2'] = ERR_ORG_ADDR2_EMPTY; // This is only necessary if it is a required field
		}
		
		// sanitize organization city
		if ( !empty($_POST['org_city']) ) 
		{
			$_POST['org_city'] = filter_var($_POST['org_city'], FILTER_SANITIZE_STRING);
			if ($_POST['org_city'] == "") 
			{
				$errors['org_city'] = ERR_ORG_CITY_VALID;
			}
		} 
		elseif(REQ_org_city == true) 
		{
			$errors['org_city'] = ERR_ORG_CITY_EMPTY; // This is only necessary if it is a required field
		}
	
		// sanitize organization state
		if ( !empty($_POST['org_state']) ) 
		{
			$_POST['org_state'] = filter_var($_POST['org_state'], FILTER_SANITIZE_STRING);
			if ($_POST['org_state'] == "") 
			{
				$errors['org_state'] = ERR_ORG_STATE_VALID;
			}
		} 
		elseif(REQ_org_state == true) 
		{
			$errors['org_state'] = ERR_ORG_STATE_EMPTY; // This is only necessary if it is a required field
		}
			
		// sanitize organization zip
		if ( !empty($_POST['org_zip']) ) 
		{
			$_POST['org_zip'] = filter_var($_POST['org_zip'], FILTER_SANITIZE_STRING);
			if ($_POST['org_zip'] == "") 
			{
				$errors['org_zip'] = ERR_ORG_ZIP_VALID;
			}
		} 
		elseif(REQ_zip == true) 
		{
			$errors['org_zip'] = ERR_ORG_ZIP_EMPTY; // This is only necessary if it is a required field
		}
	
		// ***************************************
		// state licensed
		if ( !empty($_POST['state_licensed']) ) 
		{
			$_POST['state_licensed'] = filter_var($_POST['state_licensed'], FILTER_SANITIZE_STRING);
			if ($_POST['state_licensed'] == "") 
			{
				$errors['state_licensed'] = ERR_STATE_LICENSED_VALID;
			}
		} 
		elseif(REQ_state_licensed == true) 
		{
			$errors['state_licensed'] = ERR_STATE_LICENSED_EMPTY; // This is only necessary if it is a required field
		}
		
		// license number
		if ( !empty($_POST['license_number']) ) 
		{
			$_POST['license_number'] = filter_var($_POST['license_number'], FILTER_SANITIZE_STRING);
			if ($_POST['license_number'] == "") 
			{
				$errors['license_number'] = ERR_LICENSE_NUMBER_VALID;
			}
		} 
		elseif(REQ_license_number == true) 
		{
			$errors['license_number'] = ERR_LICENSE_NUMBER_EMPTY; // This is only necessary if it is a required field
		}
	
		// hcp nci number
		if ( !empty($_POST['hcp_nci_number']) ) 
		{
			$_POST['hcp_nci_number'] = filter_var($_POST['hcp_nci_number'], FILTER_SANITIZE_STRING);
			if ($_POST['hcp_nci_number'] == "") 
			{
				$errors['hcp_nci_number'] = ERR_HCP_NCI_NUMBER_VALID;
			}
		} 
		elseif(REQ_hcp_nci_number == true) 
		{
			$errors['hcp_nci_number'] = ERR_HCP_NCI_NUMBER_EMPTY; // This is only necessary if it is a required field
		}
	
		// emergency contact name
		if ( !empty($_POST['emergency_contact_name']) ) 
		{
			$_POST['emergency_contact_name'] = filter_var($_POST['emergency_contact_name'], FILTER_SANITIZE_STRING);
			if ($_POST['emergency_contact_name'] == "") 
			{
				$errors['emergency_contact_name'] = ERR_EMERGENCY_CONTACT_NAME_VALID;
			}
		} 
		elseif(REQ_emergency_contact_name == true) 
		{
			$errors['emergency_contact_name'] = ERR_EMERGENCY_CONTACT_NAME_EMPTY; // This is only necessary if it is a required field
		}
	
		// emergency contact phone
		if ( !empty($_POST['emergency_contact_phone']) ) 
		{
			$_POST['emergency_contact_phone'] = filter_var($_POST['emergency_contact_phone'], FILTER_SANITIZE_STRING);
			if ($_POST['emergency_contact_phone'] == "") 
			{
				$errors['emergency_contact_phone'] = ERR_EMERGENCY_CONTACT_PHONE_VALID;
			}
		} 
		elseif(REQ_emergency_contact_phone == true) 
		{
			$errors['emergency_contact_phone'] = ERR_EMERGENCY_CONTACT_PHONE_EMPTY; // This is only necessary if it is a required field
		}
	
		// emergency contact phone
		/*
		if ($_POST['emergency_contact_phone'] != "") 
		{
			$_POST['emergency_contact_phone'] = filter_var($_POST['emergency_contact_phone'], FILTER_SANITIZE_STRING);
			if ($_POST['emergency_contact_phone'] == "") 
			{
				$errors['emergency_contact_phone'] = ERR_EMERGENCY_CONTACT_PHONE_VALID;
			}
		} 
		elseif(REQ_emergency_contact_phone == true) 
		{
			$errors['emergency_contact_phone'] = ERR_EMERGENCY_CONTACT_PHONE_EMPTY; // This is only necessary if it is a required field
		}
		*/
		
		// emergency contact email
		if ( !empty($_POST['emergency_contact_email']) ) 
		{
			$_POST['emergency_contact_email'] = filter_var($_POST['emergency_contact_email'], FILTER_SANITIZE_STRING);
			if ($_POST['emergency_contact_email'] == "") 
			{
				$errors['emergency_contact_email'] = ERR_EMERGENCY_CONTACT_EMAIL_VALID;
			}
		} 
		elseif(REQ_emergency_contact_email == true) 
		{
			$errors['emergency_contact_email'] = ERR_EMERGENCY_CONTACT_EMAIL_EMPTY; // This is only necessary if it is a required field
		}
	
		// comments
		if ( !empty($_POST['comments']) ) 
		{
			$_POST['comments'] = filter_var($_POST['comments'], FILTER_SANITIZE_STRING);
			if ($_POST['comments'] == "") 
			{
				$errors['comments'] = ERR_COMMENTS_VALID;
			}
		} 
		elseif(REQ_comments == true) 
		{
			$errors['comments'] = ERR_COMMENTS_EMPTY; // This is only necessary if it is a required field
		}
	
		// comments
		if ( !empty($_POST['special_needs']) ) 
		{
			$_POST['special_needs'] = filter_var($_POST['special_needs'], FILTER_SANITIZE_STRING);
			if ($_POST['special_needs'] == "") 
			{
				$errors['special_needs'] = ERR_SPECIAL_NEEDS_VALID;
			}
		} 
		elseif(REQ_special_needs == true) 
		{
			$errors['special_needs'] = ERR_SPECIAL_NEEDS_EMPTY; // This is only necessary if it is a required field
		}
		
		if (isset($errors) && count($errors) > 0)
		{
			return $errors;
		}
		//return isset($errors) && count($errors) > 0 ? $errors : true;
	}
		
	// filter for evil
	function filter($data) 
	{	//Filters data against security risks.
		if (is_array($data)) 
		{
			foreach ($data as $key => $element) 
			{
				$data[$key] = filter($element);
			}
		} 
		else 
		{
			$data = trim(htmlentities(strip_tags($data)));
		
			if(get_magic_quotes_gpc()) $data = stripslashes($data);
		
		}
		return $data;
	}



	
	// 2012-05-27	VAV		Will this work though?  Richard enters some wierd stuff
	public static function encode_HTML_text_for_db_storage($txt_HTML)
	{
        return filter_var($txt_HTML, FILTER_SANITIZE_SPECIAL_CHARS);
	}

	// 2012-05-27	VAV		Will this work though?	
	public static function decode_db_storage_for_HTML_display($txt_HTML)
	{
        return html_entity_decode($txt_HTML);
	}
	
	public static function clean_email_address($email_address)
    {
        $email_address_filtered = filter_var($email_address, FILTER_SANITIZE_EMAIL);
		
		return $email_address_filtered;
    }
    
    public static function clean_string_input($str)
	{
	    filter_var($str, FILTER_SANITIZE_STRING);
	}
	
    public static function check_alphanum($txt)
    {
        $pattern = '/^[a-zA-Z]{1,25}$/';
		
    	if (preg_match($pattern,$txt))
	   	{ 
            return true;
		}
		else
		{
		    return false;
		}
    }
	
	
    public static function encrypt($txt)
    {
		return $txt;
    }

    public static function stop_sql_injection_v1($txt)
    {

        

    }
	
    // I don;t know if these work being private
    private function fnEncrypt($sValue, $sSecretKey)
    {
        return trim(
            base64_encode(
                mcrypt_encrypt(
                    MCRYPT_RIJNDAEL_256,
                    $sSecretKey, $sValue, 
                    MCRYPT_MODE_ECB, 
                    mcrypt_create_iv(
                        mcrypt_get_iv_size(
                            MCRYPT_RIJNDAEL_256, 
                            MCRYPT_MODE_ECB
                        ), 
                        MCRYPT_RAND)
                    )
                )
            );
    }

    private function fnDecrypt($sValue, $sSecretKey)
    {
        return trim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_256, 
                $sSecretKey, 
                base64_decode($sValue), 
                MCRYPT_MODE_ECB,
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_256,
                        MCRYPT_MODE_ECB
                    ), 
                    MCRYPT_RAND
                )
            )
        );
    }
    
	
}

?>
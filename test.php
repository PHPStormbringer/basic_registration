<?php
/*
 * 
 * opcode number: 107
 */
try {
    $error = 'Always throw this error';
    
	if ( 1 ==2) 
	{
		throw new Exception($error);
	}
    // Code following an exception is not executed.
    echo 'Never executed';

} 

catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// Continue execution
echo 'Hello World';
?>
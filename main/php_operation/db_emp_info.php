<?php

    function allEmp($conn) {
        $check = mysqli_query($conn, "SELECT username FROM user_password
                                      WHERE u_type='EMPLOYEE'");
        return $check;
    }

    function add_emp($conn, $emp_info) {
        
        // 0 check whether the name exist
		$check = mysqli_query($conn, "SELECT username FROM user_password
                                      WHERE username = '$emp_info[username]' limit 0,1"); // 0-1 record
		if (mysqli_fetch_array($check)) {
			return 'F1';
			exit(mysqli_error($conn));
		}

		// 1 insert the new employee infomation to the user_password table
		$sql_insert_location = "INSERT INTO user_password(username, password, u_type)
                                VALUES('$emp_info[username]','$emp_info[password]', 'EMPLOYEE')";
		$result = mysqli_query($conn, $sql_insert_location);
		if ($result) {
			// success 
		}
		else {
			return 'F2';
			exit(mysqli_error($conn));		
		}

		return 'T';
    }

    function update_emp($conn, $emp_info) {
        mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically
		
		// ----- Begin -----
		mysqli_begin_transaction($conn);
	
		// 0: update user_password table
		$sql_update_emp = "UPDATE user_password
						   SET password='$emp_info[password]'
                           WHERE username='$emp_info[username]'";
		$result = mysqli_query($conn, $sql_update_emp);
		if ($result) { // success 
		}
		else {
			mysqli_query($conn, "ROLLBACK");
			return 'F';
			exit(mysqli_error($conn));
		}
		
		mysqli_commit($conn); 
		// ----- End -----
	
		mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining
	
		return 'T';
    }


    function delete_emp($conn, $emp_name) {
 
        mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically
           
        // ----- Begin -----
        mysqli_begin_transaction($conn);
    
        // 1: delete in user_password table
        $sql_delete_user_pw = "DELETE 
                               FROM user_password 
                               WHERE username='$emp_name'";
        $result = mysqli_query($conn, $sql_delete_user_pw);
        if ($result) { // success   
        }
        else {
            mysqli_query($conn, "ROLLBACK");
            return 'F';
            exit(mysqli_error($conn));
        }
        
        mysqli_commit($conn); 
        // ----- End -----
    
        mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining
    
        return 'T';
    }

?>
<?php

error_reporting(0);
$firstName =   $_POST['firstName'];
$lastName =    $_POST['lastName'];
$email =       $_POST['email'];

$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];

if (isset($_POST['submit'])){






//تحقق الاسم الاول
if(empty($firstName)){
    $errors['firstNameError'] = 'يرجى أدخال الاسم الاول';
}

//تحقق الاسم الاخير
if(empty($lastName)){
    $errors['lastNameError'] = 'يرجى أدخال الاسم الاخير';
    }
    
    //تحقق الايميل
    if(empty($email)){
        $errors['emailError'] = 'يرجى أدخال الايميل';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['emailError'] = 'يرجى أدخال ايميل صحيح';

        } 

         //تحقق لايوجد اخطاء   
        if(!array_filter($errors)){
            error_reporting(0);
$firstName =   mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName =    mysqli_real_escape_string($conn, $_POST['lastName']);
$email =       mysqli_real_escape_string($conn, $_POST['email']);


$sql = "INSERT INTO users(firstName, lastName, email) 
 VALUES ('$firstName', '$lastName', '$email')";


if(mysqli_query($conn, $sql)){
    header('Location: ' . $_SERVER['PHP_SELF']);
    }else{
        echo'Error' . mysqli_error($conn);
      
        
    }

}


 }






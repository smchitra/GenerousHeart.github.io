<?php

    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Amount=$_POST['Amount'];
    $Phone=$_POST['phone'];
    $purpose='Donation';
    
    include 'instamojo/Instamojo.php';
    $api = new Instamojo\Instamojo('test_f89de128202df2c28fb94563780', 'test_8d65a08b1ba4bc1697fb149e6ed', 'https://test.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $purpose,
            "amount" => $Amount,
            "send_email" => true,
            "email" => $Email,
            "buyer_name" =>$Name,
            "phone"=>$Phone,
            "send_sms" => true,
            "allow_repeated_payments" =>false,
            "redirect_url" => "https://generoushearts.000webhostapp.com/redirect.html"
            )
        );
        $pay_url=$response['longurl'];
        header("location: $pay_url");
    	}
    	catch (Exception $e) {
    	    print('Error: ' . $e->getMessage());
    	}
?>

<?php

if(isset($_POST['token']) && $_POST['token'] != ""){

  require '../vendor/autoload.php';
  \Stripe\Stripe::setApiKey('sk_test_51JZah9Gk6raBaGt9FcV5nD7fKBQ08LzI3r4Y6f83MdbZnVLugS0imZxACI4L3EoM2QB3NuP4o5QefR0UHci0n0mf00IPFAN6tS');
  $data = Stripe\Charge::create([
  		"amount"=>20*100,
  		"currency"=>"usd",
  		"source"=>$_POST['token'],
  		"description"=>"E-shop Payment"
  ]);

  echo "<pre>";
  print_r($data);

}

<?php


    require_once('NaiveBayesClassifier.php');
    error_reporting(0);
    $classifier = new NaiveBayesClassifier();
    $spam = Category::$SPAM;
    $ham = Category::$HAM;

    $classifier -> train('Have a pleasurable stay! Get up to 30% off + Flat 20% Cashback on Oyo Room' . 
            ' bookings done via Paytm', $spam);
    $classifier -> train('Lets Talk Fashion! Get flat 40% Cashback on Backpacks, Watches, Perfumes,' .
            ' Sunglasses & more', $spam);

    $classifier -> train('Opportunity with Product firm for Fullstack | Backend | Frontend- Bangalore', $ham);
    $classifier -> train('Javascript Developer, Fullstack Developer in Bangalore- Urgent Requirement', $ham);

    echo "Gmail1 Category is :-";
    $category = $classifier -> classify('Scan Paytm QR Code to Pay & Win 100% Cashback');
    echo $category;
    echo "<br>";


    echo "Gmail2 Category is :-";
    $category = $classifier -> classify('you got a 40% discount on watches');
    echo $category;
     echo "<br>";
      
    echo "Gmail3 Category is :-";
    $str =file_get_contents('Gmail1.txt');
    $category = $classifier -> classify($str);
    echo $category;
?>
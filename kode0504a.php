<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("green","# # # # # # # # # # # # # # # # # # # # # # # \n");
echo color("blue","  [♥]  Time  : ".date('[d-m-Y] [H:i:s]')."   \n");
echo color("red","   [♡] Recode from Mr.Tobing & BananaCreamy2 \n");
echo color("purple","[♥] Format nomor 62xxxxxxxxxx \n");
echo color("nevy","  [♡] @TSN \n");
echo color("yellow","[♥] Succes rate : 0% \n");
echo color("blue"," [♡] Maklum namanya juga recode ngawur \n");
echo color("purple"," [♥] Kode0504 \n");
echo color("green","# # # # # # # # # # # # # # # # # # # # # # # \n");
	echo "\n";
{
	echo "\e[92m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
	echo "\e[92m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
	echo "\e[93mInput nama :	?: ";
	$input = trim(fgets(STDIN));
	echo "\e[92m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
		goto ulang;
}

{
// function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        echo color("yellow","📲▶️ Inpiut nomor fresh : ");
        // $no = trim(fgets(STDIN));
        $nohp = trim(fgets(STDIN));
        $nohp = str_replace("62","62",$nohp);
        $nohp = str_replace("(","",$nohp);
        $nohp = str_replace(")","",$nohp);
        $nohp = str_replace("-","",$nohp);
        $nohp = str_replace(" ","",$nohp);

        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            if (substr(trim($nohp),0,3)=='62') {
                $hp = trim($nohp);
            }
            else if (substr(trim($nohp),0,1)=='0') {
                $hp = '62'.substr(trim($nohp),1);
        }
         elseif(substr(trim($nohp), 0, 2)=='62'){
            $hp = '6'.substr(trim($nohp), 1);
        }
        else{
            $hp = '1'.substr(trim($nohp),0,13);
        }
    }
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$hp.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("yellow","📶▶️ Kode OTP sudah dikirim")."\n";
        otp:
        echo color("red","💬▶️ OTP : ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("yellow","✔️▶️ Berhasil mendaftar\n");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo color("nevy","+] Akses token : ".$token."\n\n");
        save("token.txt",$token);
        echo color("green","\n▬▬▬▬▬▬▬▬▬▬▬▬🔊Auto Klaim 🔊▬▬▬▬▬▬▬▬▬▬▬▬");
        echo "\n".color("yellow"," 🥂Klaim Kode A🥂.");
        echo "\n".color("red","⏳▶️ Sabar..");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(20);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD0607"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","Message: ".$message);
        goto gocar;
        }else{
        echo "\n".color("green"," Message: ".$message);
	gocar:
        echo "\n".color("yellow"," 🥂 Klaim Kode B🥂. ");
        echo "\n".color("red"," ⏳▶️Sabar..");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(15);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD0607"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("red"," Message: ".$message);
        gofood:
        echo "\n".color("yellow"," 🥂 Klaim Kode B🥂. ");
        echo "\n".color("red"," ⏳▶️Sabar..");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(15);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PAKEGOFOOD0607"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("red"," Message: ".$message);
        gofood:
        echo "\n".color("yellow"," 🥂 Klaim Kode C🥂.");
        echo "\n".color("red"," ⏳▶️Sabar..");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(7);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"G-N42CQ7B"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("red"," Message: ".$message);
        gofood:
        echo "\n".color("yellow"," 🥂 Klaim Kode C🥂.");
        echo "\n".color("red"," ⏳▶️Sabar..");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(7);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"G-QWMCW6P"}');
        $message = fetch_value($code1,'"message":"','"');
        echo "\n".color("green"," Message: ".$message);
        echo "\n".color("yellow"," 🥂 Klaim Kode🥂.");
        echo "\n".color("red"," ⏳▶️Sabar..");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(7);
        }
        sleep(1);
        $boba09 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PAKEGOFOOD0607"}');
        $messageboba09 = fetch_value($boba09,'"message":"','"');
        echo "\n".color("green"," Message: ".$messageboba09);
        sleep(1);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=13&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
        $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
        $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
        $voucher11 = getStr1('"title":"','",',$cekvoucher,"11");
        $voucher12 = getStr1('"title":"','",',$cekvoucher,"12");
        $voucher13 = getStr1('"title":"','",',$cekvoucher,"13");
        echo "\n".color("nevy"," Total voucher ".$total." : ");
        echo "\n".color("green","                     1. ".$voucher1);
        echo "\n".color("yellow","                     2. ".$voucher2);
        echo "\n".color("red","                     3. ".$voucher3);
        echo "\n".color("purple","                     4. ".$voucher4);
        echo "\n".color("blue","                     5. ".$voucher5);
        echo "\n".color("nevy","                     6. ".$voucher6);
        echo "\n".color("red","                     7. ".$voucher7);
        echo "\n".color("green","                     8. ".$voucher8);
        echo "\n".color("yellow","                     9. ".$voucher9);
        echo "\n".color("red","                     10. ".$voucher10);
	echo "\n".color("purple","                     11. ".$voucher11);
        echo "\n".color("blue","                     12. ".$voucher12);
        echo "\n".color("nevy","                     13. ".$voucher13);
        echo"\n";
         setpin:
         echo "\n".color("purple","🔧▶️ Mau set Pin GOPAY ? !!!: Y/N ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("nevy","▬▬▬▬▬▬▬▬▬▬▬▬▬▬🔧 Pin GOPAY = 050400 🔧▬▬▬▬▬▬▬▬▬▬▬▬")."\n";
         $data2 = '{"pin":"050400"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "OTP Pin 6 digit : ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] Maaf gagal\n");
         }
         }
         die();
         }else{
         echo color("red","-] OTP salah ");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo color("purple","!] Masukkan ulang nomor lain\n");
         goto ulang;
         die();
         }else{
         echo color("red","-] Nomor sudah terdaftar");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo color("purple","!] Coba nomor fresh lainnya \n");
         goto ulang;
         }
//  }

// echo change()."\n";

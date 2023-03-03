<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	if (!isset($_POST['form-submit'])) {
		git("Önce formu doldurunuz!", "index.html");
		//hata mesajı ver giriş sayfasına git
	}

	try {
	  $vt = new PDO("mysql:dbname=epiz_31543998_depremoloji; host=sql106.epizy.com; charset=utf8","epiz_31543998", "pzR5ahbriIQ");
	  $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	  echo $e->getMessage();
	}

	// Sorgular ve diğer işlemler burada...
	$sql = "INSERT INTO mesaj(adsoyad, mail, mesaj) VALUES(:adsoyad, :mail, :mesaj)";
	$ifade = $vt->prepare($sql);
	$ifade->execute(Array(":adsoyad"=>$_POST['name'], ":mail"=>$_POST['email'], ":mesaj"=>$_POST['message']));

	git("Mesajınız Gönderildi!", "index.html");
	

	//Bağlantıyı yok edelim...
	$vt = null;

	function git($mesaj, $adres){
		echo ("<script LANGUAGE='JavaScript'>
			    window.alert('$mesaj');
			    window.location.href='$adres';
			    </script>");
		exit;
	}  
?>
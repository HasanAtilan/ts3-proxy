
<!-- 
* Kodlama Tasarım
* Hasan Atılan Aittir
* ts3.web.tr
* Bu Arada Benim Yaptıgım Sistemlerle Gelip Bana Ben Yaptım Demeyin :)
* hasanatilan.com
!--->

<!DOCTYPE html>
<html lang="en">
<head>
<title>TS3 REVERSE PROXY</title>



 
<form action="" method="POST">

<?PHP
error_reporting(0);
$guvenlik = $_POST['g-recaptcha-response'];
$vericek=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=google secret keyiniz&response=".$guvenlik."&remoteip=".$_SERVER['REMOTE_ADDR']);
$gonder = json_decode($vericek);
if($gonder->success == true) {
$kafanagore = rand(1,3000);	
$ip = $_POST["ip"];
$port = $_POST["port"];	
$sunucuip = 'sunucu ip adresin';	
$baglanti = ssh2_connect('ip adresi', 22);
ssh2_auth_password($baglanti, 'root', 'sifreniz');
$stream = ssh2_exec($baglanti, 'iptables -t nat -A PREROUTING -p udp --dport '.$kafanagore.' -j DNAT --to-destination '.$ip.':'.$port.'');
echo '<div class="alert alert-success">Başarıyla Oluşturuldu '.$sunucuip.':'.$kafanagore.'</div>';	
}else{
echo'<div class="alert alert-danger">Lütfen Robot Olmadığınızı Doğrulayın.</div>';
}
 ?> 
          <div class="form-group">
            <label>İP</label>
            <input type="text" name="ip" id="ip" class="form-control" placeholder="İP Adresi" autocapitalize="off">
          </div>  	
		  
          <div class="form-group">
            <label>PORT</label>
            <input type="text" name="port" id="port" class="form-control" placeholder="Port" autocapitalize="off">
          </div>

		   <div class="form-group">
          <label>Lokasyon</label> 
                <select name="lokasyon" class="form-control" id="lokasyon">
                                   <option value="Türkiye">Türkiye</option>
                                  
                                </select>
           </div>

		  
<center><div class="g-recaptcha" data-sitekey="google site keyiniz"></div>
		 
          <BR><div class="form-group">
            <button type="submit" class="btn btn-success btn-block">
              Proxy Oluştur
            </button>
          </div>		  
  
  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- 
* Kodlama Tasarım
* Hasan Atılan Aittir
* ts3.web.tr
* Bu Arada Benim Yaptıgım Sistemlerle Gelip Bana Ben Yaptım Demeyin :)
* hasanatilan.com
!--->

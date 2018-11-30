<?php



namespace App;

class Starpass 
{
	

	public function check($id,$code)
	{
		$db = new Db();

		$res = $db->getRow('select * from telephone where id=?',[$id]);

		$idp = $res['idp'];
		$idd = $res['idd'];

		

		$ident=$idp.";;".$idd;

		$codes = $code;
		$datas = '';

		$ident=urlencode($ident);
		$codes=urlencode($codes);
		$datas=urlencode($datas);

		$file = file_get_contents("https://script.starpass.fr/check_php.php?ident=$ident&codes=$codes&DATAS=$datas");
		
		$results = explode('|', $file);


		if($results[0]=='OUI'){
			$solde = $res['prix'] + $_SESSION['user']['solde'];
			$db->updateRow('update user set solde = ? where id=?',[$solde,$_SESSION['user']['id']]);

			$user = $db->getRow('select * from user where id = ?',[$_SESSION['user']['id']]);
					unset($_SESSION['user']);
					$_SESSION['user'] = $user;
			return true;
		}
		
		return false;
		







	}
}
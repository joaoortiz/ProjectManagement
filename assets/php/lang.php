<?php

session_start();

$_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$lang = $_SESSION['lang'];


function translatePg(){

$varArray = [
   "pt" => ["title" => "Sistema de Gerenciamento de Projetos",
            "text_login" => "Preencha os campos abaixo para acessar o sistema.",
            "pholder_email" => "Informe o e-mail",
            "pholder_pass" => "Informe a senha",
            "btn_register" => "Cadastrar",
            "btn_login" => "Acessar Sistema"],



   "en" => ["title" => "Project Management System",
            "text_login" => "Please, fill the informations bellow to access the system.",
            "pholder_email" => "E-mail",
            "pholder_pass" => "Password",
	    "btn_register" => "Register",
            "btn_login" => "Log in"]
];

   
	return $varArray;

}
	
?>		

<hr>
<?php

/*$ip=$_SERVER['REMOTE_ADDR'];

$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$ip");
echo $xml->geoplugin_countryName . " - " . $ip;
*/
?>	
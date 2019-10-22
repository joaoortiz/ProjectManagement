<?php
session_start();

$_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
$lang = $_SESSION['lang'];

function translatePg(){
$varArray = [
   "pt" => ["title" => "Sistema de Gerenciamento de Projetos",
            "text_login" => "Preencha os campos abaixo para acessar o sistema.",
            "text_cadproj" => "Informe os dados do Projeto.",
            "text_search" => "Pesquisar Projetos",
            "text_coord" => "Coordenador do Projeto",
            "text_progress" => "Concluído",
            "pholder_email" => "Informe o e-mail",
            "pholder_projname" => "Insira o nome do projeto",
            "pholder_projdesc" => "Descrição do projeto",
            "pholder_projcat" => "Selecione a categoria",
            "pholder_pass" => "Informe a senha",
            "pholder_projstart" => "Data de Início",
            "pholder_projend" => "Data de Fim",
            "btn_register" => "Cadastrar",
            "btn_login" => "Acessar Sistema",
            "btn_options" => "Opções",
            "btn_search" => "Buscar",
            "btn_project" => "Criar Novo Projeto",
            "menu_item1" => "Meus Projetos",
            "menu_item2" => "Minhas Tarefas",
            "menu_item3" => "Sair",
            "card_user" => "Dados do Usuário",
            "card_projects" => "Projetos",
            "card_tasks" => "Tarefas",
            "card_contacts" => "Contatos",
            "card_files" => "Arquivos",
            "tblProj_col1" => "Nome do Projeto",
            "tblProj_col2" => "Data de Início",
            "tblProj_col3" => "Data de Fim",
            "tblProj_col4" => "Categoria",
            "tblProj_col5" => "Tarefas",
            "days_remain" => "dias restantes",
            "card_team" => "Integrantes",
            "card_email" => "Enviar e-mail ao responsável",
            "text_nomembers" => "Não há integrantes",
            "text_taskfinished" => "Finalizada",
            "text_tasknofinished" => "Incompleta",
            "tblTask_col1" => "Nome da Tarefa",
            "tblTask_col2" => "Data Registrada",
            "tblTask_col3" => "Responsável",
            "tblTask_col4" => "Status",
            "btn_email" => "Enviar E-mail",
            "btn_finish" => "Finalizar",
            "btn_reopen" => "Reabrir",
            "btn_send" => "Enviar"
           ],
    
   "en" => ["title" => "Project Management System",
            "text_login" => "Please, fill the informations bellow to access the system.",
            "text_cadproj" => "Fill the fields bellow with the project informations.",
            "pholder_email" => "E-mail",
            "pholder_projname" => "Project Name",
            "pholder_projdesc" => "Description",
            "pholder_projcat" => "Choose a category",
            "pholder_pass" => "Password",
            "pholder_projstart" => "Start date",
            "pholder_projend" => "End date",
	    "btn_register" => "Register",
            "btn_login" => "Log in",
            "menu_item1" => "My Projects",
            "menu_item2" => "My Tasks",
            "menu_item3" => "LogOut",
            "btn_search" => "Search",
            "btn_project" => "Create New Project",
            "card_user" => "User Data",
            "card_files" => "Files",
            "card_projects" => "Projects",
            "card_tasks" => "Tasks",
            "card_email" => "Send an e-mail to responsible",
            "card_contacts" => "Contacts",
            "btn_options" => "Options",
            "text_search" => "Search for Projects",
            "tblProj_col1" => "Project Name",
            "tblProj_col2" => "Start",
            "tblProj_col3" => "End",
            "tblProj_col4" => "Category",
            "tblProj_col5" => "Tasks",
            "text_coord" => "Manager",
            "text_progress" => "Progress",
            "days_remain" => "days remaining",
            "card_team" => "Team Members",
            "text_nomembers" => "No members",
            "text_taskfinished" => "Completed",
            "text_tasknofinished" => "Pendent",
            "tblTask_col1" => "Task Name",
            "tblTask_col2" => "Date",
            "tblTask_col3" => "Responsible",
            "tblTask_col4" => "Status",
            "btn_email" => "Send E-mail",
            "btn_finish" => "Finish",
            "btn_reopen" => "Reopen",
            "btn_send" => "Send"
           ]    
];
   
	return $varArray;
}
	
?>		


<?php
/*$ip=$_SERVER['REMOTE_ADDR'];
$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$ip");
echo $xml->geoplugin_countryName . " - " . $ip;
*/
?>	
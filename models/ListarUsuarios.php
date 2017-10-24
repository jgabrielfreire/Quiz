<?php
class ListarUsuarios{
	public function listar(){
		Db::connect('localhost', 'root', '', 'quizpedag');
		$result = Db::queryAll("SELECT log_id, log_nome, log_usuario, log_senha, log_dat_cad, log_nivel 
			FROM login WHERE log_id<>1 ORDER BY log_nome");

		for ($i=0; $i < sizeof($result); $i++) { 
			$nivel = $result[$i]['log_nivel'];
			
			if($nivel==0){
				$cat = "<i class= 'secondary-content material-icons' style='color: #000; float: right;'>person</i>";
			}else{
				$cat = "<i class= 'secondary-content material-icons' style='color: #000; float: right;'>school</i>";
			}

			echo "<li>
			<div class='collapsible-header' style='background-color: #f5f5f5;'>
			<n class='col s4 m4' style='color: #000'>".$result[$i]['log_nome'].$cat."</n>
			<a href='deletarusuario?id=".$result[$i]['log_id']."' title='Clique aqui para deletar'>
			<i class= 'secondary-content material-icons' 
			style='color: red'>delete_forever</i>
			</a>
			</div>
			<div class='collapsible-body col s4 m4' style='background-color: #fcfcfc; color: #000'>
			<p><b>Nick : </b>".$result[$i]['log_usuario']."<br>
			<b>Senha : </b>".$result[$i]['log_senha']."<br>
			<b>Data de Cadastro : </b>".date('d/m/Y', strtotime($result[$i]['log_dat_cad']))."</p>
			</div>
			</li>";
		}
	}
}
?>
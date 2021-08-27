<?php

class Funcoes_gerais {

	private $conn;

	/* constructor */
	public function __construct($db) { 
		$this->conn = $db;
	}

    // os nomes dos campos dos arrays tem que ser os mesmos dos campos da tabela sem passar pela remoção de sql injection
    public function gravarArrayNoBanco($nomeTabela, $fields, array $dados) {
		
        $values = "'".implode("', '", $dados)."'";
     	$query = "INSERT INTO {$nomeTabela} ( {$fields} ) VALUES ( {$values} ) ";
		
		return $this->conn->query($query);
    }

	// ler registros e retorna os dados daquele que for encontrado
    public function lerRegistros($nomeTabela, $parametros = null, $fields = '*') {
		
        $query = "SELECT {$fields} FROM {$nomeTabela} {$parametros}";
        $result = $this->conn->query($query);
		$data = array();

        if($result->rowCount() == 0) {
			return false;
		}
		else {
			foreach($result as $res) {
				array_merge($data, $res);
				$data = &$res;
			}
		}
		return $data;
	}

	// alterar registro
	public function alterarRegistro($nomeTabela, array $fields, array $dados, $where = null) {

		$values = "'".implode("', '", $dados)."'";
		$where = ($where) ? " WHERE {$where}" : null;
		$query = "UPDATE {$nomeTabela} SET {$fields[0]} = '{$dados[0]}', {$fields[1]} = '{$dados[1]}', 
                                           {$fields[2]} = '{$dados[2]}', {$fields[3]} = '{$dados[3]}' {$where}";
		return $this->conn->query($query);
	}

	// deletar registros. não vai deletar, apenas marcar que não pode ser exibido / procurado
	public function deletarRegistro($nomeTabela, $where = null) {
		
		$where = ($where) ? " WHERE {$where}" : null;
		$query = "UPDATE {$nomeTabela} SET excluido = 1 {$where}";
		return $this->conn->query($query);
	}
	
	/* retorna o último id */
	public function ultimo_id($tabela, $parametros) {
		
		$sql = "SELECT MAX(id) FROM {$tabela} encomenda WHERE {$parametros}";
		$result = $this->conn->query($sql);

		if ($result->rowCount() > 0) {
			foreach($result as $id) {
				return $id;
				
			}
		}
		else { return -1; }
	}

	/* retorna lista de itens */
	public function lista_obj($tabela, $params = null, $fields) {
		
		$lista = array();
		
		$sql = "SELECT {$fields} FROM {$tabela} {$params}";
		$result = $this->conn->query($sql);

		if ($result->rowCount() > 0) {
			foreach ($result as $data) {
				array_push($lista, $data);
			}
		}
		return $lista;
	}
}


//desse modo está copiando cada elemente de cada array,
//temos que apenas copiar os arrays, e não o que estã dentro dele (outra vez)
//array_merge($lista_recebedores, $data);
//$lista_recebedores = &$data;




/* abre a conexao com o banco de dados
 * function conectar(){
 *     $conexao = mysqli_connect(DB_HOST, BD_USUARIO, DB_SENHA, DB_DATABASE) or die(mysqli_connect_error());
 *     mysqli_set_charset($conexao, DB_CHARSET) or die(mysqli_error($conexao));
 *     return $conexao;
 * } 

   //$fields = implode(",", array_keys($dados)); //não funciona porque retorna 0,1,2... e não os nomes


   //fecha a conexao
   public function fechaConexao($conexao){
   mysqli_close($conexao) or die(mysqli_error($conexao));
   }
   
   //limpa de sql injection pra strings
   public function limpaSql($dados){
   $link = conectar();
   if(!is_array($dados)){
   $dados = mysqli_real_escape_string($link, $dados);
   }else{
   $array = $dados;
   foreach($array as $key => $value){
   $key = mysqli_real_escape_string($link, $key);
   $value = mysqli_real_escape_string($link, $value);
   $dados[$key] = $value;
   }
   }
   fechaConexao($link);
   }


   //executa query (retorna true se a query for executada) e se colocar true retorna i id gerado
   public function executarQuery($query, $insertId = false) {
   
   //$conexao = conectar();
   $result = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

   if($insertId) {
   $result = mysqli_insert_id($conexao);
   }
   
   //fechaConexao($conexao);
   return $result;
   }



   //alterar registro
   public function alterarRegistro($nomeTabela, array $dados, $where = null){
   foreach($dados as $key => $value){
   $fields[] = "{$key} = '{$value}' ";
   }
   $fields = implode(", ", $fields);
   $where = ($where) ? " WHERE {$where}" : null;

   $query = "UPDATE {$nomeTabela} SET {$fields} {$where}";
   return executarQuery($query);
   }


   //DELETa registro
   /* $where = ($where) ? " WHERE {$where}" : null;
   $query = "DELETE FROM {$nomeTabela} {$where} ";
   echo $query;
 */
?>

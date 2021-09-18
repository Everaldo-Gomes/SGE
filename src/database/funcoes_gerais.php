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

	// ler registros e retorna os dados daquele que for encontrado (registros de uma ÚNICA tabela)
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


    // não sei onde estava sendo usado o metodo de cima, então fiz um um pouco diferente ao inves de mudar aquele
    //não encontrei um jeito de colocar tddentro de um array com o nome do valor, só com o numero.
    //dentro do "for ($i=0; $i < sizeof($res); $i++)" ali tem o array com os nomes e com os numeros, mas n consegui manipular com os nomes :/
    public function lerRegistrosMoradoresAtivosInativos($nomeTabela, bool $excluido, $parametros = null, $fields = '*') {
        
        $parametros = $this->ajustaParametrosAndExcluido($parametros, $excluido);
        $query = "SELECT {$fields} FROM {$nomeTabela} {$parametros}";
        $result = $this->conn->query($query);
        $data = array();
        
        if(!$result) {
            return false;
        }
        else {
            foreach($result as $res) {
                $elementosDaBusca = array();
                for ($i=0; $i < sizeof($res); $i++) {
                    if($i % 2 == 0){
                        array_push($elementosDaBusca, $res[$i / 2]);
                    }
                }
                array_push($data, $elementosDaBusca);
            }
        }
        // echo("<pre>");
        // var_dump($query);
        // echo("</pre>");
        return $data;
    }

    private function ajustaParametrosAndExcluido($parametros, bool $excluido){
        if ($parametros !== null){
            if($excluido){
                $parametros = "WHERE ".$parametros." AND excluido = 1";
            }else{
                $parametros = "WHERE ".$parametros." AND excluido = 0";
            }
        }else {
            if($excluido){
                $parametros = "WHERE excluido = 1";
            }else{
                $parametros = "WHERE excluido = 0";
            }
        }
        return($parametros);
    }

	// alterar registro Aplicada aos moradores
	public function alterarRegistro($nomeTabela, array $fields, array $dados, $where = null) {

		$values = "'".implode("', '", $dados)."'";
		$where = ($where) ? " WHERE {$where}" : null;
		$query = "UPDATE {$nomeTabela} SET {$fields[0]} = '{$dados[0]}', {$fields[1]} = '{$dados[1]}', 
                                           {$fields[2]} = '{$dados[2]}', {$fields[3]} = '{$dados[3]}',
                                           {$fields[4]} = {$dados[4]}, {$fields[5]} = {$dados[5]}, 
                                           {$fields[6]} = '{$dados[6]}' {$where}";
        echo "</br>" . $query ."</br>";

		return $this->conn->query($query);
	}

	public function alteraRegistroGeral($query) {

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

	/* atualiza encomendas */
	public function edita_encomenda($tabela, array $fields, array $dados, $param = null) {

		$param = ($param) ? " WHERE {$param}" : null;
		$sql = "UPDATE {$tabela} SET {$fields[0]} = '{$dados[0]}', {$fields[1]} = '{$dados[1]}' {$param}";
		return $this->conn->query($sql);
	}


    public function alterarRegistroComArrayAssociativo($nomeTabela, array $dados, $where = null) {

        $stringBuilder = "";
        
        foreach($dados as $chave => $valor){
            $stringBuilder .= "{$chave} = {$valor}, ";
        }
        
        $where = ($where) ? " WHERE {$where}" : null;
        
        $query = "UPDATE {$nomeTabela} SET ".substr($stringBuilder, 0, -2).$where;
        return $this->conn->query($query);
		
	}


    public function formataInputStringBanco($inputString) {
        return "'".$inputString."'";
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

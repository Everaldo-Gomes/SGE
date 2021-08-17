<?php

class Funcoes_gerais {

	private $conn;

	/* constructor */
	public function __construct($db) { 
		$this->conn = $db;
	}

    // os nomes dos campos dos arrays tem que ser os mesmos dos campos da tabela sem passar pela remoção de sql injection
    public function gravarArrayNoBanco($nomeTabela, $fields, array $dados) {

        //$fields = implode(",", array_keys($dados)); //não funciona porque retorna 0,1,2... e não os nomes
        $values = "'".implode("', '", $dados)."'";
     	$query = "INSERT INTO {$nomeTabela} ( {$fields} ) VALUES ( {$values} ) ";

		return $this->conn->query($query);
    }
	
    //ler registros
    public function lerRegistros($nomeTabela, $parametros = null, $fields = '*'){
        $query = "SELECT {$fields} FROM {$nomeTabela} {$parametros}";
        $result = $this->conn->query($query);

        return $result;
    }

    //executa query (retorna true se a query for executada) e se colocar true retorna i id gerado
    public function executarQuery($query, $insertId = false) {
        
        //$conexao = conectar();
        $result = $this->conn->query($query);
        return $result;
    }

	/* ==================================================== */
	/* daqui pra baixo ainda não foram usadas e verificadas */
	/* ==================================================== */

	//fecha a conexao
    // public function fechaConexao($conexao){
    //     mysqli_close($conexao) or die(mysqli_error($conexao));
    // }
	


    //até onde eu pesquisei mais a fundo, tem uma função no proprio mysqli que limpa a query
    //fica =/- assim:
    //$stringParametro1 = "x...";
    //$stringParametro2 = "xx...";
    //$queryPreparada = $conn->prepare("INSERT INTO xxx(xxx, xxx) VALUES (?, ?)");
    //$queryPreparada = $conn->bind_param(ss, stringParametro1, stringParametro2)
    //queryPreparada->execute();
    //mas não testei
    //
    //limpa de sql injection pra strings
    // public function limpaSql($dados){
    //     $link = conectar();
    //     if(!is_array($dados)){
    //         $dados = mysqli_real_escape_string($link, $dados);
    //     }else{
    //         $array = $dados;
    //         foreach($array as $key => $value){
    //             $key = mysqli_real_escape_string($link, $key);
    //             $value = mysqli_real_escape_string($link, $value);
    //             $dados[$key] = $value;
    //         }
    //     }
    //     fechaConexao($link);
    // }





    //alterar registro
    // public function alterarRegistro($nomeTabela, array $dados, $where = null){
    //     foreach($dados as $key => $value){
    //         $fields[] = "{$key} = '{$value}' ";
    //     }
    //     $fields = implode(", ", $fields);
    //     $where = ($where) ? " WHERE {$where}" : null;

    //     $query = "UPDATE {$nomeTabela} SET {$fields} {$where}";
    //     return executarQuery($query);
    // }

}

/* abre a conexao com o banco de dados
 * function conectar(){
 *     $conexao = mysqli_connect(DB_HOST, BD_USUARIO, DB_SENHA, DB_DATABASE) or die(mysqli_connect_error());
 *     mysqli_set_charset($conexao, DB_CHARSET) or die(mysqli_error($conexao));
 *     return $conexao;
 * } */
?>

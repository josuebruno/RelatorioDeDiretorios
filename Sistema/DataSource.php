<?php
/** 
 * Copyright (C) 2022 
 *
 * Distribuído sob licença MIT com exceção de que,
 * você não precisa incluir a licença MIT completa em seu código.
 * Em essência, você pode usá-lo em software comercial, modificar e distribuir gratuitamente.
 * Embora não seja obrigatório, você deve atribuir este URL em seu código ou site.
 */
namespace Phppot;

/**
 * Classe de fonte de dados genérica para lidar com operações de banco de dados.
 * Usa MySqli e PreparedStatements.
 *
 * @versão 2.5 - função recordCount adicionada
 */
class DataSource
{

    // Modificadores de visibilidade do PHP 7.1.0 são permitidos para constantes de classe.
    // ao usar acima de 7.1.0, declare as constantes abaixo como privadas
    const HOST = 'Nomedoservidor.com.br';

    const USERNAME = 'roots';

    const PASSWORD = 'senha';

    const DATABASENAME = 'import_csv';

    private $conn;

    /**
          
          

     */
    function __construct()
    {
        $this->conn = $this->getConnection();
    }

    /**
     * Se o objeto de conexão for necessário, use este método e obtenha acesso a ele.
     * Caso contrário, use os métodos abaixo para inserir/atualizar/etc.
     *
     * @return \mysqli
     */
    public function getConnection()
    {
        $conn = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASENAME);

        if (mysqli_connect_errno()) {
            trigger_error("Problem with connecting to database.");
        }

        $conn->set_charset("utf8");
        return $conn;
    }

    /**
     * Para obter resultados do banco de dados

     *
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return array
     */
    public function select($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);

        if (! empty($paramType) && ! empty($paramArray)) {

            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }

        if (! empty($resultset)) {
            return $resultset;
        }
    }

    /**
     * inserir
     *
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return int
     */
    public function insert($query, $paramType, $paramArray)
    {
        $stmt = $this->conn->prepare($query);
        $this->bindQueryParams($stmt, $paramType, $paramArray);

        $stmt->execute();
        $insertId = $stmt->insert_id;
        return $insertId;
    }

    /**
     * Para executar a consulta
     *
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     */
    public function execute($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);

        if (! empty($paramType) && ! empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
    }

    /**
    1.
     * Prepara a ligação de parâmetros
     * 2. Vincule os parâmetros à instrução sql
     *
     * @param string $stmt
     * @param string $paramType
     * @param array $paramArray
     */
    public function bindQueryParams($stmt, $paramType, $paramArray = array())
    {
        $paramValueReference[] = & $paramType;
        for ($i = 0; $i < count($paramArray); $i ++) {
            $paramValueReference[] = & $paramArray[$i];
        }
        call_user_func_array(array(
            $stmt,
            'bind_param'
        ), $paramValueReference);
    }

    /**
     * Para obter resultados do banco de dados
     *
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return array
     */
    public function getRecordCount($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);
        if (! empty($paramType) && ! empty($paramArray)) {

            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
        $stmt->store_result();
        $recordCount = $stmt->num_rows;

        return $recordCount;
    }
}
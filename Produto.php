<?php
//Projeto max estoque
//Autor: Miguel Soares de Souza, estudante de Análise e Desenvolvimento de Sistemas pela Unisociesc.
//Descrição do projeto: Basicamente fiz um sistema para aprender CRUD, utilizando PHP, possui os métodos cadastrar, listar, deletar, editar e buscar. A orientação a objetos gira em torno dos produtos do estoque, e seus dados interagindo entre o código e o MySQL.

/*  
Classe Produto
Gerencia todas as operações de CRUD e persistência no banco de dados 'distribuidora'.
 */
class Produto{
    //atributos
    private $nomeProduto;
    private $descricaoProduto;
    private $precoProduto;
    private $quantidade;
    private $pdo;

    //construtor
    public function __construct($nomeProduto = null, $descricaoProduto = null, $precoProduto = null, $quantidade = null){
        $this->nomeProduto = $nomeProduto;
        $this->descricaoProduto = $descricaoProduto;
        $this->precoProduto = $precoProduto;
        $this->quantidade = $quantidade;
        $this->conectar();
    }

    //Método para conectar, basicamente nesse método eu criei o pdo para conectar ao banco em todos os outros métodos...
    private function conectar() {
        try{
            $this->pdo = new PDO("mysql:host=localhost;dbname=distribuidora", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    /*
     * Insere um novo produto no banco de dados.
     * @param string $nome Nome do produto
     * @param string $desc Descrição detalhada
     * @param float $preco Preço de venda
     * @param int $qtd Quantidade inicial em estoque
     * @return bool Retorna true se o cadastro foi bem-sucedido.
     */
    public function cadastrar($nomeProduto, $descricaoProduto, $precoProduto, $quantidade) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Produto (nomeProduto, descricaoProduto, precoProduto, quantidade) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$nomeProduto, $descricaoProduto, $precoProduto, $quantidade]);
        } catch (Exception $e) {
            die("Erro no Banco de Dados: " . $e->getMessage());
            return false;
        }
    }

    /*
     * Retorna a lista completa de produtos.
     * @return array Lista de produtos em formato associativo.
     */
    public function listar(){
        try{
            $stmt = $this->pdo->query("SELECT * FROM produto");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e) {
            echo "Erro ao listar: " . $e->getMessage();
            return [];
        }
    }

    /*
     * Remove um registro permanentemente do sistema.
     * @param int $id Identificador único do produto.
     */
    public function deletar($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM produto WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (Exception $e) {
            echo "Erro ao deletar: " . $e->getMessage();
            return false;
        }
    }

    /*
     * Atualiza os dados mercadológicos (Nome e Preço).
     * Justificativa: A quantidade é preservada para garantir a integridade do estoque físico.
     */
    public function editar($nomeProduto, $precoProduto, $id) {
        try {
            $stmt = $this->pdo->prepare("UPDATE produto SET nomeProduto = ?, precoProduto = ? WHERE id = ?");
            return $stmt->execute([$nomeProduto, $precoProduto, $id]);
        } catch (Exception $e){
            echo "Erro ao editar: " . $e->getMessage();
            return false;
        }
    }

    /*
     * Localiza um produto específico pelo nome.
     * @param string $nome Parte do nome ou nome completo.
     * @return array|false Retorna os dados do produto ou false se não encontrado.
     */
    public function buscar($nome){
    try{
            $stmt = $this->pdo->prepare("SELECT * FROM Produto WHERE nomeProduto LIKE ?");
            $stmt->execute(["%$nome%"]); // O % serve para achar o produto mesmo sem digitar o nome completo...
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "erro ao buscar: " . $e->getMessage();
            return false;
        }
    }
}
?>

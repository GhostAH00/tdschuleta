<?php 
include_once "db.php";

// PDO com PHP (Classes PHP)
class Usuario{
    // atributos
    private $id;
    private $login;
    private $senha;
    private $nivel;
    private $pdo;

    public function __construct(){
        $this-> pdo = getConnection(); // Realiza a conexão durante a criação da instância (objeto)
    }
    
    // Getters e Setters - Propriedades (C#) ou métodos de acesso das linguagens de prog.
    public function getId(){
        return $this->id; // não vamos criar setId??? porque o banco é quem atribui (autoincrements)
    }

    public function getLogin(){
        return $this->login;
    }    
    public function setLogin(string $login){
        $this->login = $login;
    }

     public function getsenha(){
       return $this->senha;
    }
    public function setsenha($senha){
        $this->senha = $senha;
    }

    public function getnivel(){ 
        return $this->nivel;
    }
    public function setnivel(string $nivel){ 
        $this->nivel = $nivel;
    }

    // inserindo um usuario
    public function inserir(){
        $sql = "insert into usuarios (login, senha, nivel) values (:login, :senha, default)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":login", $this->login); // (C#) cmd.Paramentrs.AddWithValue("splogin", login);
        $cmd ->bindValue(":senha", $this->senha);
        $cmd ->bindValue(":nivel", $this->nivel);
        $cmd->execute();
        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    //Atualizar usuario
    public function atualizar(int $idUpdate){
        $id = $idUpdate;
        if(!$this->id) return false;

        $sql = "UPDATE usuarios SET login = :login, nivel = :nivel WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":login", $this->login);
        $cmd->bindValue(":nivel", $this->nivel);
        $cmd->bindValue(":id", $this-> id, PDO::PARAM_INT);

        return $cmd->execute();
    }

    // Atualizar a senha
    public function alterarSenha(int $idUpdate, string $novaSenha){
        $id = $idUpdate;
        if(!$this->id) return false;

        $sql = "UPDATE usuarios SET senha = md5(senha) WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":senha", $novaSenha);
        $cmd->bindValue(":id", $this-> id, PDO::PARAM_INT);

        return $cmd->execute();
    }
    // Remover usuario
    public function exluir(){
        if(!$this->id) return false;

        $sql = "DELETE FROM usuarios WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

    // listando usuarios
    public function listrar(): array{
        $cmd = $this -> pdo -> query("select * from usuarios order by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    // buscar usuarios por id
    public function buscarPorId(int $id){
        $sql = "select * from usuarios where id = :id";
        $cmd = $this-> pdo->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        if($cmd->rowCount() > 0){
            $dados = $cmd ->fetch(PDO::FETCH_ASSOC);
            $this-> id = $dados['id'];
            $this->login = $dados['login'];
            $this->senha = $dados['senha'];
            $this->nivel = $dados['nivel'];
            return true;
        }
        return false;
    }

    //efetuar login
    public function efetuarLogin(string $loginInformado, string $senhaInformada):bool{
        $sql = "select * from usuarios where login = :login and senha = md5(senha)";
        $cmd = $this-> pdo->prepare($sql);
        $cmd->bindValue(":login", $loginInformado);
        $cmd->bindValue(":senha", $senhaInformada);
        $cmd->execute();
        if($cmd->rowCount() > 0){
            $dados = $cmd ->fetch(PDO::FETCH_ASSOC);
            $this-> id = $dados['id'];
            $this->login = $dados['login'];
            $this->senha = $dados['senha'];
            $this->nivel = $dados['nivel'];
            return true;
        }
        return false;
    }

    }

        
    
    

?>

<?php

class Donor
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function remover(string $id): void
    {
        $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }

    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    public function fazerLogin(string $email, string $senha): bool
    {
        $selecionaDonor = $this->mysql->prepare("SELECT * FROM donors WHERE email = ? AND senha = ?");
        $selecionaDonor->bind_param('ss', $email, $senha);
        $selecionaDonor->execute();
        $donor = $selecionaDonor->get_result()->fetch_assoc();
        if (($email != null && $senha != null) && ($donor["email"] == $email && $donor["senha"] == $senha)) {
            session_start();
            $_SESSION["nome"] = $donor["nome"];
            $_SESSION["sobrenome"] = $donor["sobrenome"];
            $_SESSION["genero"] = $donor["genero"];
            $_SESSION["email"] = $donor["email"];
            $_SESSION["telefone"] = $donor["telefone"];
            $_SESSION["senha"] = $donor["senha"];
            $_SESSION["carteira"] = $donor["carteira"];
            $_SESSION["imagem"] = $donor["imagem"];
            header("Location:/donationsForEducation/profile/index.php");
            return true;
        } else {
            header("Location:/donationsForEducation/profile/signin.php");
            return false;
        }
    }

    public function cadastrar(string $nome, string $sobrenome, string $genero, string $telefone, string $email, string $senha, string $carteira): void
    {
        $insereDonor = $this->mysql->prepare('INSERT INTO donors (nome, sobrenome, genero, telefone, email, senha, carteira) VALUES(?, ?, ?, ?, ?, ?, ?);');
        $insereDonor->bind_param('sssssss', $nome, $sobrenome, $genero, $telefone, $email, $senha, $carteira);
        $insereDonor->execute();
        $this->fazerLogin($email, $senha);
    }

    public function sair(): bool
    {
        session_destroy();
        header("Location:/donationsForEducation/");
        return true;
    }

    public function menu(bool $logado): string
    {
        if ($logado == true) {
            $value = '>Sair';
        } else {
            $value = '>Entrar';
        }
        return $value;
    }

    public function alterarSenha(string $senha, string $senha1, string $senhaAtual): string
    {
        if ($senha == $senha1 && $senha != null) {
            if ($senhaAtual == $_SESSION["senha"]) {
                $editaSenha = $this->mysql->prepare('UPDATE donors SET senha = ? WHERE email = ?');
                $editaSenha->bind_param('ss', $senha, $_SESSION["email"]);
                $editaSenha->execute();
                $_SESSION["senha"] = $senha;
                header("location:edit.php");
                die();
            }
            return "2";
        } else {
            return "1";
        }
    }

    public function editar(string $nome, string $sobrenome, string $genero, string $telefone, string $email, string $carteira, string $senha): string
    {
        if ($senha == $_SESSION["senha"]) {
            $editaSenha = $this->mysql->prepare('UPDATE donors SET nome = ?, sobrenome = ?, genero = ?, telefone = ?, email = ?, carteira = ?, senha = ? WHERE email = ?');
            $editaSenha->bind_param('ssssssss', $nome, $sobrenome, $genero, $telefone, $email, $carteira, $senha, $email);
            $editaSenha->execute();
            $_SESSION["nome"] = $nome;
            $_SESSION["sobrenome"] = $sobrenome;
            $_SESSION["genero"] = $genero;
            $_SESSION["email"] = $email;
            $_SESSION["telefone"] = $telefone;
            $_SESSION["carteira"] = $carteira;
            header("location:index.php");
            die();
        } else {
            return "1";
        }
    }

    public function alterarImagem(string $imagem): void
    {
        if ($_SESSION["imagem"] != "default.png") {
            unlink('profilePhotos/'.$_SESSION["imagem"]);
        }
        $alteraImagem = $this->mysql->prepare('UPDATE donors SET imagem = ? WHERE email = ?');
        $alteraImagem->bind_param('ss', $imagem, $_SESSION["email"]);
        $alteraImagem->execute();
        $_SESSION["imagem"] = $imagem;
    }

    public function removerImagem(): void
    {
        unlink('profilePhotos/'.$_SESSION["imagem"]);
        $imagem = "default.png";
        $removeImagem = $this->mysql->prepare('UPDATE donors SET imagem = ? WHERE email = ?');
        $removeImagem->bind_param('ss', $imagem, $_SESSION["email"]);
        $removeImagem->execute();
        $_SESSION["imagem"] = $imagem;
    }
}

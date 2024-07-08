public function updateContato()
    {
        $sqlQuery = "UPDATE " . $this->db_table . "
        SET
        nome = :nome,
        sobrenome = :sobrenome,
        data_nascimento = :data_nascimento,
        telefone = :telefone,
        celular = :celular,
        email = :email
        WHERE
        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":sobrenome", $this->sobrenome);
        $stmt->bindValue(":data_nascimento", $this->data_nascimento);
        $stmt->bindValue(":telefone", $this->telefone);
        $stmt->bindValue(":celular", $this->celular);
        $stmt->bindValue(":email", $this->email);
        $stmt->bindValue(":id", $this->id);

        // Adicione var_dump para mensagens de depuração
        var_dump("ID: " . $this->id);
        var_dump("nome: " . $this->nome);
        var_dump("Sobrenome: " . $this->sobrenome);
        var_dump("data_nascimento: " . $this->data_nascimento);
        var_dump("telefone: " . $this->telefone);
        var_dump("celular: " . $this->celular);
        var_dump("email: " . $this->email);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            var_dump("Erro ao executar a consulta SQL: " . $e->getMessage());
            return false;
        }
    }
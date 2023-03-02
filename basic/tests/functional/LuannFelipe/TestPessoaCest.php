<?php
    class TestPessoaCest 
    {
        public function createTest(FunctionalTester $I){
            $I->expectTo("Verificar se o cadastro de informações de uma pessoa está correto.");
            $I->amOnPage("/pessoa/create");
            $I->submitForm("form", [
                "Pessoa[nome]" => "João",
                "Pessoa[cpf]" => "86523435008",
                "Pessoa[cep]" => "69945000",
                "Pessoa[rua]" => "Rua 01",
                "Pessoa[estado_id]" => "1",
                "Pessoa[cidade_id]" => "1",
                "Pessoa[profisao]" => "Estudante",
                "Pessoa[complemento]" => "Perto do mercado Aplico o formulário"
               
            ]);
            $I->seeRecord("app\models\Pessoa", [
                "nome" => "João",
                "cpf" => "86523435008",
                "cep" => "69945000",
                "rua" => "Rua 01",
                "estado_id" => "1",
                "cidade_id" => "1",
                "pessoa.profissao" => "Estudante",
                "complemento" => "Perto do mercado Aplico o formulário"
            ]);
        }

        public function update(FunctionalTester $I) {
            $I->expectTo("Verificar se a atualização de informações de uma pessoa está correta.");
            $Model = $I->seeRecord("app\models\Pessoa", array("nome" => "João"));
            $I->amOnPage("app\models\Pessoa", ["id" => $Model->id]);
            $I->submitForm("form", [
                "Pessoa[nome]" => "João Pedro",
                "Pessoa[cpf]" => "86523435008",
                "Pessoa[cep]" => "69945000",
                "Pessoa[rua]" => "Rua 02",
                "Pessoa[estado_id]" => "1",
                "Pessoa[cidade_id]" => "1",
                "Pessoa[profisao]" => "Programador",
                "Pessoa[complemento]" => "Perto da faculdade"
            ]);

            $I->seeRecord("app\models\Pessoa",[
                "nome" => "João Pedro",
                "cpf" => "865.234.350-08",
                "cep" => "69945000",
                "rua" => "Rua 02",
                "estado_id" => "1",
                "cidade_id" => "1",
                "profisao" => "Programador",
                "complemento" => "Perto da faculdade"
            ]);
        }
    }


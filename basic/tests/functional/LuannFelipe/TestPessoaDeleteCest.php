<?php

class TestPessoaDeleteCest {
    public function delete(FunctionalTester $I) {
        $I->expectTo("Verificar se a deleção de informações de uma pessoa está correta.");
        $I->amOnRoute("teste/delete", ["id" => "1"]);
        $I->dontSeeRecord("app/models/Pessoa",[
            "nome" => "João Pedro"
        ]);
    }
}
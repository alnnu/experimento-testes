<?php
class TestImovelDeleteCest {
    public function delete(FunctionalTester $I) {
        $I->expectTo("Verificar se a deleção de informações de um imóvel está correta.");
        $I->amOnRoute("/imovel/delete", ["id" => "1"]);
        $I->dontSeeRecord("app/models/Imovel",[
            "nome" => "Casa Grande"
        ]);
    }
}
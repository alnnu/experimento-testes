<?php
class TestImovelCest {
    public function create(FunctionalTester $I) {
        $I->expectTo("Verificar se o cadastro de informações de um imóvel está correto.");
        $I->amOnRoute("imovel/create");
        $I->submitForm("form",[
            "Imovel[nome]" => "Casa",
            "Imovel[pessoa_id]" => "1",
            "Imovel[cep]" => "69945000",
            "Imovel[rua]" => "Rua 01",
            "Imovel[estado_id]" => "1",
            "Imovel[cidade_id]" => "1",
            "Imovel[valor]" => "120000",
            "Imovel[complemento]" => "Perto do mercado"
        ]);

        $I->seeRecords("app/modes/Imovel",[
            "nome" => "Casa",
            "pessoa_id" => "1",
            "cep" => "69945000",
            "rua" => "Rua 01",
            "estado_id" => "1",
            "cidade_id" => "1",
            "valor" => "120000",
            "complemento" => "complemento"
        ]);
    }
    public function update(FunctionalTester $I) {
        $I->expectTo("Verificar se a atualização de informações de um imóvel está correta");
        $Model = $I->grapRecord("app/models/Imovel", array("nome" => "Casa"));
        $I->amOnRoute("imovel/update", ["id"=>$Model->id]);
        $I->submitForm("form",[
            "Imovel[nome]" => "Casa Grande",
            "Imovel[pessoa_id]" => "1",
            "Imovel[cep]" => "69945000",
            "Imovel[rua]" => "Rua 02",
            "Imovel[estado_id]" => "1",
            "Imovel[cidade_id]" => "1",
            "Imovel[valor]" => "140000",
            "Imovel[complemento]" => "Perto da faculdade"
        ]);
    }
}
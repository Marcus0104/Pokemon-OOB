<?php
class Pokemon
{
    public int $vida;
    public int $exp;
    public int $forca;
    public int $velocidade;
    public int $defesa;
    public int $nivel = 1;
    public string $nome;
    public string $tipo;
    public string $fraqueza;

    function __construct(string $nome, int $vida, string $tipo, int $forca, string $fraqueza, int $exp, int $velocidade, int $defesa, int $nivel)
    {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->tipo = $tipo;
        $this->forca = $forca;
        $this->fraqueza = $fraqueza;
        $this->exp = $exp;
        $this->velocidade = $velocidade;
        $this->defesa = $defesa;
        $this->nivel = $nivel;
    }

    function batalha()
    {

        if ($this->velocidade >= 50) {
            $fait = random_int(1, 10);
            if ($fait >= 7) {
                print("Você perdeu!\n");
            } else {
                print("Você ganhou!!\n");
                $this->ganharExp(random_int(1, 30));
            }
        } else {
            $fait = random_int(1, 2);
            if ($fait == 2) {
                print("Você perdeu!\n");
            } else {
                print("Você ganhou!!\n");
                $this->ganharExp(random_int(1, 30));
            }
        }
        sleep(1);
    }

    function ganharExp(int $cont)
    {
        $this->exp += $cont;
        print("EXP atual: " . $this->exp . "/120\n");
        if ($this->exp >= 120) {
            $this->exp = 0;
            $this->nivelUp();
        }
        sleep(1);
    }

    function nivelUp()
    {
        $this->nivel++;
        $this->vida += random_int(1, 4);
        $this->velocidade += random_int(1, 4);
        $this->forca += random_int(1, 4);
        $this->defesa += random_int(1, 4);
        print("Seu pokemon subiu para o nível " . $this->nivel . "!\n");
        sleep(1);
    }

    function atributos()
    {
        system("clear");
        print("---- ATRIBUTOS DO POKÉMON ----\n");
        print("Nome: " . $this->nome . "\n");
        print("Tipo: " . $this->tipo . "\n");
        print("Fraqueza: " . $this->fraqueza . "\n");
        print("Nível: " . $this->nivel . "\n");
        print("Vida: " . $this->vida . "\n");
        print("Força: " . $this->forca . "\n");
        print("Velocidade: " . $this->velocidade . "\n");
        print("Defesa: " . $this->defesa . "\n");
        print("EXP: " . $this->exp . "/120\n");
        print("------------------------------\n");
        sleep(2);
    }
}

print("Escolha seu Pokemon\n");
print("1 - Charmander\n");
print("2 - Bulbasaur\n");
print("3 - Squirtle\n");
$p = readline("Escolha: ");

switch ($p) {
    case '1':
        $pokemon = new Pokemon("Charmander", 39, "Fogo", 10, "Água", 0, 12, 8, 1);
        break;
    case '2':
        $pokemon = new Pokemon("Bulbasaur", 45, "Planta", 9, "Fogo", 0, 10, 10, 1);
        break;
    case '3':
        $pokemon = new Pokemon("Squirtle", 44, "Água", 8, "Elétrico", 0, 9, 12, 1);
        break;
    default:
        print("Opção inválida\n");
        exit;
}

do {
    system("clear");
    print("---------Menu---------\n");
    print("1 - Batalhar\n");
    print("2 - Atributos\n");
    print("3 - Sair\n");
    print("----------------------\n");
    $v = readline("Escolha: ");

    switch ($v) {
        case '1':
            $pokemon->batalha();
            break;
        case '2':
            $pokemon->atributos();
            break;
        case '3':
            die("Até logo!\n");
        default:
            print("Opção inválida\n");
            break;
    }
} while (true);

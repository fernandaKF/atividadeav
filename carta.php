<?php

class Carta
{
    private int $num;
    private string $nome;

    public function getNum(): int
    {
        return $this->num;
    }

    public function setNum(int $num): self
    {
        $this->num = $num;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }
}

// Inicializando o baralho com algumas cartas
$baralho = array();
$c1 = new Carta();
$c1->setNum(1);
$c1->setNome("Harry");
array_push($baralho, $c1);
$c2 = new Carta();
$c2->setNum(2);
$c2->setNome("Hermione");
array_push($baralho, $c2);
$c3 = new Carta();
$c3->setNum(3);
$c3->setNome("Voldemort");
array_push($baralho, $c3);
$c4 = new Carta();
$c4->setNum(4);
$c4->setNome("Malfoy");
array_push($baralho, $c4);
$c5 = new Carta();
$c5->setNum(5);
$c5->setNome("Dumbledore");
array_push($baralho, $c5);
$c6 = new Carta();
$c6->setNum(6);
$c6->setNome("Dobby");
array_push($baralho, $c6);
$c7 = new Carta();
$c7->setNum(7);
$c7->setNome("Lovegood");
array_push($baralho, $c7);

$opcao = 0;

do {
    echo "\n-----------MENU-----------\n";
    echo "0- SAIR\n";
    echo "1- Mostrar cartas disponíveis\n";
    echo "2- Adivinhar a carta\n";

    // Ler a opção escolhida pelo usuário
    $opcao = readline("Escolha uma opção: ");

    if ($opcao == 1) {
        // Mostrar as cartas do baralho
        echo "As cartas disponíveis são: \n";
        foreach ($baralho as $carta) {
            echo $carta->getNum() . " - " . $carta->getNome() . "\n";
        }
    } elseif ($opcao == 2) {
        // Sortear uma das cartas do baralho
        $cartaSorteada = $baralho[array_rand($baralho)];

        echo "Tente adivinhar a carta sorteada! Você pode escolher pelo nome ou número.\n";
        $escolha = strtolower(readline("Quer escolher pelo nome ou número? "));

        while (true) {

            $carta = new Carta();
            if ($escolha == 'nome') {
                $nome = readline("Escolha o nome da carta: ");
                $carta->setNome($nome);
            } elseif ($escolha == 'numero') {
                $num = intval(readline("Escolha o número da carta: "));
                $carta->setNum($num);
            }

            // Verifica se o palpite é correto
            if ($escolha == 'nome' && strtolower($carta->getNome()) == strtolower($cartaSorteada->getNome())) {
                echo "Parabéns! Você acertou a carta: " . $cartaSorteada->getNome() . ".\n";
                exit;
            } elseif ($escolha == 'numero' && $carta->getNum() == $cartaSorteada->getNum()) {
                echo "Parabéns! Você acertou a carta: " . $cartaSorteada->getNome() . ".\n";
                exit;
            } else {
                echo "Você errou. Tente novamente!\n";
            }
        }
    }

} while ($opcao != 0);

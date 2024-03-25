<!DOCTYPE html>
<p> só um teste
<?php

/* O Codigo esta meio mal feito, reconheço, mas fiz na pressa e ainda não esta funcional. Estou postando apenas para não perder/esquecer

**PARA FUNCIONAR, DESBLOQUEIE O GB NAS CONFIGURAÇÕES DO PHP.INI** 

/* Como funciona?
Você vai colocar a(s) imagem(ns) na pasta chamada "ajustar" e vai chamar o diretório para o arquivo desejado, dar RUN e pronto! - por enquanto é assim */

echo"AOBA!PRIMEIRO SISTEMINHA UTIL EM PHP QUE CRIO" . PHP_EOL;
        

$diretorio = 'c:\Users\Controlcar\Desktop\AJUSTADOR_IMG\ajustar'; //coloque o seu caminho aqui, des do C:// (ou semelhantes) até a pasta "ajustar"
$diretorio_redimensionadas = 'c:\Users\Controlcar\Desktop\AJUSTADOR_IMG\redimensionadas';

// Verifica se o diretório para as imagens redimensionadas existe, se não, cria
if (!is_dir($diretorio_redimensionadas)) {
    mkdir($diretorio_redimensionadas, 0777, true);
}
//peguei do chatgpt!

$imagens = scandir($diretorio);

foreach($imagens as $imagem) {
    if ($imagem != '.' && $imagem != '..') {
        $caminho_imagem_original = $diretorio . DIRECTORY_SEPARATOR . $imagem;
        echo $caminho_imagem_original . PHP_EOL;

        if (is_file($caminho_imagem_original) && getimagesize($caminho_imagem_original)) {
            list($largura_original, $altura_original) = getimagesize($caminho_imagem_original);
            echo "Largura original: $largura_original px, Altura original: $altura_original px ";

            $nova_altura = 500;
            $nova_largura = 500;
            $info_arquivo = pathinfo($caminho_imagem_original);
            $extensao = strtolower($info_arquivo['extension']);

            switch ($extensao) {
                case 'jpg':
                case 'jpeg':
                    $imagem = imagecreatefromjpeg($caminho_imagem_original);
                    break;
                case 'png':
                    $imagem = imagecreatefrompng($caminho_imagem_original);
                    break;
                case 'gif':
                    $imagem = imagecreatefromgif($caminho_imagem_original);
                    break;
                default:
                    echo "Formato de arquivo não suportado.";
                    break;
            }
            
            if ($imagem) {
                $nova_imagem = imagecreatetruecolor($nova_largura, $nova_altura);
                imagecopyresampled($nova_imagem, $imagem, 0, 0, 0, 0, $nova_largura, $nova_altura, imagesx($imagem), imagesy($image));
                $caminho_nova_imagem = $diretorio . DIRECTORY_SEPARATOR . "redimensionadas" . DIRECTORY_SEPARATOR . $imagem;
                imagepng($nova_imagem, $caminho_nova_imagem);

                echo "A imagem foi carregada com sucesso.";
            } else {
                echo "Falha ao criar a imagem.";
            }
        } else {
            echo "O arquivo não é uma imagem válida: $caminho_imagem_original";
        }
    }
}
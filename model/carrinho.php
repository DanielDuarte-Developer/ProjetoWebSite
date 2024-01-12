<?php
    function adicionarAoCarrinho($produtoId, $nome, $preco, $quantidade, $url) {
        global $carrinho;

        // Se o produto já estiver no carrinho, apenas atualiza a quantidade
        if (isset($carrinho[$produtoId])) {
            $carrinho[$produtoId]['quantidade'] += $quantidade;
        } else {
            // Adiciona um novo item ao carrinho
            $carrinho[$produtoId] = array(
                'nome' => $nome,
                'preco' => $preco,
                'quantidade' => $quantidade,
                'url' => $url
            );
        }
    }

    // Remove um item do carrinho
    function removerDoCarrinho($produtoId) {
        global $carrinho;

        // Remove o item do carrinho, se existir
        unset($carrinho[$produtoId]);
    }

    // Atualiza a quantidade de um item no carrinho
    function atualizarQuantidade($produtoId, $quantidade) {
        global $carrinho;

        // Atualiza a quantidade do produto no carrinho
        if (isset($carrinho[$produtoId])) {
            $carrinho[$produtoId]['quantidade'] = $quantidade;
        }
    }

    // Exibe o conteúdo do carrinho
    function exibirCarrinho() {
        global $carrinho;

        foreach ($carrinho as $produtoId => $item) {
            echo "Produto: {$item['nome']}, Preço: {$item['preco']}, Quantidade: {$item['quantidade']} <br>";
        }
    }
?>
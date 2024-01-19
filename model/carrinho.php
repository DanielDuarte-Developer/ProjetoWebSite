<?php
   // Certifique-se de que você tenha inicializado a variável $carrinho
   if (!isset($_SESSION['carrinho'])) {
       $_SESSION['carrinho'] = array();
   }
   
   function adicionarAoCarrinho($produtoId, $nome, $preco, $quantidade, $url) {
       // Recupera o carrinho da sessão
       $carrinho = $_SESSION['carrinho'];
   
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
   
       // Atualiza o carrinho na sessão
       $_SESSION['carrinho'] = $carrinho;
   }
   
   function removerDoCarrinho($produtoId) {
       // Recupera o carrinho da sessão
       $carrinho = $_SESSION['carrinho'];
   
       // Remove o item do carrinho, se existir
       unset($carrinho[$produtoId]);
   
       // Atualiza o carrinho na sessão
       $_SESSION['carrinho'] = $carrinho;
   }
   
   function atualizarQuantidade($produtoId, $quantidade) {
       // Recupera o carrinho da sessão
       $carrinho = $_SESSION['carrinho'];
   
       // Atualiza a quantidade do produto no carrinho
       if (isset($carrinho[$produtoId])) {
           $carrinho[$produtoId]['quantidade'] = $quantidade;
       }
   
       // Atualiza o carrinho na sessão
       $_SESSION['carrinho'] = $carrinho;
   }
   
   function calcularTotal() {
       // Recupera o carrinho da sessão
       $carrinho = $_SESSION['carrinho'];
       $total = 0;
   
       foreach ($carrinho as $item) {
           $total += $item['preco'] * $item['quantidade'];
       }
   
       return $total;
   }

   function contarProdutosNoCarrinho() {
        // Recupera o carrinho da sessão
        $carrinho = $_SESSION['carrinho'];

        return count($carrinho);
    }
   
   function exibirCarrinho() {
       // Recupera o carrinho da sessão
       $carrinho = $_SESSION['carrinho'];
   
       foreach ($carrinho as $produtoId => $item) {
           echo "Produto: {$item['nome']}, Preço: {$item['preco']}, Quantidade: {$item['quantidade']} <br>";
       }
   
       $total = calcularTotal();
       echo "Total do Carrinho: $total";
   }
   function obterQuantidadeNoCarrinho($produtoId) {
        // Certifique-se de que você tenha inicializado a variável $carrinho
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }

        // Recupera o carrinho da sessão
        $carrinho = $_SESSION['carrinho'];

        // Verifica se o produto existe no carrinho
        if (isset($carrinho[$produtoId])) {
            // Retorna a quantidade do produto no carrinho
            return $carrinho[$produtoId]['quantidade'];
        }

        // Se o produto não existir no carrinho, retorna 0
        return 0;
    }
?>
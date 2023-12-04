<?php
    session_start();
        $productsMenu = [
            'prod01' => ['name' => 'camisa', 'value' => 100],
            'prod02' => ['name' => 'calça', 'value' => 200],
            'prod03' => ['name' => 'boné', 'value' => 50],
        ];
            $cart = [];
        function addProductToCart($product, $amount) {
            global $cart;
                
            for ($i = 0; $i < $amount; $i++) {
                $cart[] = $product;
            }
        }
            
        function getCartTotal($userCart) {
            return array_reduce($userCart, function ($acc, $next) {
                return $acc + $next['value'];
            }, 0);
        }
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Produtos</title>
</head>
<body>
    <header>
        <div class="Menu">
            <nav>
                <!--TODO Meter Src Para um logo-->
                <!--<img src="" class="logo">-->
                <ul class="menuItems">
                    <!--TODO Mudar o Menu-->
                    <li><a href='HomePage.php' data-item='Homepage'> Home </a></li>
                    <li><a href='' data-item='About-us'> About us </a></li>
                    <li><a href='Produtos.php' data-item='Products'> Products </a></li>
                    <li><a href='' data-item='Contacto'> Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="row">
            <!--Single Product-->
            <form>
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1>Tailored Jeans</h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <!--Single Product-->
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1>Tailored Jeans</h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <!--Single Product-->
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1>Tailored Jeans</h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <!--Single Product-->
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1>Tailored Jeans</h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <!--Single Product-->
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1>Tailored Jeans</h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>
            </form>
        </section>
    </main>

    <footer>

    </footer>
</body>
</html>
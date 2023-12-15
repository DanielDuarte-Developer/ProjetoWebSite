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
    <link rel="stylesheet" href="css/homePageteste.css">
    <link rel="stylesheet" href="css/productsCSS.css">
    <title>Produtos</title>
</head>
<body>
<header>
    <div id="nav-bar">
  
  <div id="nav-header"><a id="nav-title" href="https://codepen.io" target="_blank"><i class="fab fa-codepen"></i>Nome Empresa</a>
    
    <hr/>
  </div>
  <div id="nav-content">
    <div class="nav-button"><i class="fas fa-palette"></i><span>Home</span></div>
    <div class="nav-button"><i class="fas fa-thumbtack"></i><span>Products</span></div>
    <hr/>
    <div class="nav-button"><i class="fas fa-images"></i><span>About Us</span></div>
    <div class="nav-button"><i class="fas fa-thumbtack"></i><span>Contact</span></div>
    <hr/>
    
    <div id="nav-content-highlight"></div>
  </div>
  <input id="nav-footer-toggle" type="checkbox"/>
  <div id="nav-footer">
    <div id="nav-footer-heading">
    <div id="nav-footer-avatar"></div>
      <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank">Conta</a><span id="nav-footer-subtitle">Admin</span></div>
      <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
    </div>
    <div id="nav-footer-content">
      <Lorem>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</Lorem>
    </div>
  </div>
</div>
        </div>
    </header>

    <main>
        <section class="row">
            <!--Single Product-->
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1><a href="anotherPage.php?linkText=Click%20me">Tailored Jeans</a></h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <!--Single Product-->
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1><a href="anotherPage.php?linkText=Click%20me">Tailored Jeans</a></h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <!--Single Product-->
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1><a href="anotherPage.php?linkText=Click%20me">Tailored Jeans</a></h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <!--Single Product-->
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1><a href="anotherPage.php?linkText=Click%20me">Tailored Jeans</a></h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <!--Single Product-->
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1><a href="anotherPage.php?linkText=Click%20me">Tailored Jeans</a></h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>
        </section>
    </main>

    <footer>

    </footer>
</body>
</html>

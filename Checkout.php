<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/checkoutCSS.css">
    <title>CHECKOUT</title>
</head>
<body>
    
    <header>
        <h1>Checkout</h1>
    </header>

    <section>
        <h2>Ship Details</h2>
        <form id="shipDetailsForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <label for="country">Country:</label>
            <select id="country" name="country" required>
                <option value="us">United States</option>
                <option value="ca">Canada</option>
                <option value="uk">United Kingdom</option>
            </select>

            <button type="submit">Continue to Payment</button>
        </form>
    </section>

    <section>
        <h2>Payment Information</h2>
        <form id="paymentForm">
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" required>

            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>

            <button type="submit">Place Order</button>
        </form>
    </section>
</body>
</html>
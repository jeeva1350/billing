<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Confirmation</title>
</head>
<body>
    <h1>Thank you for your purchase!</h1>
    <p>Dear Customer,</p>
    <p>Your purchase has been successfully recorded.</p>

    <h2>Purchase Details:</h2>
    <ul>
        <li><strong>Total without tax:</strong> ${{ $purchaseDetails['total_without_tax'] }}</li>
        <li><strong>Net price:</strong> ${{ $purchaseDetails['net_price'] }}</li>
        <li><strong>Rounded net price:</strong> ${{ $purchaseDetails['rounded_net_price'] }}</li>
        <li><strong>Amount:</strong> ${{ $purchaseDetails['amount'] }}</li>
        <li><strong>Balance:</strong> ${{ $purchaseDetails['balance'] }}</li>
    </ul>

    <p>Thank you for your business!</p>
</body>
</html>

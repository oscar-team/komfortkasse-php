# Payaut PHP Integration

This is a PHP library for integrating [Komfortkasse](https://ssl.komfortkasse.eu/) apis

## Installation

Use the package manager [composer](https://pip.pypa.io/en/stable/) to install.

```bash
composer require oscar-team/komfortkasse-php
```

## Usage

```php
require __DIR__ . '/vendor/autoload.php';

$client = new OscarTeam\KomfortkassePhp\KomfortKasseApi(token: 'token');
```

### [Account Holders Apis]('https://apidocs.payaut.com/#tag/Account-Holders')
```php
$orderData = [
    "number" => 12345,
    "type" => "PREPAYMENT",
    "amount" => 220.0,
    "currency" => "EUR",
    "language" => "de",
    "customerEmail" => "testing@testdt.com",
    "date" => "07-02-2024",
    "dueDate" => "09-02-2024",
    "billing" => [
        "countryCode" => "DE",
        "lastName" => "lastName",
        "company" => "new company"
    ]
];
$client->order()->create(orderNumber: 12345, orderData: $orderData)->json();
$client->order()->get(orderNumber: 12345, queryParams: [])->json();
$client->order()->remove(orderNumber: 12345)->json();
$client->order()->cancel(orderNumber: 12345)->json();
$client->order()->markAsPaid(orderNumber: 12345)->json();
$client->order()->markAsUnPaid(orderNumber: 12345)->json();

$client->order()->bulkOperation()->create(orderData: $orderData)->json();
$client->order()->bulkOperation()->getAll(queryParams: [])->json();
$client->order()->bulkOperation()->sync(queryParams: [])->json();
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
<?php
include('php-logger/LoggerHelper.php');
$response['transaction_id'] = 3445645;
$response['amount'] = 20000.00;
$response['date']  = 'Sometime yesterday';
$logger = new LoggerHelper('test_log');
$logger->info(json_encode($response));
$logger->info(array('343',0));
$logger->info('response');
$logger->info(67890);
$logger->info(json_encode(array('343',0)));

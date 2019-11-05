<?php

use Parse\ParseClient;

$app_id = 'U2Ww602X94dlT8biFvPMw16mkJM9yDHH6SMQo5O3';
$rest_key  = 'Nc3nIB1tt4Txx7mdhkilkihxgzA8phdSqo4wQ6G5';
$master_key = '2d7xAAEoZDlufvBFewT4f1vzjZ3nzcm6nraLDz9q';

ParseClient::initialize($app_id, $rest_key, $master_key);
ParseClient::setServerURL('https://parseapi.back4app.com/', '/');

<?php

$I = new WebGuy($scenario);

$I->wantTo('ensure that frontpage matrimonial works');
$I->amOnPage('matrimonial'); 
$I->see('Matrimonial index');
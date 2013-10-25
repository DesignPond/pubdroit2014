<?php

$I = new WebGuy($scenario);

$I->wantTo('ensure that frontpage bail works');
$I->amOnPage('bail'); 
$I->see('Bail index');

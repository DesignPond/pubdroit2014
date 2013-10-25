<?php

$I = new WebGuy($scenario);

$I->wantTo('ensure that frontpage pubdroit works');
$I->amOnPage('pubdroit'); 
$I->see('Pubdroit index');

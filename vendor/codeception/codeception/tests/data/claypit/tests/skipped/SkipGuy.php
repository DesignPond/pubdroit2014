<?php //[STAMP] 72b81c815b9d1d87fb77ca1533aaafae

// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile


use Codeception\Module\SkipHelper;

/**
 [!] Inherited Methods
 * @method void haveFriend($name)
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
*/
class SkipGuy extends \Codeception\Actor
{
   
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     *
     * @see \Codeception\Module::getName()
     */
    public function getName() {
        return $this->scenario->runStep(new \Codeception\Step\Action('getName', func_get_args()));
    }
}
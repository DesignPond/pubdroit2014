<?php //[STAMP] e2f6f08441458d4dcec45449021290d6

// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile


use Codeception\Module\PowerHelper;

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
class PowerGuy extends \Codeception\Actor
{
   
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     *
     * @see \Codeception\Module\PowerHelper::gotThePower()
     */
    public function gotThePower() {
        return $this->scenario->runStep(new \Codeception\Step\Action('gotThePower', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     *
     * @see \Codeception\Module\PowerHelper::castFireball()
     */
    public function castFireball() {
        return $this->scenario->runStep(new \Codeception\Step\Action('castFireball', func_get_args()));
    }

 
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

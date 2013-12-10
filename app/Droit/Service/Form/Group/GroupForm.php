<?php namespace Droit\Service\Form\Group;

use Droit\Service\Validation\ValidableInterface;
use Droit\Repo\Group\GroupInterface;

class GroupForm {

	/**
	 * Form Data
	 *
	 * @var array
	 */
	protected $data;

	/**
	 * Validator
	 *
	 * @var \Droit\Service\Form\ValidableInterface 
	 */
	protected $validator;

	/**
	 * Group Repository
	 *
	 * @var \Droit\Repo\Group\GroupInterface 
	 */
	protected $group;

	public function __construct(ValidableInterface $validator, GroupInterface $group)
	{
		$this->validator = $validator;
		$this->group = $group;
	}

	/**
     * Create a new group
     *
     * @return integer
     */
    public function save(array $input)
    {
        if( ! $this->valid($input) )
        {
            return false;
        }

        return $this->group->store($input);
    }

    /**
     * Update new group
     *
     * @return integer
     */
    public function update(array $input)
    {
        if( ! $this->valid($input) )
        {
            return false;
        }

        return $this->group->update($input);
    }

	/**
	 * Return any validation errors
	 *
	 * @return array 
	 */
	public function errors()
	{
		return $this->validator->errors();
	}

	/**
	 * Test if form validator passes
	 *
	 * @return boolean 
	 */
	protected function valid(array $input)
	{

		return $this->validator->with($input)->passes();
		
	}


}
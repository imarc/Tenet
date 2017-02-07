<?php
namespace Tenet\Access;

use Tenet\Accessor;

trait GettableTrait
{
	public function generateGetterCallable(Accessor $accessor, $field)
	{
		return [$this, 'get' . ucfirst($field)];
	}

	public function get($field)
	{
		if (!property_exists($this, $field)) {
			throw new InvalidArgumentException(sprintf("%s has no property %s", get_class($this), $field));
		}

		return $this->$field;
	}
}

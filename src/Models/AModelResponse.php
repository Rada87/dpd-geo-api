<?php

namespace Rada87\DpdGeoApi\Models;

use Rada87\DpdGeoApi\Exceptions\EntityNotFoundException;

abstract class AModelResponse extends AModel {
    public function __construct(array $data)
    {
        $reflectionClass = new \ReflectionClass($this);
        $properties = $reflectionClass->getProperties();

        foreach ($properties as $property) {
            $propertyName = $property->getName();
            if (isset($data[$propertyName])) {
                try {
                    $className = $this->getClassName($propertyName, $reflectionClass->getName());
                    $this->{$propertyName} = new $className($data[$propertyName]);
                    continue;
                } catch (EntityNotFoundException $e) {
                    // silence here
                }

                $this->{$propertyName} = $data[$propertyName];
            }
        }
    }

    protected function getClassName($className, $classNamespace = __NAMESPACE__)
    {
        $name = $classNamespace . "\\" . ucfirst($className);

        if (!class_exists($name)) {
            throw new EntityNotFoundException("Class $name not found");
        } else {
            return $name;
        }
    }
}

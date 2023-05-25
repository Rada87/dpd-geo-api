<?php

namespace Rada87\DpdGeoApi\Models;

abstract class AModel {
    public function __construct(array $data)
    {
        $reflectionClass = new \ReflectionClass($this);
        $properties = $reflectionClass->getProperties();

        foreach ($properties as $property) {
            $propertyName = $property->getName();
            if (isset($data[$propertyName])) {
                $this->{$propertyName} = $data[$propertyName];
            }
        }
    }
}

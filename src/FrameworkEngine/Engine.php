<?php
namespace App\FrameworkEngine;

final class Engine {
 
    public static function start (object $object): void
    {
        $class_properties = self::getClassProperties($object);
        foreach ($class_properties as $property) {
            $property_attributes = self::getPropertyAttributes($object, $property->name);
            foreach ($property_attributes as $attribute) {
                $attribute_instance = $attribute->newInstance();
                $attribute_instance->validate($property->getValue($object));
            }
        }
    }

    private static function getPropertyAttributes(object $object, string $property_name): array
    {
        $reflection_attribute = new \ReflectionProperty($object, $property_name);
        return $reflection_attribute->getAttributes();
    }

    private static function getClassProperties(object|string $object): array
    {
        $reflection_class = new \ReflectionClass($object);
        return $reflection_class->getProperties();
    }
}
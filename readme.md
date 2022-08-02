<p align="center" style="font-size: 2em;font-weight: bold">Supreme Object</p>

<p align="center">
<a href="https://packagist.org/packages/saedyousef/supreme-object"><img src="https://img.shields.io/packagist/dt/saedyousef/supreme-object" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/saedyousef/supreme-object"><img src="https://img.shields.io/packagist/v/saedyousef/supreme-object" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/saedyousef/supreme-object"><img src="https://img.shields.io/packagist/l/saedyousef/supreme-object" alt="License"></a>
<a href="https://wakatime.com/badge/user/03bf07e2-4c78-4826-8603-8922f0241061/project/1f7337b7-1cbe-4337-9330-c3d2b293fd7c"><img src="https://wakatime.com/badge/user/03bf07e2-4c78-4826-8603-8922f0241061/project/1f7337b7-1cbe-4337-9330-c3d2b293fd7c.svg" alt="wakatime"></a>
</p>  
<br>

Supreme Object is to create Data Object or Data Transfer Objects for you, instead of dealing with arrays or class properties.

## Installation

From the command line run:

```
composer require saedyousef/dataobject
```

## Usage

With the package now installed, you can implement the main Interface `DataObject` and by using the trait `DataObjectTrait` that have all the methods implemented for you.
Here is an example of a class `PostDataObject` that implements the `DataObject` interface :
```php

use SY\DataObject\Contracts\DataObject;
use SY\DataObject\Support\DataObjectTrait;
use SY\DataObject\Support\ObjectReadAccess;
use SY\DataObject\Support\ObjectWriteAccess;

/**
 * @property int|null id
 * @property string title
 * @property string body 
 */
class PostDataObject implements DataObject
{
    use DataObjectTrait;
    use ObjectReadAccess;
    use ObjectWriteAccess; // If you need to write object properties.
    
    public function __construct(array $properties = [])
    {
        $this->_properties = [
            'id'    => null,
            'title' => '',
            'body'  => ''
        ];

        $this->hydrate($properties);
    }
    
    /** 
    * @return int|null
    */
    public function getId()
    {
        return $this->id;
    }
    
    /**
    * @return string
    */
    public function getTitle(): string
    {
        return $this->title;
    }
}
```

And that's it! Now you have your data object set.

<br>

A Star on this repo would be appreciated ;)
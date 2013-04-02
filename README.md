TextFieldTrimmer-for-SilverStripe
=================================
# Description
Add this SilverStripe extension to any DataObject to automatically `trim()` every text (ie, HTMLText, Text, VarChar) field before data is saved to the database.

#Installation

1. copy the 'textfieldtrimmer' folder to the document root
2. rebuild the manifest using /dev/build/?flush=all
3. in the project code: on any DataObject that needs text fields trimmed, indicate that the DataObject is an 'extension' of TextFieldTrimmer, for example:

```php
class Category extends DataObject {

	static $extensions = array(
		'TextFieldTrimmer',
	);
    ...
}
```

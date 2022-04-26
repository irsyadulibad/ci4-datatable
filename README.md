![GitHub](https://img.shields.io/github/license/irsyadulibad/ci4-datatables)
![GitHub repo size](https://img.shields.io/github/repo-size/irsyadulibad/ci4-datatables?label=size)
![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=irsyadulibad/ci4-datatables)

# ci4-datatables
Server Side Datatables Library for CodeIgniter 4 Framework

## Description
Library to make server side Datatables on CodeIgniter 4 to be **more easy**


## Requirements
* Codeigniter 4.*
* JQuery 3.*
* JQuery Datatables

## Installation
Installation is best done via Composer, you may use the following command:

  > composer require irsyadulibad/codeigniter4-datatables

This will add the latest release of **codeigniter4-datatables** as a module to your project.


### Manual Installation

Should you choose not to use Composer to install, you can download this repo, extract and rename this folder to **codeigniter4-datatables**. 
Then enable it by editing **app/Config/Autoload.php** and adding the **Irsyadulibad\DataTables**
namespace to the **$psr4** array. For example, if you copied it into **app/Libraries**:
```php
    $psr4 = [
        'Config'      => APPPATH . 'Config',
        APP_NAMESPACE => APPPATH,
        'App'         => APPPATH,
        'Irsyadulibad\DataTables'   => APPPATH .'Libraries/codeigniter4-datatables/src',
    ];
```


## Example:
This is an example code for using this library:
* PHP:
```php
<?php namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;

class Home extends BaseController
{
	public function json()
	{
		return DataTables::use('users')
			->where(['role' => 'admin'])
			->hideColumns(['password'])
			->rawColumns(['bio'])
			->make();
			
		// or with helper function
		return datatables('users')->make();
	}
}
```

* Javascript
```javascript
$('#table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
    url: 'http://localhost:8080/json'
  },
  columns: [
	  {data: 'username', name: 'username'},
	  {data: 'email', name: 'email'},
	  {data: 'fullname', name: 'fullname'}
	  {data: 'bio', name: 'bio'}
  ]
});
```


## Documentation:

Now you can use this without instantiate class
```php
DataTables::use('table');

// or with helper function

datatables('table')
```

You can use both POST and GET method
```php
$routes->get('datatables/json', 'Controller::method', ['as' => 'dt-json']);
// or
$routes->post('datatables/json', 'Controller::method', ['as' => 'dt-json']);
```

* **Select Table**\
	Select the table that you want to use
```php
DataTables::use('table')
```

* **Set Output**\
	The default parameter is false, which is automatically return the JSON data. You can return the data's dump by passing the **true** param
```php
DataTables::use('table')
	->make(true);
```

* **Select Fields**\
	Select the sepicifics column in the table
```php
->select('username, password')
```

* **Where Clause**
```php
->where(['role' => 'user', 'active' => 1])
```


* **orWhere Clause**
```php
->orWhere(['role' => 'user', 'active' => 0])
```

* **Join Clause**
```php
// <table>, <condition>, <type>
->join('address', 'users.id = address.uid', 'INNER JOIN')
```

* **Add Column**\
	Add custom column which is not in the table
```php
// <name>, <callback>
->addColumn('action', function($data) {
	return '<a href="/edit/'.$data->id.'">edit</a>';
})
```

* **Edit Column**
```php
// <name>, <callback>
->editColumn('created_at', function($value) {
	return format($value);
})

// or with data as second parameter
->editColumn('color', function($value, $data) {
	return "$value {$data->type}";
})
```

* **Raw Columns**\
	By default, all of the data is escaped to prevent XSS. But if you want to unescape them, you can use this method
```php
->rawColumns(['bio'])
```

* **Hide Columns**\
	Hide columns from JSON output
```php
->hideColumns(['password'])
```

<br />

## Author's Profile:

Github: [https://github.com/irsyadulibad]\
Website: [http://irsyadulibad.my.id]\
Facebook: [https://facebook.com/irsyadulibad.dev]

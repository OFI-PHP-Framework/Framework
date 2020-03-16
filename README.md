# OFI PHP FRAMEWORK

Sebuah kerangka framework yang sedikit meniru laravel dan codeigniter dengan custom saya sendiri 😁

<h3>Table Of Contents</h3>
<ol>
  <li> <a href="#gettingStarted">Getting Started</a> </li>
  <li> <a href="#navigation">Make a navigation section</a> </li>
  <li> <a href="#makecollapse">Make a collapse</a> </li>
  <li> <a href="#runserver">Running Development server</a> </li>
</ol>

<div id="gettingStarted">
	<h3>Getting Started</h3>
   If you wants to start make a section, first you can write 
        
	$design = new design();
	
   and then you can choose what do you want to do, for example you wants to make a navigation you can declare like this
   
        $design = new design();
        $design->header( //array data here );
	
   Note. you can read in <a href="#navigation">Make a navigation section</a> section to make a navigation.
   
</div>

<div id="navigation">
	<h3>Make a navigation section</h3>
	To make top navigation section you can write this code in your index.php
	
    $design->header(array(
        'title' => true,
        'theme' => 'dark', // white or dark
        'float' => 'left',
        'menu' => [
            [
                'name' => "Menu 1",
                'url' => "http://google.com"
            ],

            [
                'name' => "Menu 2",
                'url' => "http://google.com"
            ],
        ],        
    ));
 
This for example if you choose dark theme and then float left
![dark](https://user-images.githubusercontent.com/43981051/76418705-ad001580-63d1-11ea-887f-053806d1210d.png)

And this is if you choose white theme and with float right
![white](https://user-images.githubusercontent.com/43981051/76419132-71b21680-63d2-11ea-8538-fba5cceb2b42.png)

</div>

<div id="makecollapse">
	<h3>Make a collapse </h3>
	If you want to make a collapse you can write like this. And first if you want to make a button collapse you can type "btn" in type value.
	
	$design->collapse([
        	'name' => "Collapseku", // must same
        	'type' => 'btn', // btn or collapse
        	'value' => "Toggle Collapse"
    	]);

And if you alredy write collapse btn script, now you can write the collapse script (please type "collapse" in type value)

	// You can put this script where do you want
    	$design->collapse([
        	'name' => "Collapseku", // must same
        	'type' => 'collapse',
        	'value' => "My first collapse with php function"
    	]);
</div>

<div id="runserver">
<h3>Run Framework server </h3>
If you need run OFI PHP Framework in development server, firts you must run your xampp server and enter to framework folder. For example for windows
	cd C:\xampp\htdocs\lks
	
and you type <b>composer serve</b> in command prompt (cmd). The server running in http://localhost:9000

![Screenshot (113)](https://user-images.githubusercontent.com/43981051/76718514-9ce98c80-6769-11ea-9b1a-4b9d01184870.png)

![image](https://user-images.githubusercontent.com/43981051/76718618-ecc85380-6769-11ea-9e4e-caf3e9c5046d.png)

</div>

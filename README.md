# Job Add Task - WorkPal Full-stack Technical Test

## Overview of task:

We require a small form which will add a job to a system.

The form should contain:
- Job Title ( Input type text ) ( Required ) ( Max length 50 Char )
- Job Description ( Input type textarea )
- Job EstHours ( Input type Number )
- Entry Date ( DateTimePicker ) ( Required )
- Schedule Start Date ( DateTimePicker )
- Schedule End Date ( DateTimePicker )

Additional Guidelines:
- If the Schedule Start Date is populated:
- Schedule Start Date cannot be after the Schedule End Date
- Schedule End Date can not be before the Schedule Start Date.
- There should be error handling and validation either client side or server side.
- It should POST using an Ajax request ( page should not reload ).
- Response from server side should be in JSON format.
- SQL is not required for this test, but it should inform the user if the job has been added successfully
  or not.
- Unit tests are not a requirement of this task but would be welcomed if included.

## Requirements
PHP minimum version is PHP **>=8.2**.

Set a custom url for your development environment.

### Setting custom local url for Apache in Unix environment
In order to have you local environment working, you'd need to set up a url.

Add your url on `/etc/hosts`: `127.0.0.1 {your-local-url}`.

Create conf filename `nano /etc/apache2/sites-available/{your-project-name}.conf`.

Set virtual host associate *your-local-url* to *your-project-path* in the aforementioned conf file.
```
<VirtualHost *:80>
   ServerName {your-local-url}
   DocumentRoot {your-project-path}

   <Directory "{your-project-path}">
      Options -Indexes +FollowSymLinks +MultiViews
      AllowOverride All
      Require all granted
   </Directory>

   ErrorLog ${APACHE_LOG_DIR}/error.log
   CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

Create symbolic link
`ln -s /etc/apache2/sites-available/{your-project-name}.conf /etc/apache2/sites-enabled/{your-project-name}.conf`

Restart Apache
`sudo systemctl restart apache2`

### Setting custom local url for Apache in Windows environment
Hava a look at the following links:
1. [Link](https://www.cloudways.com/blog/configure-virtual-host-on-windows-10-for-wordpress/);
2. [Link](https://stackoverflow.com/questions/2658173/set-up-apache-virtualhost-on-windows);

## Run tests
In the project directory there's a **test** directory, to run them, with the terminal go the test directory
you could run all of them withe following command `php run.php` or you could just execute the ones in a specific directory
e.g. `php run.php --test-dir='ModelProperties/JobHour'`.
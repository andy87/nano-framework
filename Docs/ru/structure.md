# Application structure

```
📁 
├─📁 config                              Directory with config files 
│ ├─📄 common.php                          Common config file
│ └─📄 main.php                            Main config file
├─📁 controllers                         Library Controllers
│ ├─📁 console                             Comingsoon...
│ └─📁 web                                 Directory with `web` Controller class
│   └─📄 <controller_id>Controller.php       <controller_id> file
├─📁 static                              Directory with public files & templates views
│ ├─📁 css                                 Library `CSS files`
│ ├─📁 js                                  Library `JS files`
│ └─📁 img                                 Library `Images`
├─📁 vendor                              Composer directory
├─📁 views                               Library with `views`
│ ├─📁 _layouts                            `views` for layouts
│ └─📁 <controller_id>                     `views` for <controller_id>
│    └─📄 <action_id>.php                    `views` for <action_id>
├─📄 .gitignore                          Git ignore file
├─📄 .htaccess                           Apache config file
├─📄 composer.json                       Composer config file
├─📄 endpoint.php                        Endpoint
└─📄 README.md                           This file O_O
```
# PNG to C-Style Array

This tool will convert png images to a black and white representation.
A value of false will be set if the pixel has a value of rgb(255,255,255), otherwise it will set to true.

You can place your images in the ``public/images`` folder.

Install everything with ``composer install`` from root directory.

Now you can start the tool with ``php index.php``

You will get output in form of: ``imagename[width][heigth] = {{true, false},{true, false},};``

## License

PNG to C-Style Array
Copyright (C) 2022 ThomasBoom89. MIT license.

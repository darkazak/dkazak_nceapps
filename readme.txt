1. The .htacces file in the public folder:
    On line 4 change _YOUR_ROOT_DIR_NAME_ to the name of the root folder for this app

2. The "app/config/config.php" file:
    replace _YOUR_USER_ with the correct Mysql user name.
    replace _YOUR_PASS_ with the correct Mysql password.
    replace _YOUR_DBNAME_ with the correct Mysql databsse name.
    also
    replace _YOUR_SITENAME_ with the name of the app.site
    replace _URLROOT_ with the full site URL (starting with http...)
    and then
    check if you want DEBUG to be true (on) or false (off)

3. the "public/js/setttings.js" file:
    replace the string value of the "set_app_dir" to the last directory of the main url

3. Favicon  
    place a favicon.ico icon file in the public/img folder
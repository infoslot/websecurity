# websecurity
# well you've entered the gist of the worsed code ever!
Obviously the code is intentionally worse. I will develope this to be a better demo application.  

## install
There are two setup possiblities I took care of  
  
  ### everything in same domain
  Create some kind of virtual host (funpage.com). Put every file into the same webroot folder;  
    
  ### Separated location for static content and API files
  Create a directory with the static content. And create a webroot here. I do this in two ways:  
    1. Go Live server of VisualStudio Code;
    2. python -m SimpleHTTPServer 5500  
    
  Then put the PHP API in the virtual host of funpage.com.
   In the current code I took, kind of care for the CORS policies we need in this situation



## TO DO
- give you the database schema, although youcan reverse engineer it from the api code;
- give examples of the build in vulnerabilities;

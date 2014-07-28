getMangaInn is a simple script to retrieve manga pages from mangainn site for off line reading purposes.
At the moment, this script is only been tested in mac environment although linux environment should not pose 
any issues (in the terminal line).

Files included:
getmangainn.php
simple_html_dom.php

There are only two requirements when using the script:

1) The base URL of the manga page.

2) The number of pages to retrieve.

Example:
Source URL will be: mangainn.com

Search for manga comic you like: (example: claymore)
will have the parent url: http://www.mangainn.com/manga/2113_claymore 
Say, I choose episode 18, url is: http://www.mangainn.com/manga/chapter/71641_claymore-chapter-18

In terminal/command line, invoke:
user:~$ php http://www.mangainn.com/manga/chapter/71641_claymore-chapter-18

The program will ask for the folder you would like to save the manga pages and how many pages it needs to download. 

 
 

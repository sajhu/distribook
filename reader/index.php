<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/popup.css">

        <script src="js/libs/jquery-2.0.3.min.js"></script>

        <script src="js/libs/zip.min.js"></script>        

        <script>
            "use strict";
            
            document.onreadystatechange = function () {  
              if (document.readyState == "complete") {
                EPUBJS.VERSION = "0.1.7";
                
                EPUBJS.filePath = "js/libs/";
                EPUBJS.cssPath = "css/";
                //fileStorage.filePath = EPUBJS.filePath;
<?php
    function sanitize($string)
  {
    //TODO should check first for Magic Quotes GPC

      return addslashes(htmlspecialchars(trim($string)));
    
  }

    function get($name)
  {
    return sanitize($_GET[$name]);
  }

  echo "                var Reader = ePubReader(\"../pubs/". get('l') .".epub\");
  ";

?>
              }  
            };
        
        </script>
                
        <!-- Render -->
        <script src="js/epub.min.js"></script>
        
        <!-- Hooks -->
        <script src="js/hooks.min.js"></script> 
        
        <!-- Reader -->
        <script src="js/reader.min.js"></script>
        
        <!-- File Storage -->
        <!-- <script src="js/libs/fileStorage.min.js"></script> -->

        <!-- Full Screen -->
        <script src="js/libs/screenfull.min.js"></script>
        
    </head>
    <body>
      <div id="sidebar">
        <div id="panels">
          <input id="searchBox" placeholder="search" type="search">
          
          <a id="show-Search" class="show_view icon-search" data-view="Search">Search</a>
          <a id="show-Toc" class="show_view icon-list-1 active" data-view="Toc">TOC</a>
          <a id="show-Bookmarks" class="show_view icon-bookmark" data-view="Bookmarks">Bookmarks</a>
          <a id="show-Notes" class="show_view icon-edit" data-view="Notes">Notes</a>
         
        </div>
        <div id="tocView">
        </div>
        <div id="searchView">
          <ul id="searchResults"></ul>
        </div>
        <div id="bookmarksView">
          <ul id="bookmarks"></ul>
        </div>
      </div>
      <div id="main">
        
        <div id="titlebar">
          <div id="opener">
            <a id="slider" class="icon-menu">Menu</a>
          </div>
          <div id="metainfo">
            <span id="book-title"></span>
            <span id="title-seperator">&nbsp;&nbsp;–&nbsp;&nbsp;</span>
            <span id="chapter-title"></span>
          </div>
          <div id="title-controls">
            <a id="bookmark" class="icon-bookmark-empty">Bookmark</a>
            <a id="setting" class="icon-cog">Settings</a>
            <a id="fullscreen" class="icon-resize-full">Fullscreen</a>
          </div>
        </div>
        
        <div id="divider"></div>
        <div id="prev" class="arrow">‹</div>
        <div id="viewer"></div>
        <div id="next" class="arrow">›</div>
        
        <div id="loader"><img src="img/loader.gif"></div>
      </div>
      <div class="modal md-effect-1" id="settings-modal">
          <div class="md-content">
              <h3>Settings</h3>
              <div>
                  <p></p>
              </div>
              <div class="closer icon-cancel-circled"></div>
          </div>
      </div>
      <div class="overlay"></div>
    </body>
</html>

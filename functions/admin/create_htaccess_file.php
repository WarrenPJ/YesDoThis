<?php
$full_htaccess_config = "RewriteEngine On  
 RewriteRule ^product/([a-zA-Z0-9-/]+)$ product_details.php?post_url=$1  
 RewriteRule ^product/([a-zA-Z-0-9-]+)/ product_details.php?post_url=$1 
 
 RewriteRule ^genre/([a-zA-Z0-9-/]+)$ product_genre.php?category=$1  
 RewriteRule ^genre/([a-zA-Z-0-9-]+)/ product_genre.php?category=$1 
 
 RewriteRule ^news/([a-zA-Z0-9-/]+)$ news.php?post_url=$1  
 RewriteRule ^news/([a-zA-Z-0-9-]+)/ news.php?post_url=$1

 RewriteRule ^news-article/([a-zA-Z0-9-/]+)$ news_article.php?post_url=$1  
 RewriteRule ^news-article/([a-zA-Z-0-9-]+)/ news_article.php?post_url=$1  
 
 RewriteRule ^pages/([a-zA-Z0-9-/]+)$ pages.php?post_url=$1  
 RewriteRule ^pages/([a-zA-Z-0-9-]+)/ pages.php?post_url=$1 
 
 ##Redirect 404 to homepage
 ErrorDocument 404 /index.php
";
?>
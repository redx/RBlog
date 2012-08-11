<html>
<head>
<title> {title}-{user}</title>

  <meta charset="utf-8" />
  <meta name="Generator" content="EditPlus">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet/less" type="text/css" href="less.css" media="all">
    <script type="text/javascript" src="less-1.3.0.min.js"></script>
    <script type="text/javascript" src="ajaxupload.js"></script>
      <script type="text/javascript" src="jquery.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Use.La</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Index</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  <div class="container">

      <div class="content">
        <div class="page-header">
  <h1>{title}</h1>
</div>

<div class="row">
  <div class="span10">
{body}

    <hr>
    <div id="disqus_thread"></div>
<script type="text/javascript">
var disqus_shortname = 'usela'; // 注意，这里的 example 要替换为你自己的短域名
/* * * 下面这些不需要改动 * * */
(function() {
  var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
  dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
  (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>

    <div class="pagination">
      <ul>
      
        <li class="prev"><a href="/docs/2012/02/06/pressplus" title="Press+ 使用指南">&larr; Previous</a></li>
      
        <li><a href="/archive.html">Archive</a></li>
      
        <li class="next"><a href="/essays/2012/04/25/v2ex-2to3" title="V2EX 2to3">Next &rarr;</a></li>
      
      </ul>
    </div>
  </div>
  
  <div class="span4">
    <h4>Published</h4>
    <div class="date"><span>{time}</span></div>    
  </div>
</div>
      </div>
  </div>
    <div class="container">
    	<footer>
    	<span style="padding:40px;"><center>Powered By @xred</center></span>
    </footer>
  </div>
</body>
</html>


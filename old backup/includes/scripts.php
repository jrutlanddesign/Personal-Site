<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='https://www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-88906270-1');ga('send','pageview');
    </script>

    <!-- build:js scripts/main.js -->
    <script src="scripts/main-dist.js"></script>
    <!-- endbuild -->

    <!-- dribble feed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="scripts/jribbble.min.js"></script>

    <!-- // dribbble feed -->
    <script>
    $.jribbble.setToken('1349af3cc17771aa1497a87dcfb1b9dfdf2c04b051bc01e99a936bf5ade1e12f');

    $.jribbble.users('jrutlanddesign').shots({per_page: 12}).then(function(shots) {
      var html = [];

      shots.forEach(function(shot) {
        html.push('<li class="shots--shot">');
        html.push('<a href="' + shot.html_url + '" target="_blank">');
        html.push('<img src="' + shot.images.normal + '">');
        html.push('</a></li>');
      });

      $('.shots').html(html.join(''));
    });
    </script>

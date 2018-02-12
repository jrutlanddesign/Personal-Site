<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UI design project proposal</title>
    <meta name="description" content="Get a proposal for your next UI design or user experience project from Joe Rutland, a UK based freelance UI Designer.">

    <?php include('includes/head.php'); ?>
  </head>
  <body id="main">
    <!--[if lt IE 10]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php include('includes/header.php'); ?>

    <section id="proposal">
      <h1>
        <span>Project Proposal</span>
      </h1>

      <form action="contactengine.php" method="post">

      <p>So, you've got a UI project ready to go? Just <b>Fill in the form below</b> and I will get back to you within 24 hours :)</p>

        <fieldset id="personal">
          <legend>A little bit about you</legend>

          <!-- -->

          <label for="name">Who are you?</label>
          <span>First things first, let's be on first name terms. I'm Joe, nice to meet you :)</span>
          <input type="text" name="name" placeholder="enter your name" required>

          <!-- -->

          <label for="email">What's the best email to get you on?</label>
          <input type="email" name="email" placeholder="enter your email address" required>
        </fieldset><!--//END personal -->

        <fieldset id="aboutBusiness">
          <legend>About your business</legend>

          <!-- -->

          <label for="url">Do you already have a site?</label>
          <span>Let me know the URL if you have a site already - <i>optional</i></span>
          <input type="url" name="url" placeholder="http://">


          <label for="about">Tell me a little bit about you and your business</label>
          <span>Just a short introduction will do, it just helps me get to know you and your business a little bit better.
          </span>
          <textarea name="about" required></textarea>


          <label for="goals">What business goals are you looking to achieve with this project?</label>
          <span>This will help me understand your objectives and help in the UX strategy.</span>
          <textarea name="goals" required></textarea>
        </fieldset><!--//END aboutBusiness -->

        <fieldset id="projectDetails">
          <legend>Project Details</legend>


          <label for="budget">Do you have a budget set aside for the project?</label>
          <span>This just helps me gauge the project and it's requirements.</span>
          <div>
            <label class="check"><input type="checkbox" name="budget" value="< £1000">Less than &pound;1,000</label>
            <label class="check"><input type="checkbox" name="budget" value="£1001 - £5000">&pound;1,001 - &pound;5,000</label>
            <label class="check"><input type="checkbox" name="budget" value="£5001 - £7000">&pound;5,001 - &pound;7,000</label>
            <label class="check"><input type="checkbox" name="budget" value="£7001 - £10000">&pound;7,001 - &pound;10,000</label>
            <label class="check"><input type="checkbox" name="budget" value="£10000+">&pound;10,001 +</label>
            <label class="check"><input type="checkbox" name="budget" value="na">None Set / Rather not say</label>
          </div>

          <!--

          <label for="startDate">When would you like to start the project?
            <div class="date">
              <input type="number" name="sday" placeholder="DD">
              <input type="number" name="smonth" placeholder="MM">
              <input type="number" name="syear" placeholder="YYYY">
            </div>
          </label>



          <label for="completionDate">Do you have a completion deadline?
            <div class="date">
              <input type="number" name="cday" placeholder="DD">
              <input type="number" name="cmonth" placeholder="MM">
              <input type="number" name="cyear" placeholder="YYYY">
            </div>
          </label>

           -->

          <label for="additional">Any additional information you'd like to tell me</label>
          <span>Just jot it in here - <i>optional</i></span>
          <textarea name="additional">
          </textarea required>

        </fieldset>

        <button type="submit" value="Submit" class="arrowFade btn">Send it to me</button>
        <button type="reset" value="Reset" class="btn">Reset</button>
      </form>

    </section>


    <footer>
      <?php include('includes/footer.php'); ?>
    </footer>


    <?php include('includes/scripts.php'); ?>
  </body>
</html>

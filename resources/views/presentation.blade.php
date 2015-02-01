<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=1024, user-scalable=no">

    <title>Laravel 5</title>

    <!-- Required stylesheet -->
    <link rel="stylesheet" media="screen" href="core/deck.core.css">

    <!-- Extension CSS files go here. Remove or add as needed. -->
    <link rel="stylesheet" media="screen" href="extensions/goto/deck.goto.css">
    <link rel="stylesheet" media="screen" href="extensions/menu/deck.menu.css">
    <link rel="stylesheet" media="screen" href="extensions/navigation/deck.navigation.css">
    <link rel="stylesheet" media="screen" href="extensions/status/deck.status.css">
    <link rel="stylesheet" media="screen" href="extensions/scale/deck.scale.css">

    <!-- Style theme. More available in /themes/style/ or create your own. -->
    <link rel="stylesheet" media="screen" href="themes/style/laravel.css">

    <!-- Transition theme. More available in /themes/transition/ or create your own. -->
    <link rel="stylesheet" media="screen" href="themes/transition/horizontal-slide.css">

    <!-- Basic black and white print styles -->
    <link rel="stylesheet" media="print" href="core/print.css">

    <!-- Required Modernizr file -->
    <script src="modernizr.custom.js"></script>
</head>
<body>
<div class="deck-container">

    <!-- Begin slides. Just make elements with a class of slide. -->

    <section class="slide">
        <h1>Laravel 5</h1>
    </section>

    <section class="slide">
        <h2>About me</h2>
        <div class="slide-box">

        </div>
    </section>


    <section class="slide">
        <h2>My Laravel Story</h2>

        <div class="slide-box">
            <ul>
                <li>Productive Prototype of <a href="http://www.elearning-ag.de">eLearning AG</a>'s services in <strong>framework-less</strong>
                    PHP.
                </li>
                <li>Code cleanup, Refactoring and Rewriting was an urgent need.</li>
                <li>Previous experience with frameworks was disappointing and unsatisfactory.</li>
                <li><strong>test and reject</strong><sup>*</sup>:
                    <ul>
                        <li>Symfony 2 &DoubleRightArrow; Complex, steep <em>starting</em> curve, YAML</li>
                        <li>Zend Framework 2 &DoubleRightArrow; Complex, steep <em>starting</em> curve</li>
                        <li>CodeIgniter &DoubleRightArrow; user-unfriendly documentation</li>
                        <li>Laravel &DoubleRightArrow; Real Quickstart, small&good documentation, later: <a href="https://laracasts.com/">Laracasts</a></li>
                    </ul>
                </li>
            </ul>
            <p>
                <sup>* reproduced from my biased memory</sup>
            </p>
        </div>
    </section>

    <section class="slide">
        <h2>Laravel Philosophy</h2>

        <div class="slide-box">
            <ul>
                <li>web application framework with expressive, elegant syntax.</li>
                <li>easing common tasks, such as authentication, routing, sessions, and caching</li>
                <li>combine the very best of other web frameworks, such as Ruby on Rails, ASP.NET MVC, and Sinatra.</li>
                <li>A superb inversion of control container, expressive migration system, tightly integrated unit
                    testing support.
                </li>
            </ul>
            <p>
                <small>(Source: <a href="http://laravel.com/docs/master#laravel-philosophy">http://laravel.com/docs/master#laravel-philosophy</a>)
                </small>
            </p>
        </div>

    </section>

    <section class="slide">
        <h2>Laravel 5 - What's new</h2>

        <div class="slide-box">
            <ul>
                <li>Directory Structure</li>
                <!--<li>Blade Changes</li>-->
                <li>Contracts</li>
                <li>Commands & Events</li>
                <!--<li>Facades & Helpers</li>-->
                <!--<li>Routes</li>-->
                <li>Controller Method Injection</li>
                <!--<li>Authentication Scaffolding</li>-->
                <li>Socialite, Flysystem, dotenv</li>
                <li>Form Requests</li>
                <li>Laravel Elixir</li>
                <li>Laravel Scheduler</li>
                <li>&hellip;</li>
                <!--<li>New dd()</li>-->
                <!--<li>Eloquent Attribute Casting</li>-->
                <!--<li>Whoops No More</li>-->
                <!--<li>Packages and Workbench</li>-->
                <!--<li>Psysh</li>-->
                <!--<li>SuperClosure</li>-->
                <!--<li>New Generators</li>-->
            </ul>
            <p>
                <small>(Source: <a href="https://laravel-news.com/2015/01/laravel-5/">https://laravel-news.com/2015/01/laravel-5/</a>)
                </small>
            </p>
        </div>
    </section>

    <!-- End slides. -->

    <!-- Begin extension snippets. Add or remove as needed. -->

    <!-- deck.navigation snippet -->
    <div aria-role="navigation">
        <a href="#" class="deck-prev-link" title="Previous">&#8592;</a>
        <a href="#" class="deck-next-link" title="Next">&#8594;</a>
    </div>

    <!-- deck.status snippet -->
    <p class="deck-status" aria-role="status">
        <span class="deck-status-current"></span>
        /
        <span class="deck-status-total"></span>
    </p>

    <!-- deck.goto snippet -->
    <form action="." method="get" class="goto-form">
        <label for="goto-slide">Go to slide:</label>
        <input type="text" name="slidenum" id="goto-slide" list="goto-datalist">
        <datalist id="goto-datalist"></datalist>
        <input type="submit" value="Go">
    </form>

    <!-- End extension snippets. -->
</div>

<!-- Required JS files. -->
<script src="jquery.min.js"></script>
<script src="core/deck.core.js"></script>

<!-- Extension JS files. Add or remove as needed. -->
<script src="extensions/menu/deck.menu.js"></script>
<script src="extensions/goto/deck.goto.js"></script>
<script src="extensions/status/deck.status.js"></script>
<script src="extensions/navigation/deck.navigation.js"></script>
<script src="extensions/scale/deck.scale.js"></script>

<!-- Initialize the deck. You can put this in an external file if desired. -->
<script>
    $(function () {
        $.deck('.slide');
    });
</script>
</body>
</html>

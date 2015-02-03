<?php

/*
The presentation route is externalized, to make it "invisible" during the introduction of routes.php
*/

Route::get('/presentation/{lang?}', 'PresentationController@present');
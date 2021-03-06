<?php

/*
 * This file is part of Laravel Mentions.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

Route::get('/api/mentions/{type}', 'BrianFaust\Mentions\Http\Controllers\ApiController@index');

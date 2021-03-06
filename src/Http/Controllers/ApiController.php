<?php

/*
 * This file is part of Laravel Mentions.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Mentions\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    /**
     * @param $type
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($type, Request $request)
    {
        try {
            $query = $request->get('q');
            $column = $request->get('c');
            $model = app()->make(config('mentions.'.$type));

            $records = $model->where($column, 'LIKE', "%$query%")
                             ->get([$column]);

            foreach ($records as $record) {
                $resultColumns[] = $record->$column;
            }

            return response()->json($resultColumns);
        } catch (\ReflectionException $e) {
            return response()->json('Not Found', 404);
        }
    }
}

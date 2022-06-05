<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

///**
// * @OA\Info(title="Exetal Customer API", version="0.1")
// *
// * @OA\Get(
// *     path="/",
// *     description="Home page",
// *     @OA\Response(response="default", description="Welcome page | Exetal customer")
// * )
// */

/**
 * @OA\OpenApi (
 *     @OA\Info (
 *          version="1.0",
 *          title="Exetal Customer API",
 *          description="Exetal customer API by Dimuthu"
 *      )
 * )
 * @OA\Get(
 *     path="/",
 *     description="Home page",
 *     @OA\Response(response="default", description="Welcome page | Exetal customer")
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

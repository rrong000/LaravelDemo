<?php



namespace App\Http\Controllers;



use App\Services\InspiringService;

use Illuminate\Http\Request;



class InspiringController extends Controller

{

    /**

     * @return string

     */

    public function inspire()

    {

        return (new InspiringService())->inspire();

    }

} 
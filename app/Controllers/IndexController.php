<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use App\Models\IndexModel;

class IndexController extends Controller
{
    /**
     * Example Model use.
     *
     * @param void
     * @return array
     */
    public function indexAction()
    {
        try {            
            $indexModel = new IndexModel();
            $response = $indexModel->getMessage();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return ["response" => $response, "error" => $e];
   }

   /**
     * Example.
     *
     * @param void
     * @return array
     */
    public function indexActionV1()
    {
        try {            
            $response = "V1 route"
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return ["response" => $response, "error" => $e];
   }

   /**
     * Example.
     *
     * @param void
     * @return array
     */
    public function indexActionV2()
    {
        try {            
            $response = "V2 route";
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return ["response" => $response, "error" => $e];
   }
}

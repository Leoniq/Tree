<?php

namespace controllers;
use service\TreeService;

class TreeController {

    public $service;

    public function __construct() {
        $this->service = new TreeService();
    }

    public function actionCreate() {
        $this->service->createRoot();
    }

    public function actionAdd($id_parent) {
        $this->service->createNode($id_parent);
    }

    public function actionDel($cats,$parent_id) {
        $this->service->deleteNode($cats,$parent_id);
    }
}
?>
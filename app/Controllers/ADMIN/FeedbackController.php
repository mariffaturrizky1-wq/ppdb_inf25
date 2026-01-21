<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;

class FeedbackController extends BaseController
{
    public function index()
    {
        $model = new FeedbackModel();

        // Ambil semua data
        $feedbacks = $model->findAll();

        return view('admin/index', [
            'feedbacks' => $feedbacks
        ]);
    }


}

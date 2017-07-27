<?php

namespace Modules\FeedBack\Http\Controllers\Admin;

use Modules\FeedBack\Http\Requests\AdminFeedbackFormRequest;
use Modules\FeedBack\Repositories\FeedbackRepository;
use Nht\Http\Controllers\Admin\AdminController;

class FeedBackController extends AdminController {

    /**
     * @var \Modules\FeedBack\Repositories\FeedbackRepository
     */
    protected $feedback;

    public function __construct(FeedbackRepository $feedback)
    {
        parent::__construct();
        $this->feedback = $feedback;
    }

    public function getIndex()
    {
        $feedbacks = $this->feedback->get();
        return view('feedback::admin/index', compact('feedbacks'));
    }

    public function getCreate()
    {
        $feedback = $this->feedback->getInstance();
        return view('feedback::admin/create', compact('feedback'));
    }

    public function postCreate(AdminFeedbackFormRequest $request)
    {
        if($feedback = $this->feedback->create($request->all())) {
            return redirect()->route('admin.feedback.index')->with('success', trans('general.messages.update_success'));
        }

        return redirect()->route('admin.feedback.index')->with('error', trans('general.messages.update_fail'));
    }

    public function getEdit($id)
    {
        $feedback = $this->feedback->getById($id);
        return view('feedback::admin/edit', compact('feedback'));
    }

    public function postEdit($id, AdminFeedbackFormRequest $request)
    {
        $data = $request->except(['_token']);
        if($feedback = $this->feedback->update($data, ['id' => $id])) {
            return redirect()->route('admin.feedback.index')->with('success', trans('general.messages.update_success'));
        }

        return redirect()->route('admin.feedback.index')->with('error', trans('general.messages.update_fail'));
    }

    public function getDelete($id)
    {
        if($this->feedback->delete($id)) {
            return redirect()->route('admin.feedback.index')->with('success', trans('general.messages.delete_success'));
        }

        return redirect()->route('admin.feedback.index')->with('error', trans('general.messages.delete_fail'));
    }

}
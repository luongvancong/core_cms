<?php

namespace Nht\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Nht\Http\Requests;
use Nht\Http\Requests\AdminPostCategoryFormRequest;

use Nht\Http\Controllers\Admin\AdminController;

use Nht\Hocs\PostCategories\PostCategoryRepository;


class PostCategoryController extends AdminController
{
	public function __construct(PostCategoryRepository $postCategory)
	{
		parent::__construct();
		$this->postCategory = $postCategory;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex(Request $request)
	{
		$categories = $this->postCategory->getAllCategories();
		return view('admin/post_categories/index', compact('categories'));
	}


	public function getCreate() {
		$category = $this->postCategory->getInstance();
		$categories = $this->postCategory->getAllCategories();
		return view('admin/post_categories/create', compact('category', 'categories'));
	}

	public function postCreate(AdminPostCategoryFormRequest $request) {
		$data = $request->except('_token');

		if( $this->postCategory->create($data) ) {
			return redirect()->back()->with('success', trans('general.messages.create_success'));
		}

		return redirect()->back()->with('error', trans('general.messages.create_fail'));
	}

	public function getEdit($id) {
		$category = $this->postCategory->getById($id);
		$categories = $this->postCategory->getAllCategories();
		return view('admin/post_categories/edit', compact('category', 'categories'));
	}

	public function postEdit($id, AdminPostCategoryFormRequest $request) {
		$category = $this->postCategory->getById($id);
		$data = $request->except('_token');
		if( $this->postCategory->update($data, ['id' => $id]) ) {
			return redirect()->route('admin.post_category.index')->with('success', trans('general.messages.update_success'));
		}

		return redirect()->route('admin.post_category.index')->with('error', trans('general.messages.update_fail'));
	}

	public function getDelete($id) {
		$category = $this->postCategory->getById($id);

		if($category->delete()) {
			return redirect()->back()->with('success', trans('general.messages.delete_success'));
		}

		return redirect()->back()->with('success', trans('general.messages.delete_fail'));
	}
}

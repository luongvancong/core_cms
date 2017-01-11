<?php

namespace Modules\Post\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Nht\Http\Requests;

use Nht\Http\Controllers\Admin\AdminController;

class PostCategoryController extends AdminController
{
	public function __construct(CategoryRepository $category)
	{
		parent::__construct();
		$this->category = $category;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex(Request $request)
	{
		$categories = $this->category->getAllCategories();
		return view('admin/post_categories/index', compact('categories'));
	}


	public function getCreate() {
		$category = $this->category->getInstance();
		$categories = $this->category->getAllCategories();
		return view('admin/post_categories/create', compact('category', 'categories'));
	}

	public function postCreate(AdminPostCategoryFormRequest $request) {
		$data = $request->except('_token');

		if( $this->category->create($data) ) {
			return redirect()->back()->with('success', trans('general.messages.create_success'));
		}

		return redirect()->back()->with('error', trans('general.messages.create_fail'));
	}

	public function getEdit($id) {
		$category = $this->category->getById($id);
		$categories = $this->category->getAllCategories();
		return view('admin/post_categories/edit', compact('category', 'categories'));
	}

	public function postEdit($id, AdminPostCategoryFormRequest $request) {
		$category = $this->category->getById($id);
		$data = $request->except('_token');
		if( $this->category->update($data, ['id' => $id]) ) {
			return redirect()->route('admin.post_category.index')->with('success', trans('general.messages.update_success'));
		}

		return redirect()->route('admin.post_category.index')->with('error', trans('general.messages.update_fail'));
	}

	public function getDelete($id) {
		$category = $this->category->getById($id);

		if($category->delete()) {
			return redirect()->back()->with('success', trans('general.messages.delete_success'));
		}

		return redirect()->back()->with('success', trans('general.messages.delete_fail'));
	}
}

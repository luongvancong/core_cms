<?php

namespace Nht\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Nht\Hocs\Brands\BrandRepository;
use Nht\Http\Controllers\Admin\AdminController;
use Nht\Http\Requests;
use Nht\Http\Requests\AdminBrandEditFormRequest;
use Nht\Http\Requests\AdminBrandFormRequest;


class BrandController extends AdminController
{
	public function __construct(BrandRepository $brand)
	{
		parent::__construct();
		$this->brand = $brand;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex(Request $request)
	{
		$brands = $this->brand->getBrands(25, $request->all());
		return view('admin/brands/index', compact('brands'));
	}


	public function getCreate() {
		return view('admin/brands/create');
	}

	public function postCreate(AdminBrandFormRequest $request) {
		$data = $request->except('_token');

		if( $this->brand->create($data) ) {
			return redirect()->back()->with('success', trans('general.messages.create_success'));
		}

		return redirect()->back()->with('error', trans('general.messages.create_fail'));
	}

	public function getEdit($brandId) {
		$brand = $this->brand->getById($brandId);
		return view('admin/brands/edit', compact('brand'));
	}

	public function postEdit($brandId, AdminBrandEditFormRequest $request) {
		$brand = $this->brand->getById($brandId);
		$data = $request->except('_token');
		if( $this->brand->update($data, ['id' => $brandId]) ) {
			return redirect()->route('admin.brand.index')->with('success', trans('general.messages.update_success'));
		}

		return redirect()->route('admin.brand.index')->with('error', trans('general.messages.update_fail'));
	}

	public function getDelete($brandId) {
		$brand = $this->brand->getById($brandId);

		if($brand->delete()) {
			return redirect()->back()->with('success', trans('general.messages.delete_success'));
		}

		return redirect()->back()->with('success', trans('general.messages.delete_fail'));
	}

	public function quickEdit($brandId, Request $request)
	{
		$value = $request->get('value');
		$field = $request->get('field');
		$id    = $request->get('id');

		if($this->brand->update([$field => $value], ['id' => $id])) {
			return response()->json(['code' => 1]);
		}

		return response()->json(['code' => 0]);
	}


	public function toggleActivate($brandId, Request $request)
	{
		$brand = $this->brand->getById($brandId);

		if(\Nht\Hocs\Brands\Brand::STATUS_ACTIVATE == $brand->status) {
			$brand->status = \Nht\Hocs\Brands\Brand::STATUS_DEACTIVATE;
		} else if( \Nht\Hocs\Brands\Brand::STATUS_DEACTIVATE == $brand->status ) {
			$brand->status = \Nht\Hocs\Brands\Brand::STATUS_ACTIVATE;
		}

		$brand->save();

		return response()->json([
		    'code' => 1,
		    'status' => $brand->status
		]);
	}
}

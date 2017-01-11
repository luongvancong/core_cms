<?php
namespace Nht\Http\Controllers\Admin;

use App;
use Input;
use Nht\Hocs\Pages\Page;
use Nht\Hocs\Pages\PageCreator;
use Nht\Hocs\Pages\PageCreatorListener;
use Nht\Hocs\Pages\PageDeleter;
use Nht\Hocs\Pages\PageDeleterListener;
use Nht\Hocs\Pages\PageRepository;
use Nht\Hocs\Pages\PageUpdater;
use Nht\Hocs\Pages\PageUpdaterListener;
use Nht\Hocs\Validators\PageValidator;
use Nht\Http\Requests\AdminPageFormRequest;
use Redirect;
use Request;
use Response;
use Str;
use View;
use Xss;

class PageController extends AdminController implements PageUpdaterListener, PageCreatorListener, PageDeleterListener {

	public function __construct(PageRepository $page, PageCreator $creator,
	                            PageUpdater $updater, PageDeleter $deleter) {
		parent::__construct();
		$this->page      = $page;
		$this->creator   = $creator;
		$this->updater   = $updater;
		$this->deleter   = $deleter;
	}

	public $positions = array(
		Page::POSITION_MENU      => 'Menu',
		Page::POSITION_FOOTER    => 'Footer',
		Page::POSITION_OTHER     => 'Khác',
		Page::POSITION_HOME_PAGE => 'Trang chủ'
	);

	# Listing pages

	public function getIndex()	{
		$pages = $this->page->getAllPageByPaginate(25);
		return View::make('admin/pages/index', compact('pages'));
	}

	public function getCreate() {
		$page = $this->page->getInstance();
		$positions = $this->positions;
		return View::make('admin.pages.create', compact('page', 'positions'));
	}

	public function postCreate(AdminPageFormRequest $request) {
		return $this->creator->createPage($this, $request->all());
	}

	public function getEdit($id = 0) {
		$page = $this->page->getById($id);
		$positions 	= $this->positions;
		return View::make('admin/pages/edit', compact('page', 'positions'));
	}

	public function postEdit($id, AdminPageFormRequest $request) {
		$page = $this->page->getById($id);
		return $this->updater->updatePage($this, $page, $request->all());
	}

	public function getActive($id) {
		$page = $this->page->getById($id);
		return $this->updater->toggleStatus($this, $page);
	}

	# Method remove on pages

	public function getDelete($id)
	{
		$page = $this->page->getById($id);
		return $this->deleter->deletePage($this, $page);
	}

	public function creationSuccess(Page $page) {
		return redirect()->route('admin.page.create')->with('success', 'Tạo thành công 1 page');
	}

	public function creationFailed() {
		return redirect()->back()->withInput()->with('error', 'Tạo không thành công');
	}

	public function updationSuccess(Page $page) {
		return redirect()->route('admin.page.index')->with('success', 'Cập nhật thành công');
	}

	public function updationFailed() {
		return redirect()->back()->withInput()->with('error' , 'Cập nhật không thành công');
	}

	public function toggleStatusSuccess(Page $page) {
		return ['code' => 1, 'status' => $page->pag_active];
	}

	public function toggleStatusFailed() {
		return ['code' => 0];
	}

	public function deletionSuccess(Page $page) {
		return redirect()->route('admin.page.index')->with('success', 'Xóa thành công một bản ghi');
	}

	public function deletionFailed() {
		return redirect()->route('admin.page.index')->with('error', 'Xóa không thành công');
	}
}
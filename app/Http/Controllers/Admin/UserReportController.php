<?php

namespace Nht\Http\Controllers\Admin;

use Nht\Hocs\Elasticsearchs\Price;
use Nht\Hocs\MerchantReports\MerchantReportRepository;
use Symfony\Component\Debug\Exception\FatalErrorException;

class UserReportController extends AdminController {

    public function __construct(MerchantReportRepository $report, Price $esPrice)
    {
        parent::__construct();
        $this->report = $report;
        $this->esPrice = $esPrice;
    }

    public function getIndex()
    {
        $reports = $this->report->getPaginated(20);
        return view('admin/user_report/index', compact('reports'));
    }


    /**
     * Fix bug
     * @param  int $id
     * @return redirect
     */
    public function getFix($id)
    {
        $report = $this->report->getById($id);

        $price = $report->price()->first();

        if($price) {
            $this->esPrice->delete($price->getId());
            $price->delete();
        }

        $report->delete();

        return redirect()->route('admin.userReport.index')->with('success', 'Đã fix');
    }
}
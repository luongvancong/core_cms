<?php namespace Nht\Hocs\Sites;

use DB;
use Illuminate\Support\Collection;
use Nht\Hocs\Core\BaseRepository;
use Nht\Hocs\Elasticsearchs\Price as EsPrice;
use Nht\Hocs\MerchantViews\MerchantView;
use Nht\Hocs\Products\Product;
use Xss;
use \Nht\Hocs\MerchantReports\MerchantReport;

class DbSiteRepository extends BaseRepository implements SiteRepository, LinksRepository, CronRepository, XpathRepository {

	public function __construct(Site $model, Link $link, EsPrice $esPrice, Meta $meta, Cronjob $cronjob) {
        $this->model   = $model;
        $this->link    = $link;
        $this->esPrice = $esPrice;
		$this->meta	   = $meta;
		$this->cronjob = $cronjob;
	}

	public function getByIds(array $ids) {
		return $this->model->whereIn('id', $ids)->get();
	}

	public function getHots($take = 20) {
		return $this->model->where('hot', 1)->where('parent_id', 0)->orderBy('updated_at', 'DESC')->take($take)->get();
	}

    public function getPaginated($perPage = 20, array $withs = array(), array $filterArray = array(), array $sortArray = array()) {
        $sortArray = $sortArray ? $sortArray : ['id' => 'DESC'];
        $query = $this->model->with($withs)->where('parent_id', 0);
        $name = Xss::clean(array_get($filterArray, 'name'));
        $id = (int) array_get($filterArray, 'id');
        $allowCrawl = array_get($filterArray, 'allow_crawl', -1);

        if($id) {
            $query->where('id', $id);
        }

        if($name) {
            $query->where('name', 'LIKE', '%'. $name .'%');
        }

        if($allowCrawl >= 0) {
            $query->where('allow_crawl', $allowCrawl);
        }

        foreach($sortArray as $key => $value) {
            $query->orderBy($key, $value);
        }

        return $query->paginate($perPage);
    }


    public function saveLinks(Site $site, array $data) {
        $dataInsert = [];
        $link       = Xss::clean(array_get($data, 'link'));
        $maxPage    = (int) array_get($data, 'max_page');

        $exist = DB::table('site_links')->where('site_id', $site->getId())->where('link', $link)->count();
        if(!$exist) {
            $dataInsert[] = [
                'site_id' => $site->getId(),
                'link' => $link,
                'max_page' => $maxPage
            ];
        }

        if($dataInsert) {
            return DB::table('site_links')->insert($dataInsert);
        }
    }


    public function getLinkById($id) {
        return $this->link->find($id);
    }

    public function getShopHasProduct(Product $product, $take = 5) {
        $prices = $this->esPrice->search($product->getKeyword(), 10000, $product->getArrayIgnoreKeyword());
        $sourceIds = [];
        foreach($prices['items'] as $item) {
            if(isset($item['_source']['source_id'])) {
                $sourceIds[] = $item['_source']['source_id'];
            }
        }

        $sourceIds = array_unique($sourceIds);

        return $this->model->whereIn('id', $sourceIds)->where('parent_id', 0)->take($take)->orderBy('id', 'DESC')->get();
    }


    public function getShopsByNames(array $names) {
        return $this->model->whereIn('name', $names)->where('parent_id', 0)->orderBy('alexa_rank_vn', 'ASC')->get();
    }

    public function getShopsByNamesPaginated(array $names, $perPage = 20) {
        return $this->model->whereIn('name', $names)->where('parent_id', 0)->orderBy('alexa_rank_vn', 'ASC')->paginate($perPage);
    }

    public function getNewest($take = 20) {
        return $this->model->orderBy('updated_at', 'DESC')->where('parent_id', 0)->take($take)->get();
    }

	public function getXpathLink($site_id,array $condition = [])
	{
		$link = $this->link->where('site_id', '=', $site_id);

		$link->where(function($query) use ($condition) {
			foreach ($condition as $key => $value) {
				switch ($key) {
					case 'id':
						$query->orWhere($key, '=', $value);
						break;

					case 'link':
						$query->orWhere($key, 'LIKE', '%'. $value .'%');
						break;
				}
			}
		});

		return $link->get();
	}

	public function saveXpathLink($siteId ,array $data)
	{
        $data['site_id'] = $siteId;
		return $this->link->insert($data);
	}

	public function updateXpathLink($id, array $data)
	{
        return $this->link->where('id', $id)->update($data);
	}

	public function saveCronjobTime($siteId, array $data)
	{
		// Delete Old
		$this->cronjob->where('site_id', '=', $siteId)->delete();

		$insert = [];

		foreach ($data as $value) {
			$day['site_id'] = $siteId;
			$day['day'] = $value;
			$day['created_at'] = date('Y-m-d H:i:s');
			$day['updated_at'] = date('Y-m-d H:i:s');
			$insert[] = $day;
		}

		return $this->cronjob->insert($insert);
	}

	public function getCronjobTime($siteId)
	{
		return $this->cronjob->where('site_id', '=', $siteId)->get();
	}

    public function quickEditLink($id, $field, $value) {
        $link = $this->link->findOrFail($id);
        $link->$field = $value;
        return $link->save();
    }


    public function resetEnvTesting() {
        return \DB::table('sites')->update(['env_testing' => 0]);
    }

    public function getAllXpathBySite(Site $site) {
        return $this->meta->where('site_id', $site->getId())->get();
    }

    public function getXpathById($xpathId) {
        return $this->meta->findOrFail($xpathId);
    }

    public function updateXpath($id, $data) {
        return $this->meta->where('id', $id)->update($data);
    }


    public function updateTotalLinks() {
        $sites = $this->getAll();

        foreach($sites as $site) {
            $site->total_links = $site->links()->count();
            $site->save();
        }
    }

	public function importExcelXpath(array $data)
	{

		foreach ($data as $value) {
			$site_id = $this->model->where('name', '=', $value['source'])->first();

			$link = new Meta;
			$link->site_id				= $site_id->getId();
			$link->xpath_link_detail 	= '"'. $value['product_links'] .'"';
			$link->xpath_name			= '"'. $value['title'] .'"';
			$link->xpath_price			= '"'. $value['price'] .'"';
			$link->save();
		}

	}

	public function importExcelLink($site_id, array $data)
	{

		foreach ($data as $value) {

			$link = new Link;
			foreach ($value as $key => $attr) {
				$link->site_id = $site_id;
				$link->$key = $attr;
			}
			$link->save();

		}

	}

    public function countSiteCronByDay($day) {
        return $this->cronjob->where('day', $day)->count();
    }


    public function getSiteByDay($day) {
        return $this->model->join('site_cronjob', 'sites.id', '=', 'site_cronjob.site_id')
                           ->where('site_cronjob.day', $day)
                           ->selectRaw('sites.*, site_cronjob.id as cron_id')
                           ->get();
    }


    public function changeCronDay($cronId, $data) {
        return $this->cronjob->where('id', $cronId)->update($data);
    }


    public function countPageByDay($day) {
        return $this->link->join('site_cronjob', 'site_links.site_id', '=', 'site_cronjob.site_id')->where('day', $day)->sum('max_page');
    }


    public function resetEnvQuick() {
        return \DB::table('sites')->update(['env_quick' => 0]);
    }


    public function getAllParents() {
        return $this->model->where('parent_id', 0)->get();
    }

    public function getAllBranchs(Site $site) {
        return $this->model->where('parent_id', $site->getId())->get();
    }

    public function getProducts(Site $site, $take = 15) {
        return new Collection();
    }

    public function getParentsPaginate($perPage = 20) {
        return $this->model->where('parent_id', 0)->orderBy('name', 'ASC')->paginate($perPage);
    }

    public function countParent() {
        return $this->model->where('parent_id', 0)->count();
    }


    public function countRate($merchantId) {
        $rate = $this->model->where('id', $merchantId)->first();

        return $rate ? $rate->rating_count : 0;
    }


    public function getAvgRate($merchantId) {
        $rate = $this->model->where('id', $merchantId)->first();

        return is_object($rate) ? $rate->avg_rating : 0;
    }


    public function countView($merchantId) {
        $rate = $this->model->where('id', $merchantId)->first();

        return is_object($rate) ? $rate->view_count : 0;
    }

    public function countWrongInfo($merchantId) {
        $rate = $this->model->where('id', $merchantId)->first();

        return is_object($rate) ? $rate->wrong_info_count : 0;
    }

    public function countWrongPrice($merchantId) {
        $rate = $this->model->where('id', $merchantId)->first();

        return is_object($rate) ? $rate->wrong_price_count : 0;
    }

}

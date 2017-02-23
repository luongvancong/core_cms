<?php

namespace Nht\Hocs\Sites;

interface XpathRepository {
    /**
     * Get all xpaths of the site
     * @param  Site   $site
     * @return Collection
     */
    public function getAllXpathBySite(Site $site);

    /**
     * Get xpath by xpath Id
     * @param  int $xpathId
     * @return Xpath
     */
    public function getXpathById($xpathId);


    /**
     * Update xpath
     * @param  int $id
     * @param  array $data
     * @return boolean
     */
    public function updateXpath($id, $data);

    public function importExcelXpath(array $data);
}

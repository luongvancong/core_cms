<?php namespace Nht\Hocs\Sites;

interface LinksRepository {

    public function getXpathLink($site_id);

    public function saveXpathLink($siteId, array $data);

    public function updateXpathLink($siteId, array $data);

    public function quickEditLink($id, $field, $value);

    public function importExcelLink($siteId, array $data);

}

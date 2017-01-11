<?php namespace Nht\Hocs\Sites;

interface CronRepository {

    public function saveCronjobTime($siteId, array $data);

    public function getCronjobTime($siteId);

    /**
     * Count site cron by day
     * @param  int $day 0 - 7: monday - sunday
     * @return int
     */
    public function countSiteCronByDay($day);


    /**
     * Get sites by day of week
     * @param  int $day
     * @return Collection
     */
    public function getSiteByDay($day);


    /**
     * Change cron day
     * @param  int $cronId
     * @param  int $data
     * @return bool
     */
    public function changeCronDay($cronId, $data);


}

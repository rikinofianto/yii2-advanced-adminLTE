<?php
namespace console\controllers;

use yii\console\Controller;
use yii\caching\TagDependency;
use Yii;

class ClearCacheController extends Controller
{
    /**
     * Membersihkan cache berdasarkan tag.
     * @param string $tag Tag untuk cache yang ingin dibersihkan.
     */
    public function actionIndex($tag)
    {
        if (TagDependency::invalidate(Yii::$app->cache, $tag)) {
            $this->stdout("Cache dengan tag '{$tag}' berhasil dibersihkan.\n");
        } else {
            $this->stderr("Gagal membersihkan cache dengan tag '{$tag}'.\n");
        }
    }
}

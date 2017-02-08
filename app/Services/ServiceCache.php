<?php
namespace App\Services;

class ServiceCache
{
        public static function cleanCacheView($templates)
        {
                $cachedViewsDirectory = app('path.storage') . '/views/';

                if ($templates == '*')
                {
                    $files = glob($cachedViewsDirectory . '*');

                    foreach ($files as $file)
                    {
                        if (is_file($file))
                        {
                            @unlink($file);
                        }
                    }
                }
                else
                {
                    $cacheKey = MD5(app('view.finder')->find($templates));
                    @unlink($cachedViewsDirectory . $cacheKey);
                }

        }
}

?>
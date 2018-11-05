<?php

namespace App;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class Documentation
{
    public function get($file = 'documentation.md')
    {
        Log::debug($file);
        $content = File::get($this->path($file));
        Log::debug($content);

        return $this->replaceLinks($content);
    }

    protected function path($file, $dir = 'docs')
    {
        $file = ends_with($file, ['.md', '.png']) ? $file : $file . '.md';

        $path = base_path($dir . DIRECTORY_SEPARATOR . $file);

        if (!File::exists($path)) {
            abort('404', "요청하신 파일이 없습니다");
        }

        return $path;
    }

    protected function replaceLinks($content)
    {
        return str_replace('/docs/{{version}}', '/docs', $content);
    }

    public function image($file)
    {
        return \Image::make($this->path($file, 'docs/images'));
    }

    public function etag($file)
    {
        $lastModifed = File::lastModified($this->path($file, 'docs/images'));

        return md5($file . $lastModifed);
    }
}

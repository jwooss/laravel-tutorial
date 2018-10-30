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

    protected function path($file)
    {
        $file = ends_with($file, '.md') ? $file : $file .'.md';
        Log::debug($file);
        $path = base_path('docs' . DIRECTORY_SEPARATOR . $file);
        Log::debug($path);
        if (! File::exists($path)) {
            abort('404', "요청하신 파일이 없습니다");
        }

        return $path;
    }

    protected function replaceLinks($content)
    {
        return str_replace('/docs/{{version}}', '/docs', $content);
    }
}

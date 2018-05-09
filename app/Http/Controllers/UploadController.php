<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->disk = Storage::disk(config('ueditor.disk', 'public'));
    }



    public function UEditor(Request $request)
    {

        $config = $this->getUploadConfig('upload-image');

        if (!$request->hasFile($config['field_name'])) {
            return $this->error('UPLOAD_ERR_NO_FILE');
        }
        $file = $request->file($config['field_name']);
        if ($error = $this->fileHasError($file, $config)) {
            return $this->error($error);
        }
        $filename = $this->getFilename($file, $config);
        if ($this->eventSupport()) {
            //$modifiedFilename = event(new Uploading($file, $filename, $config), [], true);
            //$filename = !is_null($modifiedFilename) ? $modifiedFilename : $filename;
        }
        $this->store($file, $filename);
        $response = [
            'state' => 'SUCCESS',
            'url' => $this->getUrl($filename),
            'name' => $filename,
            'originalName' => $file->getClientOriginalName(),
            'type' => $file->getExtension(),
            'size' => $file->getSize(),
        ];
        //{"originalName":"demo.jpg","name":"demo.jpg","url":"upload\/demo.jpg","size":"99697","type":".jpg","state":"SUCCESS"}
        if ($this->eventSupport()) {
        //    event(new Uploaded($file, $response));
        }
        return response(json_encode($response));

    }
    public function getUrl($filename)
    {
        if (method_exists($this->disk, 'url')) {
            return $this->disk->url($filename);
        }
        return $this->url($filename);
    }
    protected function store(UploadedFile $file, $filename)
    {
        return $this->disk->put($filename, fopen($file->getRealPath(), 'r+'));
    }
    protected function formatPath($path, $filename)
    {
        $replacement = array_merge(explode('-', date('Y-y-m-d-H-i-s')), [$filename, time()]);
        $placeholders = ['{yyyy}', '{yy}', '{mm}', '{dd}', '{hh}', '{ii}', '{ss}', '{filename}', '{time}'];
        $path = str_replace($placeholders, $replacement, $path);
        //替换随机字符串
        if (preg_match('/\{rand\:([\d]*)\}/i', $path, $matches)) {
            $length = min($matches[1], strlen(PHP_INT_MAX));
            $path = preg_replace('/\{rand\:[\d]*\}/i', str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT), $path);
        }
        if (!str_contains($path, $filename)) {
            $path = str_finish($path, '/').$filename;
        }
        return $path;
    }
    public function eventSupport()
    {
        return trait_exists('Illuminate\Foundation\Events\Dispatchable');
    }

    protected function getFilename(UploadedFile $file, array $config)
    {
        $ext = '.'.$file->getClientOriginalExtension();
        $filename = config('ueditor.hash_filename') ? md5($file->getFilename()).$ext : $file->getClientOriginalName();
        return $this->formatPath($config['path_format'], $filename);
    }

    protected function getUploadConfig($action)
    {
        $upload = config('ueditor.upload');
        $prefixes = [
            'image', 'scrawl', 'snapscreen', 'catcher', 'video', 'file',
            'imageManager', 'fileManager',
        ];

        $config = [];
        foreach ($prefixes as $prefix) {
            if ($action == $upload[$prefix.'ActionName']) {
                $config = [
                    'action' => array_get($upload, $prefix.'ActionName'),
                    'field_name' => array_get($upload, $prefix.'FieldName'),
                    'max_size' => array_get($upload, $prefix.'MaxSize'),
                    'allow_files' => array_get($upload, $prefix.'AllowFiles', []),
                    'path_format' => array_get($upload, $prefix.'PathFormat'),
                ];
                break;
            }
        }
        return $config;
    }

    protected function fileHasError(UploadedFile $file, array $config)
    {
        $error = false;
        if (!$file->isValid()) {
            $error = $file->getError();
        } elseif ($file->getSize() > $config['max_size']) {
            $error = 'upload.ERROR_SIZE_EXCEED';
        } elseif (!empty($config['allow_files']) &&
            !in_array('.'.$file->getClientOriginalExtension(), $config['allow_files'])) {
            $error = 'upload.ERROR_TYPE_NOT_ALLOWED';
        }
        return $error;
    }


    protected function error($message)
    {
        return response()->json(['state' => "ueditor::upload.{$message}"]);
    }

}

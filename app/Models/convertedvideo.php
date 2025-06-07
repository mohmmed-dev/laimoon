<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convertedvideo extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'videoble_type',
        'videoble_id',
        'mp4_Format_240',
        'mp4_Format_360',
        'mp4_Format_480',
        'mp4_Format_720',
        'mp4_Format_1080',
        'webm_Format_240',
        'webm_Format_360',
        'webm_Format_480',
        'webm_Format_720',
        'webm_Format_1080'
    ];
    protected $table = 'convertedvideos';
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    public function getFileName($path,$ext)
    {
        $path = explode('/',$path);
        $fileName = end($path);
        $fileName = explode('.',$fileName);
        return $fileName[0] . '.' . $ext;
    }
}

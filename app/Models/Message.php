<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'smis_messages';

    const MOCK_TYPE_INBOX = 1;
    const MOCK_TYPE_LINE_NOTICE = 2;
}

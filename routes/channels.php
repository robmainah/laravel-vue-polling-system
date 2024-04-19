<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('polls.{id}', function ($user, $id) {
    return true;
});
